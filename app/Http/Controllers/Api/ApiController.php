<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\User;
use App\Models\Product;

class ApiController extends Controller
{
    
    //dashboard
    public function dashboard()
    {
        $product = Product::orderBy('id', 'desc')->select('id', 'product', 'price', 'image', 'slug')->get();
        return response()->json([
            'success' => true,
            'product' => $product
            ]);
    }
    
    //send otp 
    public function send_otp(Request $request)
    {
         try{
             $validator = Validator::make($request->all(), [
                'phone' => 'required',
            ]);
        
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $phone = $request->phone;
            $otp  = rand ( 10000 , 99999 );
            $data = User::where('phone', $phone)->first();
            if(empty($data)){
                return response()->json([
                    "success" => false,
                    "msg"    => "Account not found."
                    ]);    
            }
            $data->otp = $otp;
            $data->save();
            return response()->json([
                    "success" => true,
                    "msg"    => "Otp sent successfully."
                    ]);
        }
        catch(Exception $e) {
            return response()->json([
                "success" => false,
                "msg"    => $e->getMessage()
                ]);
        }
    }
    
    
    //verify otp
    public function verify_otp(Request $request)
    {
        try{
             $validator = Validator::make($request->all(), [
                'otp' => 'required',
            ]);
        
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $phone = $request->phone;
            $otp = $request->otp;
            $user = User::where('phone', $phone)->first();
            if($user->otp != $otp){
                return response()->json([
                    "success" => false,
                    "msg"    => "Wrong otp."
                    ]);
            }
            
            $auth = Auth::loginUsingId($user->id);
            return response()->json([
                "success" => true,
                "msg"    => "Logged in successfully."
                ]);
        }
        catch(Exception $e) {
            return response()->json([
                "success" => false,
                "msg"    => $e->getMessage()
                ]);
        }
    }
    
    
    //single product
    public function single_product($slug)
    {
        $product = Product::where('slug', $slug)->with(['size' => function($query){
                        $query->select('id', 'product_id', 'size', 'weight', 'out_stock');
                    },'gallery' => function($query){
                        $query->select('id', 'product_id','image');
                    }])->select('id', 'product', 'price', 'description', 'image', 'alt')->first();
        if(empty($product)){
            return response()->json([
                'success' => false,
                'product' => 'No product found'
                ]);
        }
        return response()->json([
            'success' => true,
            'product' => $product
            ]);
    }
    
}
