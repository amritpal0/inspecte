<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Add Product Category";
        $url = route('product-category.store');
        $btn = "Submit";
        $category = ProductCategory::get();
        $data = compact('title', 'url', 'btn', 'category'); 
        
        return view('admin.productCategory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'     => 'required'
            ]
            );
        
        $data = new ProductCategory;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $image = $request->image;
        if(!empty($request->slug)){
            $s = strtolower($request->slug);
            $slug1 = str_replace(' ', '-', $s);
            $slug = preg_replace('/[\@\.\;\" "]+/', '', $slug1);
            $data->slug = $slug;
        }else{
            $s = strtolower($request->name);
           $slug1 = str_replace(' ', '-', $s);
            $slug = preg_replace('/[\@\.\;\" "]+/', '', $slug1);
            $data->slug = $slug;
        }
        if($image){

            $imagename = time().'.'.$image->getClientOriginalName();
            $request->file('image')->move(public_path('/uploads/category'), $imagename);  
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('msg', 'Category has been added.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = route('product-category.update', $id);
        $title = "Edit Product Category";
        $title1 = "Edit Category.";
        $btn = "Update";
        $cat = ProductCategory::find($id);
        $category = ProductCategory::get();
        $data = compact('url', 'title', 'title1','category', 'btn', 'cat');

        return view('admin.productCategory.index')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'     => 'required',
            ]
            );
        $data = ProductCategory::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $image = $request->image;
        if(!empty($request->slug)){
            $s = strtolower($request->slug);
            $slug1 = str_replace(' ', '-', $s);
            $slug = preg_replace('/[\@\.\;\" "]+/', '', $slug1);
            $data->slug = $slug;
        }else{
            $s = strtolower($request->name);
            $slug1 = str_replace(' ', '-', $s);
            $slug = preg_replace('/[\@\.\;\?]+/', '', $slug1);
            $data->slug = $slug;
        }
        if($request->image != ""){
            $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $request->file('image')->move(public_path('/uploads/category'), $imagename);  
        }else{
            $imagename = $data->image;
        }
        $data->image = $imagename;
        $data->update();

        return redirect()->route('product-category.index')->with('msg', "Category has been updated.");
    }


    public function category_delete(Request $request)
    {
        $id = $request->input('id');
        $post = ProductCategory::find($id)->delete();
        $product = Product::where('category_id', $id)->get();
        if(!$product->isEmpty()){
            Product::where('category_id', $id)->delete();
        }

        return redirect()->back()->with('msg', 'Product category deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
