<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\confirmOrder;
use App\Models\User;
use App\Models\Product;
use App\Models\cart;
use App\Models\order;
use App\Models\orderitem;
use App\Models\Coupon;
Use \Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function users()
    // {
    //     $usertype = Auth::user()->usertype;
    //     if($usertype=='1'){
    //         return view('admin.home');
    //     }else{
    //         $products = Product::all();
    //         return view('user.home', compact('products'));
    //     }
    // }
    
    public function index()
    {
        if(Auth::check()){
            // if(Auth::user()){
                $products = Product::all();
                $user = auth()->user();
                $count = cart::where('userid', $user->id)->where('status', '=', null)->count();
                return view('user.home', compact('products', 'count'));
        //     }            
        }else{
            $count = '0';
            $products = Product::all();
            return view('user.home', compact('products', 'count'));
        }
    }

    public function add_to_cart(Request $request, $id)
    {
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){
                $user = auth()->user();
                $qty = $request->qty;
                // echo "<pre>";
                // print_r($qty);
                // die();
                $cart = new cart;
                $product = Product::find($id);
                $cart->productId = $id;
                $cart->product = $product->product;
                $cart->userid = $user->id;
                $cart->qty = $request->qty;
                $cart->price = $product->price;
                $cart->total = $product->price * $request->qty;
                $cart->save();
                $msg = array(
                    'msg'  =>  'Item added to cart',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($msg);
            }else{
                return view('auth.login');
            }
            
        }else{
            return view('auth.login');
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
            return view('user.cart', compact('items', 'total'));
        }
       
        return view('user.cart');
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function products()
    {
        if(Auth::check()){
            // if(Auth::user()->usertype == '0'){
                $products = Product::all();
                $user = auth()->user();
                $count = cart::where('userid', $user->id)->where('status', '=', null)->count();
                return view('user.products', compact('products', 'count'));
            // }            
        }else{
            $count = '0';
            $products = Product::all();
            return view('user.products', compact('products', 'count'));
        }
       
    }

    public function cart_delete($id)
    {
        $item = cart::find($id)->delete();
         return redirect()->back()->with('msg', 'Item removed from cart.');
    }

    public function placeorder(Request $request)
    {
        if(Auth::id()){
            $request->validate(
                [
                    'name'     => 'required',
                    'email'   => 'required|email',
                    'phone'   => 'required|min:10|max:10',
                    'address' => 'required',
                    'city'     => 'required',
                    'pincode'  => 'required|numeric',
                    'payment' =>  'required'
                ]
                );           
            $user = auth()->user(); 
            $data = new order;
            $name = $request->name;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->city = $request->city;
            $data->pincode = $request->pincode;
            $data->paymentmethod = $request->payment;
            $data->save();
            $id = $data->orderId;        
        
            
            $orderitem = cart::where('userid', '=', $user->id)->where('status', '=', null)->get();
           
            foreach($orderitem as $order){
                $detail = new orderitem;
                $detail->orderid = $id;
                $detail->product = $order->product;
                $detail->qty = $order->qty;
                $detail->price = $order->price;
                $detail->total = $order->qty * $order->price;

                $detail->save();


            }

            $items = orderitem::where('orderId', '=', $id)->get();
            $total = orderitem::where('orderId', '=', $id)->sum('total');
            $cid = $request->input('cid');
            $coupon = Coupon::where('coupon_id', '=', $cid)->first();
                       
            Mail::to($request->email)->send(new confirmOrder($items, $name, $total, $coupon));
            

            
            $items = cart::where('userid', '=', $user->id)->update(['status' => 'ordered']);
                    $status = new Coupon;
                    $status->status = 'used';
                    $status->userid = $user->userid;
                    $status->save;

           
            $coupon = Coupon::where('coupon_id', '=', $cid)->update(['status' => 'used', 'userid' => $user->id]);

           
    
            return redirect('/')->with('msg', 'Order has been placed');
        }else{
            return redirect('/login');
        }
    }

    public function coupon(Request $request)
    {
        if(Auth::id()){
            $user = auth()->user();
            $coupon = $request->coupon;
            $coupons = Coupon::where('coupon', '=', $coupon)
                               ->where('userid', '=', null)
                               ->where('status', '=', null)->first();
            if($coupons){
                if($coupons->validupto >= date('Y-m-d') ){
                    $discount = $coupons->discount;
                    $couponid = $coupons->coupon_id;                   
                  
                     return redirect()->back()->with('dd', $discount)->with('msg', 'Coupon added successfully.')->with('cid', $couponid);
  
                  }else{
                      return redirect()->back()->with('msg', 'Coupon expired');
                  }
            }else{
                return redirect()->back()->with('msg', 'Invalid Coupon or coupon expired');
            }                   
                        
        }

    }
}

