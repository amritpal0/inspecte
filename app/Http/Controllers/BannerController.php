<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::orderBy('created_at', 'desc')->get();
        return view('admin.banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('banners.store');
        $title = "Add Banner";
        $title1 = "Add New Banner.";
        $button = "Submit";
        $data = compact('url', 'title', 'title1', 'button');
        return view('admin.banner.form')->with($data);
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
                'title'     => 'required',
                'description' => 'required',
                'image' => 'required'
            ]
            );
        $data = new Banner;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->alt = $request->alt;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $request->file('image')->move(public_path('/uploads/banners'), $imagename);  
        $data->image = $imagename;
        $data->save();
        return redirect()->back()->with('msg', 'Banner has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = route('banners.update', $id);
        $title = "Edit Banner";
        $title1 = "Edit your Banner.";
        $button = "Update";
        $product = Banner::find($id);
        $data = compact('url', 'title', 'title1', 'button', 'product');

        return view('admin.banner.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title'     => 'required',
                'description' => 'required',
            ]
            );
        $data = Banner::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->alt = $request->alt;
        if($request->image != ""){
            $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $request->file('image')->move(public_path('/uploads/banners'), $imagename);  
        }else{
            $imagename = $data->image;
        }
        $data->image = $imagename;
        $data->update();

        return redirect()->back()->with('msg', "Banner has been updated.");
    }
    
    public function banner_delete(Request $request)
    {
        $id = $request->input('id');
        $post = Banner::find($id)->delete();

        return redirect()->back()->with('msg', 'Banner deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
