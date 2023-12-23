<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DriverInfo;
use App\Models\OrderPackage;
use App\Models\VehicleInfo;
use App\Models\Inspecte;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;



use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Cart;
use App\Models\Banner;
use App\Models\Blogs;
use App\Models\OrderItem;
use App\Models\Shippingdetail;
use App\Models\Order;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductAttributes;
use App\Models\ProductCategory;




class FrontController extends Controller
{
    
    //login & register page
    public function login()
    {
        return view('front.login');
    }
    
    //homepage
    public function home()
    {
        if (session()->has('packageData')) {
            session()->forget('packageData');
        }
        $packages = Product::orderby('id', 'asc')->with('vehicle')->get();
        if(auth()->user()){
            $user = auth()->user();
            $formSubmitted = Inspecte::where('user_id', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->exists();
            $vehicles = VehicleInfo::where('driver_id', $user->id)->first();
            if($vehicles){
                $vehicle = true;
            }else{
                $vehicle = false;
            }
            return view('front.index', compact('packages', 'formSubmitted', 'vehicle'));
        }
        return view('front.index', compact('packages'));

    }


    //french home
    public function french_home()
    {
        if (session()->has('packageData')) {
            session()->forget('packageData');
        }
        $packages = Product::orderby('id', 'asc')->with('vehicle')->get();

        return view('front.french.index', compact('packages'));
    }


    public function add_package(Request $request)
    {
        session(['packageData' => $request->all()]);
        if($request->package_id == 2){
            $owner = 1;
        }else{
            $owner = 0;
        }
        return response()->json([
            'success' => true,
            'owner'  => $owner,
            'msg'  => 'Data added in session'
        ]);
    }


    public function register()
    {
        return view('front.register');
    }

    public function register_owner()
    {
        return view('front.owner_register');
    }

    public function add_driver_form()
    {
        return view('front.add_driver');
    }

    public function drive_register(Request $request)
    {
        $old = User::where('email', $request->email)->first();
        if($old){
            return response()->json([
                'success' => false,
                'msg'  => 'Email already exists.'
            ]);
        }
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->street = $request->street;
        $user->appartment = $request->appartment;
        $user->city = $request->city;
        $user->pincode = $request->pincode;
        $user->country = $request->countryname;
        $user->save();

        $info = new DriverInfo;
        $info->user_id = $user->id;
        $info->first_name = $request->first_name;
        $info->last_name = $request->last_name;
        $info->civic_number = $request->civic_number;
        $info->business_phone = $request->business_phone;
        $info->license = $request->license;
        $info->save();
        $auth = Auth::loginUsingId($user->id);
        $payment = $this->payment();
        if($payment == true){
            $this->savePackage();
            if (session()->has('packageData')) {
                session()->forget('packageData');
            }
            return response()->json([
                'success' => true,
                'msg'  => 'Package buy successfully.'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'msg'  => 'Something went wrong.'
            ]);
        }

    }

    public function add_driver(Request $request)
    {
        try {
            DB::beginTransaction();
            $old = User::where('email', $request->email)->get()->pluck('email')->toArray();
            $forms = $request->formDataArray;
            $auth = auth()->user();
            foreach($forms as $field){
                if(in_array($field[2]['value'], $old)){
                    DB::rollback();
                    return response()->json([
                        'success' => false,
                        'msg' => $field[2]['value'].' email already exist.'
                    ]);
                }
                if(!empty($field[0]['value'])){
    
                    $user = new User;
                    $user->email = $field[2]['value'];
                    $user->password = Hash::make($field[12]['value']);
                    $user->owner_id = $auth->id;
                    $user->phone = $field[3]['value'];
                    $user->street = $field[7]['value'];
                    $user->appartment = $field[8]['value'];
                    $user->city = $field[9]['value'];
                    $user->pincode = $field[10]['value'];
                    $user->country = $field[11]['value'];
                    $user->save();
    
                    $info = new DriverInfo;
                    $info->user_id = $user->id;
                    $info->driver_number = $field[5]['value'];
                    $info->first_name = $field[0]['value'];
                    $info->last_name = $field[1]['value'];
                    // $info->civic_number = $field[0]['value'];
                    $info->business_phone = $field[4]['value'];
                    $info->license = $field[6]['value'];
                    $info->save();
                }
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Vehicle registered.'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'msg' => 'An error occurred. Transaction rolled back.'
            ]);
        }
    }

