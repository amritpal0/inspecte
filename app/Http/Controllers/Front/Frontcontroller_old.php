<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\postcategory;
use App\Models\Blogs;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\Shippingdetail;
use App\Models\Gallery;
use App\Models\ProductImages;
use App\Models\cart;
use App\Models\Reading;
use App\Models\Payment;
use App\Models\order;
use App\Models\orderitem;
use App\Models\Wishlist;
use App\Models\Billingdetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Contact;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use App\Mail\confirmOrder;


class Frontcontroller_old extends Controller
{

    public function index()
    {
        $product = Product::where('hotselling', '1')->with('wishlist')->orderBy('created_at','desc')->take(4)->get();
        $p_cat = postcategory::orderBy('created_at','asc')->take(4)->get();
        $blog = Blogs::orderBy('created_at','desc')->take(3)->get();
        $test = Testimonial::get();
        $gallery = Gallery::orderBy('id','desc')->take(11)->get();
        $data = compact('product', 'p_cat', 'blog', 'test', 'gallery');
        return view('front.index')->with($data);
    }

    public function postcategory($slug)
    { 
        $postcategory = postcategory::where('slug', $slug)->first();
        $post = Post::where('postcategory', $postcategory->id)->orderBy('created_at','desc')->get();
        return view('front.postcategory', compact('postcategory', 'post'));
    }

    public function singlepost($slug, $slug1)
    {
        $user = auth()->user();
        $post = Post::where('slug', $slug1)->first();
        $postq = postcategory::where('id', $post->postcategory)->first();
        return view('front.post', compact('post', 'postq', 'user'));
    }

    public function shop()
    {
        
        $product = Product::orderBy('hotselling','desc')->orderBy('created_at','desc')->with('wishlist')->paginate(24);
        return view('front.shop', compact('product'));
    }
    
