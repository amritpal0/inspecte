<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\postcategory;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.all-post', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('post.store');
        $title = "Add Post";
        $title1 = "Add New Post.";
        $button = "Submit";
        $p_cat = postcategory::all();
        $data = compact('url', 'title', 'title1', 'button', 'p_cat');
        return view('admin.add-post')->with($data);
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
                'postcategory' => 'required',
                'image' => 'required'
            ]
            );
        $data = new Post;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->short_description = $request->short_description;
        $data->btn_name = $request->btn_name;
        $data->btn_link = $request->btn_link;
        $data->alt = $request->alt;
        $data->metatitle = $request->metatitle;
        $data->metadescription = $request->metadescription;
        $data->metakeyword = $request->metakeyword;
        if(!empty($request->slug)){
            $s = strtolower($request->slug);
            $slug = str_replace(' ', '-', $s);
            $data->slug = $slug;
        }else{
            $s = strtolower($request->title);
            $slug = str_replace(' ', '-', $s);
            $data->slug = $slug;
        }
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $request->file('image')->move(public_path('/admin/post'), $imagename);  
        $data->featured_image = $imagename;
        $data->postcategory = $request->postcategory;
        $data->save();
        return redirect()->back()->with('msg', 'Post has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = route('post.update', $id);
        $title = "Edit Post";
        $title1 = "Edit your Post.";
        $button = "update";
        $post = Post::find($id);
        $s_cat = postcategory::where('id', $post->postcategory)->first();
        $p_cat = postcategory::all();
        $data = compact('url', 'title', 'title1', 'button', 'post', 'p_cat', 's_cat');

        return view('admin.add-post')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title'     => 'required',
                'description' => 'required',
                'postcategory' => 'required'
            ]
            );
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->short_description = $request->short_description;
        $data->postcategory = $request->postcategory;
        $data->btn_name = $request->btn_name;
         $data->price = $request->price;
        $data->btn_link = $request->btn_link;
        $data->metatitle = $request->metatitle;
        $data->alt = $request->alt;
        $data->metadescription = $request->metadescription;
        $data->metakeyword = $request->metakeyword;
        if(!empty($request->slug)){
            $s = strtolower($request->slug);
            $slug = str_replace(' ', '-', $s);
            $data->slug = $slug;
        }else{
            $s = strtolower($request->title);
            $slug = str_replace(' ', '-', $s);
            $data->slug = $slug;
        }
        if($request->image != ""){
            $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $request->file('image')->move(public_path('/admin/post'), $imagename);  
        }else{
            $imagename = $data->featured_image;
        }
        $data->featured_image = $imagename;
        $data->update();

        return redirect('/post')->with('msg', "Detail has been updated.");
    }

    public function post_delete(Request $request)
    {
        $id = $request->input('id');
        $post = Post::find($id)->delete();

        return redirect()->back()->with('msg', 'Post deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
