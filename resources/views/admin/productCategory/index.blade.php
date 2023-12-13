@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Product Category</li>
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
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
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
                            @if(isset($cat))
                                @method('put')
                            @endif    
                            <div class="card-body">
                                <!-- Tabs navs -->
                                <ul class="nav nav-tabs">
                                   <li class="active nav-item"><a href="#general" class="nav-link active"
                                           data-toggle="tab">General</a></li>
                                   <li class="nav-item"><a href="#meta" class="nav-link" data-toggle="tab">Advanced</a>
                                   </li>
                                </ul>
                                <!-- Tabs navs -->
                                <!-- Tabs content -->
                                <div class="tab-content mt-4">
                                    <div class="tab-pane fade active show" id="general">
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($cat->name)? $cat->name: old('name') }}"
                                                placeholder="Enter Product Category" name="name">
                                            <span class="text-danger">
                                                @error('name')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($cat->slug)? $cat->slug: old('slug') }}"
                                                placeholder="Enter slug" name="slug">
                                            <span class="text-danger">
                                                @error('title')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control h-auto" id="description"
                                                placeholder="Enter the Description"
                                                name="description">{{isset($cat->description)? $cat->description: old('description') }}</textarea>
                                            <span class="text-danger">
                                                @error('description')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row">
                                             <div class="form-group col-md-12">
                                                <label for="exampleInputFile">Featured image:</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            value="{{isset($cat->image)? $cat->image: old('image')}}"
                                                            id="customFile" name="image">
                                                        <label class="custom-file-label"
                                                            for="customFile">{{isset($cat->image)? $cat->image: old('image') }}</label>
                                                        <input type="hidden" name="old_img" value="">
                                                    </div>
                                                </div>
                                                <span class="text-danger">
                                                    @error('image')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                                @if(isset($cat->image))
                                                <img src="{{asset('uploads/category')}}/{{$cat->image}}" alt=""
                                                    class="img-fluid mt-3" width="100px" height="100px">
                                                @endif
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="tab-pane fade mt-40 mb-40" id="meta">
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($cat->meta_title)? $cat->meta_title: old('meta_title') }}"
                                                placeholder="Enter meta title" name="meta_title">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" row="4"
                                                placeholder="Enter the meta Description"
                                                name="metadescription">{{isset($cat->meta_description)? $cat->meta_description: old('meta_description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($cat->meta_keyword)? $cat->meta_keyword: old('meta_keyword') }}"
                                                placeholder="Enter meta keyword name" name="meta_keyword">
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabs content -->
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="submit">{{$btn}}</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example12" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($category as $cat)
                            <tbody>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$cat->name}}</td>
                                <td><a href="{{route('product-category.edit', $cat->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="#myModal" class="btn btn-danger" data-toggle="modal"
                                        data-id="{{$cat->id}}">Delete</a>
                                </td>

                            </tbody>
                            @endforeach
                        </table>


                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form method="post" action="{{route('category_delete')}}">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete</h4>
                                            <button class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete this category.
                                            <input type="hidden" name="id" id="delete">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit" name="delete">Yes</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">No</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
</div>

@endsection
@push('custom-script')

@endpush