    public function wishlist()
    {
        
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                $user = auth()->user();
                 $product = Wishlist::orderBy('created_at','desc')->where('userid', '=', $user->id)->with('product')->paginate(24);
            }
        }
       
        return view('front.wishlist', compact('product'));
    }

    public function single_product($slug)
    {
        $product = Product::where('slug', $slug)->with('wishlist')->first();
        $pimg = ProductImages::where('product_id', $product->id)->get();
        return view('front.single-product', compact('product', 'pimg'));
    }

    public function contact_us()
    {
        return view('front.contact');
    }

    public function add_to_cart(Request $request)
    {
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                $user = auth()->user();
                $oldcart = cart::where('userid', '=', $user->id)->where('status', '=', null )->where('productId', $request->id)->first();
                $product = Product::find($request->id);
                if(!empty($oldcart)){
                    $qty = $request->quantity + $oldcart->qty;
                    $oldcart->qty = $request->quantity + $oldcart->qty;
                     $oldcart->total = $product->price * $qty; 
                     $oldcart->save();
                     $oldcart->id;
                     $detail = [];
                     $old_detail = cart::where('userid', '=', $user->id)->where('status', '=', null )->where('id', $oldcart->id)->with('data')->get();
                     
                }else{
                   $cart = new cart;
                $cart->productId = $request->id;
                $cart->product = $product->product;
                $cart->userid = $user->id;
                $cart->qty = $request->quantity;
                $cart->price = $product->price;
                $cart->total = $product->price * $request->quantity; 
                $cart->save();
                $cart->id;
                $old_detail = [];
                $detail = cart::where('userid', '=', $user->id)->where('status', '=', null )->where('id', $cart->id)->with('data')->get();
                }
                
                $total = cart::where('userid', '=', $user->id)->where('status', '=', null)->count('id');
                $cart_total = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
                
                $msg = array(
                    'msg'  =>  'Item added to cart',
                    'alert-type' => 'info'
                );
                      return response()->json([
                          'success' => true,
                          'msg'=>'Product added to cart.',
                          'detail' => $detail,
                          'old_detail' => $old_detail,
                          'total' =>$total,
                          'cart_total' => $cart_total
                          ]);
            }else{
                return response()->json([
                          'success' => false,
                          'msg'=>'Please <a href="#loginmodal"  class="text-decoration-underline" data-bs-toggle="modal">login</a> to continue'
                          ]);
            }
            
        }else{
           return response()->json([
                          'success' => false,
                          'msg'=>'Please <a href="#loginmodal" class="text-decoration-underline" data-bs-toggle="modal">login</a> to continue'
                          ]);
        }
    }
    
    public function cart()
    {
        if(Auth::id()){
            $user = auth()->user();            
            // $items = cart::where('userid', $user->id)->with(relations: 'product')->get(); 
            $items = cart::where('userid', '=', $user->id)->where('status', '=', null )->with('data')->get(); 
            $total = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
            // echo "<pre>";
            // print_r($total);
            // die();
            return view('front.cart', compact('items', 'total'));
        }
        return view('front.cart');
    }
    
    public function update_cart(Request $request)
    {
            $id = $request->id;
            $item = cart::where('id', $id)->first();
            $item->total = $item->price * $request->qty;
            $item->qty = $request->qty;
            $item->save();
            
            $item1 = cart::where('id', $id)->first();
             $user = auth()->user();    
            $total1 = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
        return response()->json([
              'success' => true,
              'item1'=> $item1,
              'total1' => $total1,
              ]);
    }
    
    public function checkout()
    {
        $user = auth()->user();
        $total = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
        $address = Billingdetail::where('user_id', '=', $user->id)->first();
        $s_address = Shippingdetail::where('user_id', '=', $user->id)->first();
        
        
        return view('front.checkout', compact('total', 'address', 'user', 's_address'));
    }
    
    public function payment()
    {
        $user = auth()->user();
        $total = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
        
        return view('front.payment', compact('total'));
    }
    
    public function delete_cart(Request $request)
    {
        $item = cart::find($request->id)->delete();
         $user = auth()->user();    
        $total = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
        $totalitems = cart::where('userid', '=', $user->id)->where('status', '=', null)->count('id');
        return response()->json([
                      'success' => true,
                      'msg'=>'Product removed from cart.',
                      'total' => $total,
                      'totalitems'  => $totalitems,
                      ]);
    }
    
    public function add_to_wishlist(Request $request)
    {
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                $user = auth()->user();
                $dataold = Wishlist::where('userid', '=', $user->id)->where('productid', $request->id)->first();
                if(empty($dataold)){
                    $data = new Wishlist;
                    $data->productid = $request->id;
                    $data->userId = $user->id;
                    $data->save();
                    return response()->json([
                      'success' => true,
                      'msg'=>'Product added to wishlist.'
                      ]);
                }else{
                    $dataold->delete();
                     return response()->json([
                      'success' => false,
                      'msg'=>'Product removed from wishlist.'
                      ]);
                }
                 
                
            }else{
                return response()->json([
                          'success' => false,
                          'msg'=>'Please <a href="#loginmodal"  class="text-decoration-underline" data-bs-toggle="modal">login</a> to continue'
                          ]);
            }
            
        }else{
            return response()->json([
              'success' => false,
              'msg'=>'Please <a href="#loginmodal" class="text-decoration-underline" data-bs-toggle="modal">login</a> to continue'
              ]);
        }
        
    }
    
    public function photo_gallery()
    {
        $gallery = Gallery::orderBy('id','desc')->get();
        return view('front.gallery', compact('gallery'));
    }
    
    public function about()
    {
        return view('front.about');
    }
    
    public function blogs()
    {
        $blog = Blogs::orderBy('created_at','desc')->get();
        return view('front.blog', compact('blog'));
    }
    
    public function single_blog($slug)
    {
        $post = Blogs::where('slug', $slug)->first();
        $blog = Blogs::orderBy('created_at','desc')->get();
        return view('front.single-blog', compact('post', 'blog'));
    }
    
    public function myaccount()
    {
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                 $user = auth()->user();
                $data = orderitem::where('user_id', '=', $user->id)->with('product')->get();
                $address = Billingdetail::where('user_id', '=', $user->id)->first();
                $s_address = Shippingdetail::where('user_id', '=', $user->id)->first();
                $total = orderitem::where('user_id', '=', $user->id)->sum('total');
                 $reading = Reading::where('user_id', '=', $user->id)->with('reading')->get();
                 $product = Wishlist::orderBy('created_at','desc')->where('userid', '=', $user->id)->with('product')->paginate(24);
                 return view('front.my-account', compact('user', 'data', 'reading', 'product', 'address', 's_address'));
            }
            
        }
        return view('front.my-account');
    }
    
    public function editmyaccount(Request $request)
    {
        $request->validate(
                [
                    'email'   => 'email',
                    'phone'   => 'min:10|max:10'
                ]
                );
        $data = User::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect()->back()->with('msg', 'Detail updated successfully');
    }
    
    public function placeorder(Request $request)
    {
        $request->validate(
                [
                    'name'     => 'required',
                    'email'   => 'required|email',
                    'phone'   => 'required|min:10|max:10',
                    'address' => 'required',
                    'city'     => 'required',
                    'pincode'  => 'required|numeric',
                    'country'  => 'required',
                    'state'   => 'required',
                ]
                );
                
        if($request->shipping_detail){
            $request->validate(
                [
                    's_name'     => 'required',
                    's_email'   => 'required|email',
                    's_phone'   => 'required|min:10|max:10',
                    's_address' => 'required',
                    's_city'     => 'required',
                    's_pincode'  => 'required|numeric',
                    's_country'  => 'required',
                    's_state'   => 'required',
                ],
                [
                's_email.required' => 'The email field is required.',
                's_email.email' => 'Invalid email',
                's_name.required'   =>  'The name field is required.',
                's_phone.required'   =>  'The phone field is required.',
                's_phone.min'      => 'The phone length should 10 number.',
                's_phone.max'      => 'The phone length should 10 number.',
                's_address.required'   =>  'The address field is required.',
                's_city.required'   =>  'The city field is required.',
                's_pincode.required'   =>  'The pincode field is required.',
                's_country.required'   =>  'The country field is required.',
                's_state.required'   =>  'The state field is required.',
                ]
                );
        }        
        $data = $request->all();
        $user = auth()->user();
        $total = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
       return response()->json([
              'success' => true,
              'data'=> $data,
              'total' => $total
              ]); 
    }
    
    
    
    
    public function pay(Request $request)
    {
        if(Auth::id()){
           
            $user = auth()->user(); 
             $ordertotal = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
            $data = new order;
            $name = $request->name;
            $data->user_id = $user->id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->country = $request->country;
            $data->state = $request->state;
            $data->city = $request->city;
            $data->pincode = $request->pincode;
            $data->total = $ordertotal;
            $data->paymentmethod = $request->paymentmethod;
            $data->save();
            $orderId = $data->orderId; 
            
            
            $d = Billingdetail::where('user_id', $user->id)->first();
         if($d){
             $data2 = $d;
         }else{
          $data2 = new Billingdetail;   
         }
         $data2->country = $request->country;
        $data2->state = $request->state;
        $data2->city = $request->city;
        $data2->address = $request->address;
        $data2->pincode = $request->pincode;
        $data2->user_id = $user->id ;
        $data2->save();
            
            if($request->shipping_detail){
                $dd = Shippingdetail::where('user_id', $user->id)->first();
                 if($dd){
                     $data1 = $dd;
                 }else{
                  $data1 = new Shippingdetail;
                 }
                
                $data1->name = $request->s_name;
                $data1->user_id = $user->id;
                $data1->email = $request->s_email;
                $data1->phone = $request->s_phone;
                $data1->address = $request->s_address;
                $data1->country = $request->s_country;
                $data1->state = $request->s_state;
                $data1->city = $request->s_city;
                $data1->pincode = $request->s_pincode;
                $data1->order_id = $orderId;
                $data1->save();
            }
            
        
            $grandtotal = cart::where('userid', '=', $user->id)->where('status', '=', null)->sum('total');
            $orderitem = cart::where('userid', '=', $user->id)->where('status', '=', null)->get();
           
            foreach($orderitem as $order){
                $detail = new orderitem;
                $detail->orderid = $orderId;
                $detail->product_id = $order->productId;
                $detail->user_id = $user->id;
                $detail->product = $order->product;
                $detail->qty = $order->qty;
                $detail->price = $order->price;
                $detail->total = $order->qty * $order->price;

                $detail->save();


            }

            $items = orderitem::where('orderId', '=', $orderId)->get();
            $total = orderitem::where('orderId', '=', $orderId)->sum('total');
            //$cid = $request->input('cid');
            //$coupon = Coupon::where('coupon_id', '=', $cid)->first();
                       
            Mail::to($request->email)->send(new confirmOrder($items, $name, $total));
            

            
            $items = cart::where('userid', '=', $user->id)->update(['status' => 'ordered']);
            
            $user_pay = new Payment;
            $user_pay->user_id = $user->id;
            $user_pay->payment_id = $request->razorpay_payment_id;
            $user_pay->amount = $grandtotal;
            $user_pay->order_id = $orderId;
            $user_pay->payment_done = '1';
            $user_pay->save();
            
            return response()->json([
              'success' => true,
              'msg'=>'Thank you'
              ]);

        }
    }
    
    public function book_reading(Request $request)
    {
        if($request->user_id){
            $data= $request->all();
             $user = auth()->user(); 
             return response()->json([
              'success' => true,
              'data'  => $data,
              'user'  => $user
              ]);
        }else{
            return response()->json([
              'success' => false,
              'msg'=>'Please <a href="#loginmodal" class="text-decoration-underline" data-bs-toggle="modal">login</a> to continue'
              ]);
        }
    }
    
    public function pay_book_reading(Request $request)
    {
        $data = new Reading;
        $data->user_id = $request->user_id;
        $data->amount = $request->price;
        $data->reading_id = $request->post_id;
        $data->payment_id = $request->razorpay_payment_id;
        $data->save();
        
        return response()->json([
              'success' => true,
              'msg'=>'Thank you'
              ]);
    }
    
    public function thankyou()
    {
        return view('front.thanku');
    }
    
    public function contact_mail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric'
        ]);
        
        try {
             
            Mail::to('connectsoulrevolution@gmail.com')->send(new Contact($request->all()));
           
        } catch (\Exception $e) {
            // Never reached
            return response()->json([
              'success' => true,
              'error'=>$e->getMessage()
              ]);
        }
        
        return response()->json([
              'success' => true,
              'msg'=>'Thank you for the submission. We will contact you soon.'
              ]);
        
        
    }
    
    public function return_policy()
    {
        return view('front.return-policy');
    }
     public function terms()
    {
        return view('front.terms');
    }
    
    public function disclaimer()
    {
        return view('front.disclaimer');
    }
     public function shipping_policy()
    {
        return view('front.shipping-policy');
    }
    
    public function billing_detail(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'address' => 'required',
        ]);
         if($request->shipping_detail){
            $request->validate(
                [
                    's_address' => 'required',
                    's_city'     => 'required',
                    's_pincode'  => 'required|numeric',
                    's_country'  => 'required',
                    's_state'   => 'required',
                ],
                [
                's_address.required'   =>  'The address field is required.',
                's_city.required'   =>  'The city field is required.',
                's_pincode.required'   =>  'The pincode field is required.',
                's_country.required'   =>  'The country field is required.',
                's_state.required'   =>  'The state field is required.',
                ]
                );
        }    
         $user = auth()->user();
         $d = Billingdetail::where('user_id', $user->id)->first();
         if($d){
             $data = $d;
         }else{
          $data = new Billingdetail;   
         }
        if($request->shipping_detail){
                $dd = Shippingdetail::where('user_id', $user->id)->first();
                 if($dd){
                     $data1 = $dd;
                 }else{
                  $data1 = new Shippingdetail;
                 }
                
                $data1->user_id = $user->id;
                $data1->address = $request->s_address;
                $data1->country = $request->s_country;
                $data1->state = $request->s_state;
                $data1->city = $request->s_city;
                $data1->pincode = $request->s_pincode;
                $data1->save();
            }
        $data->country = $request->country;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->address = $request->address;
        $data->pincode = $request->pincode;
        $data->user_id = $user->id ;
        $data->save();
        
        return response()->json([
              'success' => true,
              'msg'=>'Detail updated successfully.'
              ]);
    }
    
    

}
