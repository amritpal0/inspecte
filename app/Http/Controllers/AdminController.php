<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Vehicles;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Coupon;
use App\Models\postcategory;
use App\Models\ProductImages;
use App\Models\ProductSize;
use App\Models\Gallery;
use App\Models\Topbar;
use App\Models\Usermessage;
use App\Models\Reading;
use App\Models\ProductCategory;
use App\Models\Color;



use Intervention\Image\Facades\Image;
use App\Models\ProductAttributes;

class AdminController extends Controller
{
    public function admin()
    {
        $totalproduct = product::count('id');
        $totalorder = Order::count('id');
        $orderitem = OrderItem::count('product');
        $users = User::where('usertype', '0')->count('id');
        $reading = Reading::count('id');
        $data = compact('totalproduct','totalorder', 'orderitem', 'users', 'reading');
        return view('admin.home', $data);
    }

    public function add_show()
    {
        $url = route('upload');
        $title = "Add Package";
        $title1 = "Add New Package";
        $button = "Submit";
        $data = compact('url', 'title', 'title1', 'button');
        return view('admin.add')->with($data);
    }
    
    public function detail_show()
    {
        $data = Product::orderBy('created_at', 'desc')->get();
        return view('admin.detail', compact('data'));
    }
    
    public function upload(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'name'     => 'required',
                'description' => 'required',
                'vehicle' => 'required',
                'vehicle.*' => 'required',
                'price' => 'required',
                'price.*' => 'required',
                'annual_price' => 'required',
                'annual_price.*' => 'required',
                'image' => 'required|max:2048'
            ]
            );


        $data = new Product;
        $image = $request->image;
        if($image){
            // Generate a thumbnail size version
            $imagePath = public_path('uploads/packages/');
            $imageName = time().'_'.$image->getClientOriginalName();
            $upload = Image::make($image);
    
            // Compress the thumbnail image to reduce its file size
            $upload->encode($image->getClientOriginalExtension(), 50)->save($imagePath . $imageName);

    
 
        }
        $data->french_name = $request->french_name;
        $data->french_description = $request->french_description;
        if(!empty($request->french_slug)){
            $ss = strtolower($request->french_slug);
            $french_slug = str_replace(' ', '-', $ss);
            $data->french_slug = $french_slug;
        }else{
            $ss = strtolower($request->french_name);
            $french_slug = str_replace(' ', '-', $ss);
            $data->french_slug = $french_slug;
        }
        $data->french_meta_title = $request->french_meta_title;
        $data->french_meta_description = $request->french_meta_description;
        $data->french_meta_keyword = $request->french_meta_keyword;


        $data->name = $request->name;
        $data->annual_price = $request->annual_price;
        $data->alt = $request->alt;
        $data->stock = $request->stock;
        $data->image = $imageName;
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->metakeyword = $request->metakeyword;
        $data->description = $request->description;
        if(!empty($request->slug)){
            $s = strtolower($request->slug);
            $slug = str_replace(' ', '-', $s);
            $data->slug = $slug;
        }else{
            $s = strtolower($request->name);
            $slug = str_replace(' ', '-', $s);
            $data->slug = $slug;
        }
        $data->save();
        $id = $data->id;
        
        foreach($request->vehicle as $key => $vehicle){
            if(!empty($vehicle)   && !empty($request->price[$key])){
                $addon = new Vehicles;
                $addon->vehicle = $vehicle;
                $addon->product_id = $id;
                $addon->french_vehicle = $request->french_vehicle[$key];
                $addon->price = $request->price[$key];
                $addon->annual_price = $request->annual_price[$key];
                $addon->save();   
            }
        }

            
        return redirect()->back()->with('msg', 'Package has been uploaded.');

    }
    public function edit($id)
    {
        $url = route('update', $id);
        $title = "Edit detail";
        $title1 = "Edit Package detail.";
        $button = "Update";
        $package = Product::with('vehicle')->find($id);
        $data = compact('url', 'title', 'title1','button', 'package');

        return view('admin.add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'     => 'required',
                'description' => 'required',
                'vehicle' => 'required',
                'vehicle.*' => 'required',
                'price' => 'required',
                'price.*' => 'required',
                'annual_price' => 'required',
                'annual_price.*' => 'required',
            ]
            );

        $product = Product::find($id);
        
        $product->french_name = $request->french_name;
        $product->french_description = $request->french_description;
        if(!empty($request->french_slug)){
            $ss = strtolower($request->french_slug);
            $french_slug = str_replace(' ', '-', $ss);
            $product->french_slug = $french_slug;
        }else{
            $ss = strtolower($request->french_name);
            $french_slug = str_replace(' ', '-', $ss);
            $product->french_slug = $french_slug;
        }
        $product->french_meta_title = $request->french_meta_title;
        $product->french_meta_description = $request->french_meta_description;
        $product->french_meta_keyword = $request->french_meta_keyword;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->tab_title = $request->tab_title;
        $product->alt = $request->alt;
        $product->stock = $request->stock;
        $product->tab_description = $request->tab_description;
        $product->metatitle = $request->metatitle;
        $product->metadescription = $request->metadescription;
        $product->metakeyword = $request->metakeyword;
        
        $product->annual_price = $request->annual_price;
        if($request->image != ""){
            $old_image = public_path('uploads/packages/'.$product->image);
            if(file_exists($old_image)){
                unlink($old_image);
            }
            
            $image = $request->image;
           // Generate a thumbnail size version
            $imagePath = public_path('uploads/packages/');
            $imageName = time().'_'.$image->getClientOriginalName();
            $upload = Image::make($image);
    
            // Compress the thumbnail image to reduce its file size
            $upload->encode($image->getClientOriginalExtension(), 50)->save($imagePath . $imageName);
        }else{
            $imageName = $product->image;
        }
        $product->image = $imageName;
        if(!empty($request->slug)){
            $s = strtolower($request->slug);
            $slug = str_replace(' ', '-', $s);
            $product->slug = $slug;
        }else{
            $s = strtolower($request->name);
            $slug = str_replace(' ', '-', $s);
            $product->slug = $slug;
        }
        $product->update();
        
        foreach($request->vehicle as $key => $vehicle){
            if(!empty($vehicle)  && !empty($request->price[$key])){
                if(isset($request->vehicle_id[$key])){
                    $addon = Vehicles::find($request->vehicle_id[$key]);
                }else{
                    $addon = new Vehicles;
                }
                $addon->vehicle = $vehicle;
                $addon->french_vehicle = $request->french_vehicle[$key];
                $addon->product_id = $id;
                $addon->price = $request->price[$key];
                $addon->annual_price = $request->annual_price[$key];
                $addon->save();   
            }
        }

        return redirect()->back()->with('msg', "Package has been updated.");
    }
    
    public function trash(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id)->delete();
        $attr = ProductAttributes::where('product_id', $id)->delete();
        return redirect()->back()->with('msg', 'Product moved to trash');
        
    }
    
    public function out_stock(Request $request)
    {
        $attr = ProductAttributes::find($request->attr_id);
        if($request->stock){
            $attr->out_stock = $request->stock;
        }else{
            $attr->out_stock = 0;
        }
        $attr->save();
        return response()->json([
            'success' => true
            ]);
    }

    public function delete_size(Request $request)
    {
        $id = $request->size_id;
        $addon = Vehicles::find($id)->delete();
        if($addon){
            return response()->json([
                'success' => true,
                'msg'   => 'Vehicle deleted successfully.'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'msg'   => 'Something went wrong.'
            ]);
        }
    }

    public function img_delete($id)
    {
        
        $img = ProductImages::find($id);
        $image_path = public_path('uploads/products/gallery/'.$img->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $img->delete();
        return redirect()->back();
    }

    public function uploadCkImage(Request $request)
    {
        if($request->hasFile('upload')){
            $imagename = time().'.'.$request->file('upload')->getClientOriginalName();
            $request->file('upload')->move(public_path('/admin/ckeditor'), $imagename);

            $url = asset('admin/ckeditor/'.$imagename);
            return response()->json(['filename' => $imagename, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function trash_data()
    {
        $products = Product::onlyTrashed()->get();
        $data = compact('products');
        return view('admin.trash', $data);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);
        $image_path = public_path('uploads/products/'.$product->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $product->delete();
        
        $productimages = ProductImages::where('product_id', $id)->get();
        $addon = ProductAttributes::find($id)->delete();
        if(!empty($productimages)){
            foreach($productimages as $p){
               $images_path = public_path('uploads/products/gallery/'.$p->image);
                if(file_exists($images_path)){
                    unlink($images_path);
                } 
            }
        }
        $productimages = ProductImages::where('product_id', $id)->delete();
        return redirect()->back()->with('msg', "Product deleted successfully.");
    }

    public function restore(Request $request)
    {
        $id = $request->input('id');
        $product = Product::withTrashed()->find($id)->restore();

        return redirect('/detail')->with('msg', "Product restored.");
    }

    public function orderdetail()
    {
        $data = Order::with('item', 'shipping')->orderBy('id', 'desc')->get(); 
        // dd($data);
        return view('admin.orderdetail', compact('data'));
    }
    
    public function single_order($id)
    {
        $data = Order::where('id', $id)->with('item', 'shipping', 'item.product')->first();
        // dd($data);
        return view('admin.single-order', compact('data'));
    }
    
    public function print_single_order($id)
    {
        $data = Order::where('id', $id)->with('item', 'shipping', 'item.product')->first();
        return view('admin.print-order', compact('data'));
    }

    public function coupon()
    {
        $title = "Add coupon";
        $url = route('add_coupon');
        $btn = "submit";
        $data = compact('title', 'url', 'btn');

        return view('admin.coupons', $data);

    }


    public function size()
    {
        $title = "Add Size";
        $url = route('add_size');
        $btn = "submit";
        $allSize = ProductSize::get();
        $data = compact('title', 'url', 'btn', 'allSize'); 
        
        return view('admin.post-category', $data);
    }

    public function add_size(Request $request)
    {
        $request->validate(
            [
                'size'     => 'required'
            ]
            );
        
        $data = new ProductSize;
        $data->size = $request->size;
        $data->save();
        return redirect()->back()->with('msg', 'Size has been added.');    
        
    }

    public function edit_size($id) 
    {
        $url = route('update_size', $id);
        $title = "Edit Size";
        $btn = "update";
        $size = ProductSize::where('id', $id)->first();
        $allSize = ProductSize::get();
        $data = compact('url', 'title',  'btn', 'size', 'allSize');
        return view('admin.post-category')->with($data);
    }

    public function update_size(Request $request, $id)
    {
        $request->validate(
            [
                'size'     => 'required'
            ]
            );
        $data = ProductSize::find($id);
        $data->size = $request->size;
        $data->save();
        return redirect()->route('size')->with('msg', 'Size has been editted.');
    }

    public function delete_product_size(Request $request)
    {
        $id = $request->input('id');
        $product = ProductSize::find($id)->delete();

        return redirect()->route('size')->with('msg', "Size deleted successfully.");
    }

    public function gallery()
    {
        $img = Gallery::orderBy('id','desc')->get();
        return view('admin.gallery', compact('img'));
    }

    public function gallery_store(Request $request)
    {
        if (!empty($_FILES['file']['name'])) {
            foreach ($_FILES['file']['name'] as $key => $filename) {
                $ext = str_replace('image/', '', $_FILES['file']['type'][$key]);
                $image = time() . uniqid(rand()) . '.' . $ext;
                move_uploaded_file($_FILES['file']['tmp_name'][$key], public_path('/admin/gallery/' . $image));
                $item = new Gallery;
                $item->image = $image;
                $item->save();
            }
        }

        return response()->json([
            'success' => 1,
            'msg' => 'Gallery Saved'
        ]);
       
        // $image = $request->file('file');
        // $avatarName = $image->getClientOriginalName();
        // $image->move(public_path('admin/gallery'),$avatarName);
         
        // $imageUpload = new Gallery;
        // $imageUpload->image = $avatarName;
        // $imageUpload->save();
        // return response()->json(['success'=>$avatarName]);
        
    }


    public function gallery_delete($id)
    {
        $data = Gallery::find($id)->delete();
        return redirect()->back()->with('msg', 'Image deleted');

    }

    public function add_coupon(Request $request)
    {
        // $request->validate(
        //     [
        //         'coupon'     => 'required',
        //         'discount'   => 'required|numeric',
        //         'validupto'  => 'required|date|after:now',
        //     ]
        //     );
        

        $data = new Coupon;
        $data->coupon = $request->coupon;
        $data->discount = $request->discount;
        $data->validupto = $request->validupto;
        $data->save();

        return redirect()->back()->with('msg', 'Coupon added successfully');
    }
    
    public function topbar()
    {
        $product = Topbar::first();
        return view('admin.topbar', compact('product'));
    }
    
    public function addtopbar(Request $request)
    {
        $request->validate(
            [
                'message'     => 'required'
            ]
            );
        $data= Topbar::find($request->id);
        $data->message = $request->message;
        $data->save();
        return redirect()->back()->with('msg', 'Message added successfully');
    }
    
    public function online_user()
    {
        $user = User::where('usertype', '0')->orderBy('id','desc')->with('usermessage')->get(); 
        return response()->json(['users' => $user]);
    }
    
    public function online_user_one($id)
    {
        $user = User::where('usertype', '0')->where('id', $id)->with('usermessage')->first(); 
        return response()->json(['users' => $user]);
    }
    
    public function update_online_user(Request $request, $id)
    {
        // $request->validate(
        //     [
        //         'name'     => 'required',
        //         'email'   =>  'required|email',
        //         'phone'   => 'required|min:10|max:10'
        //     ]
        //     );
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        
        $user = User::find($id);
        
        
        return response()->json([
            'msg'  => 'Detail updated successfully',
            'user'  => $user,
            ]);
    }
    
    public function delete_online_user($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        
        $user1 = User::where('usertype', '0')->orderBy('id','desc')->with('usermessage')->get();
        return response()->json([
            'msg'  => 'User deleted successfully.',
            'users'  => $user1
            ]);
    }
    
    public function message_online_user(Request $request)
    {
        $data = new Usermessage;    
        $data->user_id = $request->user_id;
        $data->message = $request->message;
        $data->date = $request->date;
        $data->save();
        
        $user1 = User::where('usertype', '0')->orderBy('id','desc')->with('usermessage')->get();
        return response()->json([
            'msg'  => 'Message added successfully.',
            'users'  => $user1
            ]);
        
    }
    
    public function edit_message_online_user($id)
    {
        $message = Usermessage::where('id', $id)->first();
        return response()->json(['message' => $message]);
    }
    
    public function delete_message_online_user($id)
    {
        $data = Usermessage::find($id);
        $data->delete();
        return response()->json([
            'msg'  => 'Message deleted successfully.'
            ]);
    }
    
    public function update_message_online_user(Request $request)
    {
        $msg = Usermessage::find($request->id);
        $msg->message = $request->message;
        $msg->date = $request->date;
        $msg->user_id = $request->user_id;
        $msg->save();
        return response()->json([
            'msg'  => 'Message editted successfully.'
            ]);
    }
    
    public function book_reading()
    {
        $data = Reading::with('reading', 'user')->get();
        return view('admin.readings', compact('data'));
    }
    
    
}