    public function owner_register(Request $request)
    {
        $old = User::where('email', $request->email)->first();
        if($old){
            return response()->json([
                'success' => false,
                'msg'  => 'Email already exists.'
            ]);
        }
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->is_owner = 1;
        $user->street = $request->street;
        $user->appartment = $request->appartment;
        $user->city = $request->city;
        $user->pincode = $request->pincode;
        $user->country = $request->countryname;
        $user->save();

        $info = new DriverInfo;
        $info->user_id = $user->id;
        $info->first_name = $request->first_name;
        $info->last_name = $request->last_name;
        $info->business_phone = $request->business_phone;
        $info->save();
        $auth = Auth::loginUsingId($user->id);
        $payment = $this->payment();
        if($payment == true){
            $this->savePackage();
            if (session()->has('packageData')) {
                session()->forget('packageData');
            }
            return response()->json([
                'success' => true,
                'msg'  => 'Package buy successfully.'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'msg'  => 'Something went wrong.'
            ]);
        }

    }




    public function payment()
    {
        return true;
    }

    public function savePackage()
    {
        $user = auth()->user();
        $data = session('packageData');
        $package = new OrderPackage;
        $package->user_id = $user->id;
        if(isset($data['is_annual'])){
            $package->is_annual = $data['is_annual'];
        }
        $package->package_id = $data['package_id'];
        $package->vehicle_id = $data['vehicle_id'];
        $package->price = $data['vehicle_price'];
        $package->payment_method = 'Online';
        $package->save();

        return true;

    }


