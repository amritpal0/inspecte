<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DriverInfo;
use App\Models\OrderPackage;
use App\Models\VehicleInfo;


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
        $packages = Product::orderby('id', 'asc')->with('vehicle')->get();

        return view('front.index', compact('packages'));
    }


    public function add_package(Request $request)
    {
        session(['packageData' => $request->all()]);
        
        return response()->json([
            'success' => true,
            'msg'  => 'Data added in session'
        ]);
    }


    public function register()
    {
        return view('front.register');
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


    public function car_register(Request $request)
    {
        $old = VehicleInfo::where('registration', $request->registration)->first();
        if($old){
            return response()->json([
                'success' => false,
                'msg'  => 'Vehicle already exists.'
            ]);
        }
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

    public function inspecte_form()
    {
        $user = auth()->user();
        $data = VehicleInfo::where('vehicle_infos.user_id', $user->id)
                ->leftJoin('driver_infos', 'driver_infos.user_id', '=', 'vehicle_infos.user_id')
                ->select('vehicle_infos.*', 'driver_infos.first_name', 'driver_infos.first_name', 'driver_infos.last_name', 'driver_infos.civic_number', 'driver_infos.business_phone', 'driver_infos.license')
                ->first(); 
        // dd($data);            
        return view('front.inspecte', compact('data'));
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