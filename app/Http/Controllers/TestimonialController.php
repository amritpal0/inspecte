<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.all-testimonials', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $url = route('testimonial.store');
        $title = "Add Testimonial";
        $title1 = "Add New Testimonial.";
        $button = "Submit";
        $img = Testimonial::orderBy('id','desc')->get();
        $data = compact('img');
        return view('admin.add-testimonial')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($_FILES['file']['name'])) {
            foreach ($_FILES['file']['name'] as $key => $filename) {
                $ext = str_replace('image/', '', $_FILES['file']['type'][$key]);
                $image = time() . uniqid(rand()) . '.' . $ext;
                move_uploaded_file($_FILES['file']['tmp_name'][$key], public_path('/admin/testimonials/' . $image));
                $item = new Testimonial;
                $item->featured_image = $image;
                $item->save();
            }
        }

        return response()->json([
            'success' => 1,
            'msg' => 'Testimonial Saved'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = route('testimonial.update', $id);
        $title = "Edit Testimonial";
        $title1 = "Edit your Testimonial.";
        $button = "update";
        $post = Testimonial::find($id);
        $data = compact('url', 'title', 'title1', 'button', 'post');

        return view('admin.add-testimonial')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title'     => 'required',
                'description' => 'required'
            ]
            );
        $data = Testimonial::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->designation = $request->designation;
        if($request->image != ""){
            $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $request->file('image')->move(public_path('/admin/testimonials'), $imagename);  
        }else{
            $imagename = $data->featured_image;
        }
        $data->featured_image = $imagename;
        $data->update();

        return redirect('/testimonial')->with('msg', "Detail has been updated.");
    }

    public function testimonial_delete($id)
    {
        $post = Testimonial::find($id)->delete();

        return redirect()->back()->with('msg', 'Testimonial deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
