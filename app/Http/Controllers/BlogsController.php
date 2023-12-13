<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blogs::orderBy('created_at', 'desc')->get();
        return view('admin.all-blogs', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('adminblogs.store');
        $title = "Add Blog";
        $title1 = "Add New Blog.";
        $button = "Submit";
        $data = compact('url', 'title', 'title1', 'button');
        return view('admin.add-blogs')->with($data);
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
        $data = new Blogs;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->short_description = $request->short_description;
        $data->alt = $request->alt;
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->metakeyword = $request->metakeyword;
        $image = $request->image;
        if(!empty($request->slug)){
            $s = strtolower($request->slug);
            $slug1 = str_replace(' ', '-', $s);
            $slug = preg_replace('/[\@\.\;\" "]+/', '', $slug1);
            $data->slug = $slug;
        }else{
            $s = strtolower($request->title);
           $slug1 = str_replace(' ', '-', $s);
            $slug = preg_replace('/[\@\.\;\" "]+/', '', $slug1);
            $data->slug = $slug;
        }
        $imagename = time().'.'.$image->getClientOriginalName();
        $request->file('image')->move(public_path('/admin/blogs'), $imagename);  
        $data->featured_image = $imagename;
        $data->save();
        return redirect()->back()->with('msg', 'Blog has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = route('adminblogs.update', $id);
        $title = "Edit Blog";
        $title1 = "Edit your Blog.";
        $button = "update";
        $post = Blogs::find($id);
        $data = compact('url', 'title', 'title1', 'button', 'post');

        return view('admin.add-blogs')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
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
        $data = Blogs::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->short_description = $request->short_description;
        $data->alt = $request->alt;
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->metakeyword = $request->metakeyword;
        if(!empty($request->slug)){
            $s = strtolower($request->slug);
            $slug1 = str_replace(' ', '-', $s);
            $slug = preg_replace('/[\@\.\;\" "]+/', '', $slug1);
            $data->slug = $slug;
        }else{
            $s = strtolower($request->title);
            $slug1 = str_replace(' ', '-', $s);
            $slug = preg_replace('/[\@\.\;\?]+/', '', $slug1);
            $data->slug = $slug;
        }
        if($request->image != ""){
            $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $request->file('image')->move(public_path('/admin/blogs'), $imagename);  
        }else{
            $imagename = $data->featured_image;
        }
        $data->featured_image = $imagename;
        $data->update();

        return redirect()->back()->with('msg', "Detail has been updated.");
    }

    public function blog_delete(Request $request)
    {
        $id = $request->input('id');
        $post = Blogs::find($id)->delete();

        return redirect()->back()->with('msg', 'Blog deleted successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $blogs)
    {
        //
    }
}
