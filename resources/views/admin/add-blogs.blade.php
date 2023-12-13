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
                            @if(isset($post))
                            @method('put')
                            @endif
                            <div class="card-body">
                                <!-- Tabs navs -->
                                <ul class="nav nav-tabs">
                                    <li class="active nav-item"><a href="#general" class="nav-link active"
                                            data-toggle="tab">General</a></li>
                                    <li class="nav-item"><a href="#advanced" class="nav-link"
                                            data-toggle="tab">Advanced</a>
                                    </li>
                                </ul>
                                <!-- Tabs navs -->
                                <!-- Tabs content -->
                                <div class="tab-content mt-4">
                                    <div class="tab-pane fade active show" id="general">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($post->title)? $post->title: old('post') }}"
                                                placeholder="Enter Title" name="title">
                                            <span class="text-danger">
                                                @error('title')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($post->slug)? $post->slug: old('slug') }}"
                                                placeholder="Enter post slug" name="slug">
                                            <span class="text-danger">
                                                @error('title')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea class="form-control" id="short_description"
                                                placeholder="Enter short Description" row="3"
                                                name="short_description">{{isset($post->short_description)? $post->short_description: old('short_description') }}</textarea>
                                            <span class="text-danger">
                                                @error('short_description')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control" id="description"
                                                placeholder="Enter the Description"
                                                name="description">{{isset($post->description)? $post->description: old('description') }}</textarea>
                                            <span class="text-danger">
                                                @error('description')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row">
                                                <div class="form-group col-md-8">
                                                    <label for="exampleInputFile">Featured image:</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                value="{{isset($post->featured_image)? $post->featured_image: old('featured_image')}}"
                                                                id="customFile" name="image">
                                                            <label class="custom-file-label"
                                                                for="customFile">{{isset($post->featured_image)? $post->featured_image: old('featured_image') }}</label>
                                                            <input type="hidden" name="old_img" value="">
                                                        </div>
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('image')
                                                        {{$message}}
                                                        @enderror
                                                    </span>
                                                    @if(isset($post->featured_image))
                                                    <img src="{{asset('admin/blogs')}}/{{$post->featured_image}}" alt=""
                                                        class="img-fluid mt-3" width="100px" height="100px">
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label>Alt: </label>
                                                    <input type="text" class="form-control"
                                                        value="{{isset($post->alt)? $post->alt: old('alt') }}"
                                                        placeholder="Enter alt" name="alt">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade mt-40 mb-40" id="advanced">
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($post->metatitle)? $post->metatitle: old('metatitle') }}"
                                                placeholder="Enter meta title" name="metatitle">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" row="4"
                                                placeholder="Enter the meta Description"
                                                name="metadescription">{{isset($post->metadescription)? $post->metadescription: old('metadescription') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($post->metakeyword)? $post->metakeyword: old('metakeyword') }}"
                                                placeholder="Enter meta keyword name" name="metakeyword">
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabs content -->
                            </div>
                            <!-- /.card-body -->

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
<script>
var myEditor;
ClassicEditor
    .create(document.querySelector('#description'), {
        ckfinder: {
            uploadUrl: "{{route('ckeditor.upload').'?_token='.csrf_token()}}"
        }
    })
    .then(editor => {
        console.log('Editor was initialized', editor);
        myEditor = editor;
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endpush