    public function sign_in(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return response()->json([
                'success' => true,
                'msg'     => 'Logged in successfully.'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'msg'     => 'Invalid credientials.'
            ]);
        }
    }


    public function car_register_form()
    {
        return view('front.car-register');
    }

    public function driver_car_register_form()
    {
        return view('front.car-register-driver');
    }


    public function car_register(Request $request)
    {
        try {
            DB::beginTransaction();
            $old = VehicleInfo::pluck('registration')->toArray();
            $forms = $request->formDataArray;
            $user = auth()->user();
            $errorOccurred = false;
            foreach($forms as $field){
                if(in_array((string)$field[0]['value'], $old, true)){
                    $errorOccurred = true;
                    break;
                }
                if(!empty($field[0]['value'])){

                    $info = new VehicleInfo;
                    $info->user_id = $user->id;
                    $info->registration = $field[0]['value'] ?? null;;
                    $info->brand = $field[1]['value'] ?? null;;
                    $info->model = $field[2]['value'] ?? null;;
                    $info->year = $field[3]['value'] ?? null;;
                    $info->accessory_number = $field[4]['value'] ?? null;;
                    if(isset($field['electric'])){
                        $info->electric = 1;
                    }else{
                        $info->electric = 0;
                    }
                    $info->save();
                }
            }

            if ($errorOccurred) {
                DB::rollback();
                return response()->json([
                    'success' => false,
                    'msg' => $field[0]['value'] . ' vehicle already exists.'
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Vehicle registered.'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'msg' => 'An error occurred. Transaction rolled back.'
            ]);
        }
    }

    public function driver_car_register(Request $request)
    {
        $old = VehicleInfo::where('registration', $request->registration)->first();
        if($old){
            return response()->json([
                'success' => false,
                'msg'  => 'Vehicle already exists.'
            ]);
        }
        // dd($request->all());
        $user = auth()->user();
        $info = new VehicleInfo;
        $info->user_id = $user->id;
        $info->registration = $request->registration;
        $info->brand = $request->brand;
        $info->model = $request->model;
        $info->year = $request->year;
        $info->accessory_number = $request->accessory_number;
        if($request->electric){
            $info->electric = $request->electric;
        }
        $info->save();
        return response()->json([
            'success' => true,
            'msg' => 'Vehicle registered.'
        ]);
    }

    public function inspecte_form(Request $request)
    {
        $user = auth()->user();
        if($request->query('driver')){    
            $data = VehicleInfo::where('vehicle_infos.driver_id', $user->id)
                    ->leftJoin('driver_infos', 'driver_infos.user_id', '=', 'vehicle_infos.driver_id')
                    ->select('vehicle_infos.*', 'driver_infos.first_name', 'driver_infos.first_name', 'driver_infos.last_name', 'driver_infos.civic_number', 'driver_infos.business_phone', 'driver_infos.license')
                    ->first(); 
        }else{
            $data = VehicleInfo::where('vehicle_infos.user_id', $user->id)
                    ->leftJoin('driver_infos', 'driver_infos.user_id', '=', 'vehicle_infos.user_id')
                    ->select('vehicle_infos.*', 'driver_infos.first_name', 'driver_infos.first_name', 'driver_infos.last_name', 'driver_infos.civic_number', 'driver_infos.business_phone', 'driver_infos.license')
                    ->first(); 
        }
        // dd($data); 
        $today = Carbon::now()->toDateString();  
        $existingSubmission = Inspecte::where('user_id', $user->id)
            ->whereDate('created_at', $today)
            ->first();
        if($existingSubmission){
            $filled = true;
            return redirect()->route('home');
        }else{
            $filled = false;
            return view('front.inspecte', compact('data', 'filled'));
        }            
    }


    public function inspecte(Request $request)
    {
        $user = auth()->user();
        $package = $this->checkPackage($request);
        if($package == false){
            return response()->json([
                'success' => false,
                'msg'     => 'Your package is expired'
            ]);
        }
        $vehicle = VehicleInfo::find($request->vehicle_id);
        $vehicle->kilometer = $request->kilometer;
        $vehicle->save();
        $data = new Inspecte;
        $data->user_id = $user->id;
        $data->vehicle_id = $request->vehicle_id;

        $face_side = [];
        if($request->face_left_headlight){
            $face_side['face_left_headlight'] = $request->face_left_headlight;
        }else{
            $face_side['face_left_headlight'] = "0";
        }
        if($request->face_right_headlight){
            $face_side['face_right_headlight'] = $request->face_right_headlight;
        }else{
            $face_side['face_right_headlight'] = "0";
        }
        if($request->face_left_signal){
            $face_side['face_left_signal'] = $request->face_left_signal;
        }else{
            $face_side['face_left_signal'] = "0";
        }
        if($request->face_right_signal){
            $face_side['face_right_signal'] = $request->face_right_signal;
        }else{
            $face_side['face_right_signal'] = "0";
        }

        $data->face_side = json_encode($face_side);

        $rear_side = [];
        if($request->rear_left_headlight){
            $rear_side['rear_left_headlight'] = $request->rear_left_headlight;
        }else{
            $rear_side['rear_left_headlight'] = "0";
        }
        if($request->rear_right_headlight){
            $rear_side['rear_right_headlight'] = $request->rear_right_headlight;
        }else{
            $rear_side['rear_right_headlight'] = "0";
        }
        if($request->rear_left_signal){
            $rear_side['rear_left_signal'] = $request->rear_left_signal;
        }else{
            $rear_side['rear_left_signal'] = "0";
        }
        if($request->rear_right_signal){
            $rear_side['rear_right_signal'] = $request->rear_right_signal;
        }else{
            $rear_side['rear_right_signal'] = "0";
        }
        if($request->rear_left_brake){
            $rear_side['rear_left_brake'] = $request->rear_left_brake;
        }else{
            $rear_side['rear_left_brake'] = "0";
        }
        if($request->rear_right_brake){
            $rear_side['rear_right_brake'] = $request->rear_right_brake;
        }else{
            $rear_side['rear_right_brake'] = "0";
        }
        if($request->rear_licence_plate){
            $rear_side['rear_licence_plate'] = $request->rear_licence_plate;
        }else{
            $rear_side['rear_licence_plate'] = "0";
        }

        $data->rear_side = json_encode($rear_side);

        $right_side = [];
        if($request->right_side_mirror){
            $right_side['right_side_mirror'] = $request->right_side_mirror;
        }else{
            $right_side['right_side_mirror'] = "0";
        }
        if($request->right_front_tire){
            $right_side['right_front_tire'] = $request->right_front_tire;
        }else{
            $right_side['right_front_tire'] = "0";
        }
        if($request->right_rear_tire){
            $right_side['right_rear_tire'] = $request->right_rear_tire;
        }else{
            $right_side['right_rear_tire'] = "0";
        }
        if($request->right_tire_valves){
            $right_side['right_tire_valves'] = $request->right_tire_valves;
        }else{
            $right_side['right_tire_valves'] = "0";
        }

        $data->right_side = json_encode($right_side);

        $left_side = [];
        if($request->left_side_mirror){
            $left_side['left_side_mirror'] = $request->left_side_mirror;
        }else{
            $left_side['left_side_mirror'] = "0";
        }
        if($request->left_front_tire){
            $left_side['left_front_tire'] = $request->left_front_tire;
        }else{
            $left_side['left_front_tire'] = "0";
        }
        if($request->left_rear_tire){
            $left_side['left_rear_tire'] = $request->left_rear_tire;
        }else{
            $left_side['left_rear_tire'] = "0";
        }
        if($request->left_tire_valves){
            $left_side['left_tire_valves'] = $request->left_tire_valves;
        }else{
            $left_side['left_tire_valves'] = "0";
        }

        $data->left_side = json_encode($left_side);
        
        $extra_check = [];
        if($request->honk){
            $extra_check['honk'] = $request->honk;
        }else{
            $extra_check['honk'] = "0";
        }
        if($request->brake_fuel_level){
            $extra_check['brake_fuel_level'] = $request->brake_fuel_level;
        }else{
            $extra_check['brake_fuel_level'] = "0";
        }
        if($request->belt_extension){
            $extra_check['belt_extension'] = $request->belt_extension;
        }else{
            $extra_check['belt_extension'] = "0";
        }
        if($request->washer_fluid){
            $extra_check['washer_fluid'] = $request->washer_fluid;
        }else{
            $extra_check['washer_fluid'] = "0";
        }
        if($request->wipers){
            $extra_check['wipers'] = $request->wipers;
        }else{
            $extra_check['wipers'] = "0";
        }
        if($request->hand_brake){
            $extra_check['hand_brake'] = $request->hand_brake;
        }else{
            $extra_check['hand_brake'] = "0";
        }
        if($request->roof_taxi){
            $extra_check['roof_taxi'] = $request->roof_taxi;
        }else{
            $extra_check['roof_taxi'] = "0";
        }

        $data->extra_check = json_encode($extra_check);
        $data->geolocation = $request->geolocation;
        $data->immobilizer = $request->immobilizer;
        $data->standard_equipment = $request->standard_equipment;
        $data->ramp = $request->ramp;
        $data->abyss = $request->abyss;
        $data->interior_damage = $request->interior_damage;
        $data->exterior = $request->exterior;
        $data->interior = $request->interior;
        $data->description = $request->description;
        $data->confirm = $request->confirm;
        $data->kilometer = $request->kilometer;
        $data->save();
        return response()->json([
            'success' => true,
            'msg'  => 'Form submitted successfully.'
        ]);
    }

    public function checkPackage($request)
    {
        $user = auth()->user();
        // dd($request->owner_id);
        if(isset($request->owner_id)){
            $user_id = $request->owner_id;
        }else{
            $user_id = $user->id;
        }
        $package = OrderPackage::where('user_id', $user_id)->first();
        if($package->is_annual == 1){
            $subscriptionDuration = 365;
        }else{
            $subscriptionDuration = 30;
        }
        $expirationDate = $package->created_at->addDays($subscriptionDuration);

        if ($expirationDate < Carbon::now()) {
            return false;
        } else {
            return true;
        }
    }



    public function download_pdf(Request $request)
    {
        $user = auth()->user();
        if($request->query('id')){
            $data = Inspecte::where('id', $request->query('id'))->with('user', 'vehicle', 'user.driver')->first();
        }else{

            $data = Inspecte::where('user_id', $user->id)->with('user', 'vehicle', 'user.driver')
            ->whereDate('created_at', Carbon::today())->first();
        }
        // dd($data);
        $pdf = PDF::loadView('form_pdf', ['data' => $data]);
        return $pdf->download('form_pdf.pdf');

        // return view('form_pdf', compact('data'));
    }


    public function previous_form()
    {
        $user = auth()->user();
        $form = Inspecte::where('user_id', $user->id)->orderBy('id', 'desc')
            ->get();
        return view('front.previous_form', compact('form'));    
    }

    public function choose_vehicle_form()
    {
        $user = auth()->user();
        $vehicles = VehicleInfo::where('driver_id', null)->where('user_id', $user->owner_id)->orderBy('id', 'desc')
            ->get();
        return view('front.choose_vehicle', compact('vehicles'));    
    }

    public function choose_vehicle(Request $request)
    {
        $vehicle_id = $request->vehicle_id;
        $user = auth()->user();
        $vehicle = VehicleInfo::find($vehicle_id);
        $vehicle->driver_id = $user->id;
        $vehicle->save();
        return response()->json([
            'success' => true,
            'msg'    => 'Vehicle  added',
        ]);
    }







    
    //shop page
    public function shop()
    {
        $page = 'Shop';
        $products = Product::orderby('id', 'desc')->with('attr')->get();
        $hotselling = Product::orderBy('id', 'desc')->where('hotselling', 1)->get();
        return view('front.shop', compact('products', 'page', 'hotselling'));
    }


    //single category
    public function single_category($category)
    {
        $category = ProductCategory::orderby('id', 'desc')->where('slug', $category)->with('productDetail', 'productDetail.attr')->first();
        $page = $category->name;

        return view('front.single-category', compact('category', 'page'));
    }


    //single product
    public function single_product($category, $product)
    {
        $product = Product::where('slug', $product)->with('wishlist', 'gallery', 'attr', 'attr.pColor' ,'category')->firstorFail();
        $productAttr = $product->attr->groupBy('size');
        $page = $product->product;
        $parent = $product->category->name;
        $parent_url = route('single_category', $product->category->slug);
        return view('front.single-product', compact('product', 'page', 'productAttr', 'parent_url', 'parent'));
    }

    //attr change
    public function attr_change(Request $request)
    {
        $attr = ProductAttributes::where('size', $request->size)
                ->where('product_id', $request->product_id)->with('pcolor')->get();
        return response()->json([
            'success' => true,
            'attr'   => $attr
        ]);        
    }

    //color change
    public function color_change(Request $request)
    {
        $attr = ProductAttributes::where('color', $request->color)
                ->where('product_id', $request->product_id)
                ->where('size', $request->size)->with('pcolor')->first();
        return response()->json([
            'success' => true,
            'data'   => $attr
        ]);        
    }

     //add to cart
     public function add_to_cart(Request $request)
     {
        // dd($request->all());
         if(Auth::user()){
             $session_id = Auth::user()->id;
         }else{
             $session_id = session()->getId();
         }
         $product_id = $request->product_id;
         $qty = 1;
         $attr_id = $request->attr_id;
         $size = $request->size;
         $price = $request->price;
         $total = $qty * $price;
         $old_cart = Cart::where('cart_number', $session_id)
                     ->where('product_id', $product_id)->where('size', $size)
                     ->where('product_attr_id', $attr_id)->first();
         if($old_cart){
             $old_cart->qty += $qty;
             $old_cart->total += $total;
             $old_cart->save();
         }else{
             $cart = new Cart;
             $cart->cart_number = $session_id;
             $cart->product_id = $product_id;
             $cart->product_attr_id = $attr_id;
             $cart->size = $size;
             $cart->price = $price;
             $cart->total = $total;
             $cart->qty = $qty;
             $cart->save();
         }
         $count = Cart::where('cart_number', '=', $session_id)->count('id');
          $cart = Cart::where('cart_number', $session_id)->orderBy('id', 'desc')->with('product_detail', 'attr')->get();
         return response()->json([
             'success' => true,
             'count'   => $count,
             'cart'   => $cart,
             'msg'    => 'Product added to cart.'
             ]);
     }


     //cart page
    public function cart(Request $request)
    {
        $page = 'Cart';
        if(Auth::user()){
            $session_id = Auth::user()->id;
        }else{
            $session_id = session()->getId();
        }
        $cart = Cart::where('cart_number', $session_id)->orderBy('id', 'desc')->with('product_detail', 'attr', 'attr.pcolor')->get();
        return view('front.cart', compact('page', 'cart'));
    }

    //checkout page
    public function checkout(Request $request)
    {
        $page = "Checkout";
        if(Auth::user()){
            $session_id = Auth::user()->id;
            $user = Auth::user();
            $data = Cart::where('cart_number', $session_id)->orderBy('id', 'desc')->with('product_detail', 'attr')->get();
            $shipping = Shippingdetail::where('user_id', $user->id)->first();
            $grandTotal = Cart::where('cart_number', $session_id)->orderBy('id', 'desc')->with('product_detail', 'attr')->sum('total');
            return view('front.checkout', compact('page', 'data', 'grandTotal', 'user', 'shipping'));
        }else{
            $session_id = session()->getId();
            $data = Cart::where('cart_number', $session_id)->orderBy('id', 'desc')->with('product_detail', 'attr')->get();
            $grandTotal = Cart::where('cart_number', $session_id)->orderBy('id', 'desc')->with('product_detail', 'attr')->sum('total');
            return view('front.checkout', compact('page', 'data', 'grandTotal'));
        }
    }

    //send otp
    public function send_otp(Request $request)
    {
        try{
            $session_id = session()->getId();
            $email = $request->email;
            $subject = 'OTP from painting.';
            $message = "<p>Your otp is ".$otp;
            $send_otp = $this->send_email($email, $subject, $message );
            if($send_otp == true){
                if(isset($request->checkout)){
                    $old = User::where('email', $email)->first();
                    if(empty($old)){
                        $result = $this->create_user('', $email, '');
                    } 
                }
                
                if(isset($request->register)){
                    $old_phone = User::where('phone', $phone)->first();
                    if($old_phone){
                        return response()->json([
                            "success" => false,
                            "msg"    => "Already have account."
                            ]);
                    }
                    $old_email = User::where('email', $request->email)->first();
                    if($old_email){
                        return response()->json([
                            "success" => false,
                            "msg"    => "Email already exists."
                            ]);
                    }
                    $this->create_user($request->name, $request->email, $phone);
                }
                $otp  = rand ( 10000 , 99999 );
                $data = User::where('email', $email)->first();
                if(empty($data)){
                    return response()->json([
                        "success" => false,
                        "msg"    => "Account not found."
                        ]);    
                }
                $data->otp = $otp;
                $data->save();
            }
            else{
                return response()->json([
                    "success" => false,
                    "msg"    => 'Something went wrong',
                    ]);
            }
            
        }
        catch(Exception $e) {
            return response()->json([
                "success" => false,
                "msg"    => $e->getMessage()
                ]);
        }
        
    }


    //send email
    public function send_email($to, $subject, $data)
    {
        // configure
        $from = env('FROM_MAIL');
        $sendTo = $to; // Add Your Email
        $subject = $subject;             
        try
        {
            $emailText = $data;        
            $headers = array('Content-Type: text/html; charset=UTF-8\r\n";',
                'From: ' . $from,
                'Reply-To: ' . $from,
                'Return-Path: ' . $from,
            );
            
            mail($sendTo, $subject, $emailText, implode("\n", $headers));
            return true;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }








    //about page
    public function about_us()
    {
        $page = 'About Us';
        $brands = Testimonial::orderby('id', 'desc')->get();
        return view('front.about', compact('brands', 'page'));
    }
    
    //Contact page
    public function contact_us()
    {
        $page = 'Contact Us';
        $brands = Testimonial::orderby('id', 'desc')->get();
        return view('front.contact', compact('brands', 'page'));
    }
    

    
    //update cart
    public function update_cart(Request $request)
    {
        $cart_id = $request->cart_id;
        if(Auth::user()){
            $session_id = Auth::user()->id;
        }else{
            $session_id = session()->getId();
        }
        $qty = $request->qty;
        $cart = Cart::find($cart_id);
        $cart->qty = $qty;
        $cart->total = number_format($cart->price * $qty, 2, '.', '');
        $cart->save();
        $cart_total = Cart::where('cart_number', $session_id)->sum('total');
        return response()->json([
            'success' => true,
            'msg'   => 'Cart updated successfully.',    
            'cart' => $cart,
            'cart_total' => $cart_total
            ]);
    }
    
    //delete Cart
    public function delete_cart(Request $request)
    {
        
        $cart_id = $request->cart_id;
        if(Auth::user()){
            $session_id = Auth::user()->id;
        }else{
            $session_id = session()->getId();
        }
        $cart = Cart::find($cart_id)->delete();
        $cart_count = Cart::where('cart_number', $session_id)->count();
        $cart_total = Cart::where('cart_number', $session_id)->sum('total');
        return response()->json([
            "success" => true,
            "msg"  => "Item deleted from cart.",
            "cart_count" => $cart_count,
            'cart_total' => $cart_total
            ]);
    }
    
    //delete all items in cart
    public function delete_all_cart(Request $request)
    {
        if(Auth::user()){
            $session_id = Auth::user()->id;
        }else{
            $session_id = session()->getId();
        }
        $cart = Cart::where('cart_number', $session_id)->delete();
        return response()->json([
            "success" => true,
            "msg"  => "Items deleted from cart.",
            "cart_count" => 0
            ]);
    }
    
    
    //place order
    public function place_order(Request $request)
    {
        $name = $request->fname.' '.$request->lname;
        $email = $request->email;
        $phone = $request->phone;
            $order = $this->order($request);
            if($order == true){
                return response()->json([
                    "success" => true,
                    "msg"    => "Order placed successfully"
                    ]);
            }else{
                return response()->json([
                    "success" => false,
                    "msg"    => "Something went wrong"
                    ]);    
            }
    }
    
    
    //create user
    public function create_user($name = null, $email = null, $phone = null)
    {
        try {
            if(Auth::user()){
                $session_id = Auth::user()->id;
            }else{
                $session_id = session()->getId();
            }
            $cart = Cart::where('cart_number', $session_id)->orderBy('id', 'desc')->with('product_detail', 'attr')->get();
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->phone = $phone;
            $user->save();
            return true;
        }
        catch(Exception $e) {
          return $e->getMessage();
        }
    }
    
    //order
    public function order($request)
    {
        try{
            $user = Auth::user();
            
            $auth = User::find($user->id);
            $auth->name = $request->fname.' '.$request->lname;
            $auth->email = $request->email;
            $auth->address = $request->address;
            $auth->city = $request->city;
            $auth->state = $request->state;
            $auth->country = $request->country;
            $auth->pincode = $request->code;
            $auth->save();
            
            $data = Cart::where('cart_number', $user->id)->orderBy('id', 'desc')->with('product_detail', 'attr')->get();
            $total = Cart::where('cart_number', $user->id)->orderBy('id', 'desc')->with('product_detail', 'attr')->sum('total');
            $order = new Order;
            $order->user_id = $user->id;
            $order->name = $request->fname.' '.$request->lname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->country = $request->country;
            $order->pincode = $request->code;
            $order->note = $request->note;
            $order->paymentmethod = $request->payment_method;
            $order->total = $total;
            $order->save();
            $order_id = $order->id;
            foreach($data as $p){
                $item = new OrderItem;
                $item->user_id = $user->id;
                $item->orderId = $order_id;
                $item->product_id = $p->product_detail->id;
                $item->product = $p->product_detail->product;
                $item->qty = $p->qty;
                $item->price = $p->price;
                $item->total = $p->total;
                $item->size = $p->size;
                $item->attr = $p->attr->size;
                $item->weight = $p->attr->weight;
                $item->save();
            }
            if(isset($request->shipping)){
                $shipping_id = $this->shipping($request);
                $o = Order::find($order_id);
                $o->shipping_id = $shipping_id;
                $o->save();
            }
            $cart = Cart::where('cart_number', $user->id)->delete();
            return true;   
        }
        catch(Exception $e) {
          return $e->getMessage();
        }
    }
    
    
    //shipping address
    public function shipping($request)
    {
        $user = Auth::user();
        $old_address = Shippingdetail::where('user_id', $user->id)->first();
        if($old_address){
            $address = $old_address;
        }else{
            $address = new Shippingdetail;
        }
        $address->user_id = $user->id;
        $address->name = $request->ship_fname.' '.$request->ship_lname;
        $address->email = $request->ship_email;
        $address->phone = $request->ship_phone;
        $address->address = $request->ship_address;
        $address->city = $request->ship_city;
        $address->state = $request->ship_state;
        $address->country = $request->ship_country;
        $address->pincode = $request->ship_code;
        $address->save();
        return $address->id;
    }
    
    
    
    //verify otp
    public function verify_otp(Request $request)
    {
        $session_id = session()->getId();
        $phone = $request->phone;
        $otp = $request->otp;
        $user = User::where('phone', $phone)->first();
        if($user->otp != $otp){
            return response()->json([
                "success" => false,
                "msg"    => "Wrong otp."
                ]);
        }
        
        $cart = Cart::where('cart_number', $session_id)->orderBy('id', 'desc')->with('product_detail', 'attr')->get();
        $auth = Auth::loginUsingId($user->id);
        if(!$cart->isEmpty()){
            foreach($cart as $c){
                $c->cart_number  = $auth->id;
                $c->save();
            }
        }
        return response()->json([
            "success" => true,
            "msg"    => "Logged in successfully."
            ]);
    }
    
    //my profile
    public function my_profile(Request $request)
    {
        $page = 'My Account';
        $user = Auth::user();
        $shipping = Shippingdetail::where('user_id', $user->id)->first();
        $orders = Order::where('user_id', $user->id)->with('item')->orderBy('id', 'desc')->get();
        return view('front.my-profile', compact('page', 'user', 'orders', 'shipping'));
    }
    
    //update profile
    public function update_profile(Request $request)
    {
        try{
            $user = Auth::user();
            $old_phone = User::where('id', '!=', $user->id)->where('phone', $request->phone)->first();
            if($old_phone){
                return response()->json([
                "success" => false,
                "msg"    => "Please fill unique phone number."
                ]);
            }
            $data = User::find($user->id);
            $data->name = $request->fname.' '.$request->lname;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->save();
            return response()->json([
                    "success" => true,
                    "msg"    => "Profile updated successfully."
                    ]);
        } catch(Exception $e) {
            return response()->json([
                "success" => false,
                "msg"    => "Something went wrong"
                ]);
        }
        
        
    }
    
    //update address
    public function update_address(Request $request)
    {
        try{
            $user = Auth::user();
            $data = User::find($user->id);
            $data->address = $request->address;
            $data->city = $request->city;
            $data->state = $request->state;
            $data->country = $request->country;
            $data->pincode = $request->code;
            $data->save();
            if(isset($request->shipping)){
                $old_address = Shippingdetail::where('user_id', $user->id)->first();
                if($old_address){
                    $address1 = $old_address;
                }else{
                    $address1 = new Shippingdetail;
                }
                $address1->user_id = $user->id;
                $address1->address = $request->ship_address;
                $address1->city = $request->ship_city;
                $address1->state = $request->ship_state;
                $address1->country = $request->ship_country;
                $address1->pincode = $request->ship_code;
                $address1->save();
            }else{
                $old_address = Shippingdetail::where('user_id', $user->id)->first();
                if($old_address){
                    $old_address->delete();
                }
            }
            return response()->json([
                    "success" => true,
                    "msg"    => "Address updated successfully."
                    ]);
        } catch(Exception $e) {
            return response()->json([
                "success" => false,
                "msg"    => "Something went wrong"
                ]);
        }
    }
    
    
    //blog page
    public function blogs()
    {
        $page = 'Blogs';
        $blogs = Blogs::orderby('id', 'desc')->get();
        $sidebar = Blogs::orderBy('id', 'desc')->take(4)->get();
        return view('front.blogs', compact('blogs', 'page', 'sidebar'));
    }
    
    
    //single blog
    public function single_blog($slug)
    {
        $blog = Blogs::where('slug', $slug)->firstorFail();
        $page = $blog->title;
        $parent = 'Blogs';
        $parent_url = route('blogs');
        $sidebar = Blogs::orderBy('id', 'desc')->take(4)->get();
        return view('front.single-blog', compact('blog', 'page', 'parent_url','sidebar', 'parent'));
    }
    
    
    //send query
    public function send_query(Request $request)
    {
        
        // configure
        $from = 'Juneja Iron Store <info@junejaironstore.com>';
        $sendTo = 'amritsingh83282@gmail.com'; // Add Your Email
        $subject = 'New Enquiry from '.$_POST['fname'].' '.$_POST['lname'];
        
        // let's do the sending
        
        try
        {
            $emailText = "You have new message.\n=============================\n";
            $emailText = "<!DOCTYPE html>
                            <html>
                            <head>
                            <style>
                            table {
                              font-family: arial, sans-serif;
                              border-collapse: collapse;
                              width: 50%;
                            }
                            
                            td, th {
                              border: 1px solid #dddddd;
                              text-align: left;
                              padding: 8px;
                            }
                            
                            tr:nth-child(even) {
                              background-color: #dddddd;
                            }
                            </style>
                            </head>
                            <body>
                            
                            <h2>Enquiry Details</h2>
                            
                            <table >
                              <tr>
                                <td>Name</td>
                                <td>".$_POST['fname']." ".$_POST['lname']."</td>
                              </tr>
                              <tr>
                                <td>Email</td>
                                <td>".$_POST['email']."</td>
                              </tr>
                              <tr>
                                <td>Phone</td>
                                <td>".$_POST['phone']."</td>
                              </tr>
                              <tr>
                                <td>Message</td>
                                <td>".$_POST['message']."</td>
                              </tr>
                              <tr>
                                <td>IP Address</td>
                                <td>".$_SERVER['REMOTE_ADDR']."</td>
                              </tr>
                            </table>
                            
                            </body>
                            </html>";
        
            $headers = array('Content-Type: text/html; charset=UTF-8\r\n";',
                'From: ' . $from,
                'Reply-To: ' . $from,
                'Return-Path: ' . $from,
            );
            
            mail($sendTo, $subject, $emailText, implode("\n", $headers));
        
            return response()->json([
                'success' => true,
                'msg'  => 'Thank you for your valuable enquiry. We will get back to you soon!'
                ]);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'msg'  => $e->getMessage()
                ]);
        }
    }
}