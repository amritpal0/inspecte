@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$title1}}</h3>
                        </div>
                        @if (session()->has('msg'))
                        <div class="alert alert-success m-3">
                            {{session()->get('msg')}}
                            <button class="close" type="button" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data" action="{{$url}}">
                            @csrf
                            @if(isset($product))
                            @method('put')
                            @endif
                            <div class="card-body">
                                <!-- Tabs content -->
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="general">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($product->title)? $product->title: old('title') }}"
                                                placeholder="Enter title" name="title">
                                            <span class="text-danger">
                                                @error('title')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control"
                                                placeholder="Enter something about product..." name="description"
                                                id="description2"
                                                rows="3">{{isset($product->description)? $product->description: old('description') }}</textarea>
                                            <span class="text-danger">
                                                @error('description')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="exampleInputFile">Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            value="{{isset($product->image)? $product->image: old('image')}}"
                                                            id="customFile" name="image">
                                                        <label class="custom-file-label"
                                                            for="customFile">{{isset($product->image)? $product->image: old('image') }}</label>
                                                        <input type="hidden" name="old_img" value="">
                                                    </div>
                                                </div>
                                                <span class="text-danger">
                                                    @error('image')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                                @if(isset($product->image))
                                                <img src="{{asset('uploads/banners/').'/'.$product->image}}" alt=""
                                                    class="img-fluid mt-3" width="100px" height="100px">
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Alt: </label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($product->alt)? $product->alt: old('alt') }}"
                                                    placeholder="Enter alt" name="alt">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Tabs content -->
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">{{$button}}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
    </section>
</div>

@endsection

@push('custom-script')

@endpush