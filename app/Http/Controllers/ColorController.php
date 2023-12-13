<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Add Color";
        $url = route('color.store');
        $btn = "Submit";
        $colors = Color::get();
        $data = compact('title', 'url', 'btn', 'colors'); 
        
        return view('admin.color.index', $data);
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
                'color'     => 'required'
            ]
            );
        
        $data = new Color;
        $data->color = $request->color;
        $data->save();
        return redirect()->back()->with('msg', 'Color has been added.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = route('color.update', $id);
        $title = "Edit Color";
        $title1 = "Edit Color.";
        $btn = "Update";
        $color = Color::find($id);
        $colors = Color::get();
        $data = compact('url', 'title', 'title1','color', 'btn', 'colors');

        return view('admin.color.index')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'color'     => 'required',
            ]
            );
        $data = Color::find($id);
        $data->color = $request->color;
        $data->update();

        return redirect()->route('color.index')->with('msg', "Color has been updated.");
    }

    public function color_delete(Request $request)
    {
        $id = $request->input('id');
        $post = Color::find($id)->delete();

        return redirect()->back()->with('msg', 'Color deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
}
