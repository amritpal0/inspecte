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
                <div class="col-md-12">
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data" action="{{$url}}">
                        @csrf
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
                            <div class="card-body">
                                <!-- Tabs navs -->
                                <ul class="nav nav-tabs">
                                    <li class="active nav-item"><a href="#general" class="nav-link active"
                                            data-toggle="tab">Package</a></li>
                                    <li class="nav-item"><a href="#advanced1" class="nav-link"
                                            data-toggle="tab">Advanced</a>
                                    </li>
                                </ul>
                                <!-- Tabs navs -->
                                <!-- Tabs content -->
                                <div class="tab-content mt-4">
                                    <div class="tab-pane fade active show" id="general">
                                        {{--<div class="form-group">
                                            <label>Category</label>
                                            <select name="category" id="" class="form-control">
                                                <option value="0">Select Category</option>
                                                @foreach($cat as $c)
                                                    @if(isset($product))
                                                    <option value="{{$c->id}}" {{(@$product->category->id == $c->id)? 'selected': ''}}>{{$c->name}}</option>
                                                    @else
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                                @error('category')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>--}}
                                        <div class="form-group">
                                            <label>Package Name</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($package->name)? $package->name: old('name') }}"
                                                placeholder="Enter package name" name="name">
                                            <span class="text-danger">
                                                @error('name')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Annual Price</label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($package->annual_price)? $package->annual_price: old('annual_price') }}"
                                                    placeholder="Enter annula price" name="annual_price">
                                                <span class="text-danger">
                                                    @error('annual_price')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label>Slug</label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($package->slug)? $package->slug: old('slug') }}"
                                                    placeholder="Enter package slug" name="slug">
                                                <span class="text-danger">
                                                    @error('slug')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description of Package</label>
                                            <textarea class="form-control"
                                                placeholder="Enter something about package..." name="description"
                                                id="description"
                                                rows="3">{{isset($package->description)? $package->description: old('description') }}</textarea>
                                            <span class="text-danger">
                                                @error('description')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="exampleInputFile">Featured image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            value="{{isset($package)? $package->image: old('image')}}"
                                                            id="customFile" name="image">
                                                        <label class="custom-file-label"
                                                            for="customFile">{{isset($package)? $package->image: old('image') }}</label>
                                                        <input type="hidden" name="old_img" value="">
                                                    </div>
                                                </div>
                                                <span class="text-danger">
                                                    @error('image')
                                                    {{$message}}
                                                    @enderror
                                                </span>
                                                @if(isset($package->image))
                                                <img src="{{asset('uploads/packages')}}/{{$package->image}}" alt=""
                                                    class="img-fluid mt-3" width="100px" height="100px">
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Alt: </label>
                                                <input type="text" class="form-control"
                                                    value="{{isset($package->alt)? $package->alt: old('alt') }}"
                                                    placeholder="Enter alt" name="alt">
                                            </div>
                                        </div>
                                       {{--<div class="form-group">
                                            <label for="exampleInputFile">Product Gallery</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" multiple class="custom-file-input"
                                                        value="{{isset($product->product)? $product->image: old('image')}}"
                                                        id="customFile" name="imagegallery[]">
                                                    <label class="custom-file-label" for="customFile">
                                                        @if(isset($productimages))
                                                        @foreach($productimages as $p_img)
                                                        {{$p_img->image}}
                                                        @endforeach
                                                        @endif
                                                    </label>
                                                    <input type="hidden" name="old_img" value="">
                                                </div>
                                            </div>
                                            <span class="text-danger">
                                                @error('imagegallery')
                                                {{$message}}
                                                @enderror
                                            </span>
                                            @if(isset($productimages))
                                            @foreach($productimages as $p)
                                            <div class="position-relative d-inline">
                                                <a href="{{route('img_delete', $p->id)}}">
                                                    <img src="{{asset('uploads/products/gallery')}}/{{$p->image}}" alt=""
                                                        class="img-fluid img_gallery  mt-3" width="100px"
                                                        height="100px">
                                                    <span class="img-delete position-absolute"><i
                                                            class="fas fa-times-circle"></i></span></a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                @if(isset($product->hotselling))
                                                <input type="checkbox" class="form-check-input" value="1"
                                                    name="hotselling"
                                                    {{($product->hotselling == '1')? 'checked' : old('image')}}>Hot
                                                Selling
                                                @else
                                                <input type="checkbox" class="form-check-input" value="1"
                                                    name="hotselling">Hot Selling
                                                @endif
                                            </label>
                                        </div>--}}
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="1" name="stock"
                                                    {{isset($package->stock)? 'checked' : old('image')}}>Out of Stock
                                            </label>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade mt-40 mb-40" id="advanced1">
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($package->metatitle)? $package->metatitle: old('metatitle') }}"
                                                placeholder="Enter meta title" name="metatitle">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" row="4"
                                                placeholder="Enter the meta Description"
                                                name="metadescription">{{isset($package->metadescription)? $package->metadescription: old('metadescription') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($package->metakeyword)? $package->metakeyword: old('metakeyword') }}"
                                                placeholder="Enter meta keyword name" name="metakeyword">
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabs content -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Package Attributes</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <!-- Tabs content -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show  active mb-40">
                                        <div class="attr-section" field_count=1>
                                            @if(isset($package->vehicle))
                                                @foreach($package->vehicle as $key => $p)
                                                    @if($key == 0)
                                                    <div class="row" >
                                                        <input type="hidden" value="{{$p->id}}" class="form-control" placeholder="Enter size"
                                                                name="vehicle_id[]">
                                                        <div class="form-group col-md-3">
                                                            <label>Vehicle</label>
                                                            <input type="text" value="{{$p->vehicle}}" class="form-control" placeholder="Enter vehicle"
                                                                name="vehicle[]">
                                                                <span class="text-danger">
                                                                    @error('vehicle.0')
                                                                    The vehicle field is required
                                                                    @enderror
                                                                </span>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Price <small>per month</small></label>
                                                            <input type="text" value="{{$p->price}}" class="form-control" placeholder="Enter price"
                                                                name="price[]">
                                                                <span class="text-danger">
                                                                    @error('price.0')
                                                                    The Price field is required
                                                                    @enderror
                                                                </span>
                                                        </div>
                                                        <div class="align-items-center col-md-2 d-flex form-group">
                                                            <a class="add_button_price mt-4 btn pb-0" href="javascript:void(0)"><i
                                                                    class="fas fa-plus-square"></i></a>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="row" >
                                                        <input type="hidden" value="{{$p->id}}" class="form-control" placeholder="Enter size"
                                                                name="vehicle_id[]">
                                                        <div class="form-group col-md-3">
                                                            <label>Vehicle</label>
                                                            <input type="text" value="{{$p->vehicle}}" class="form-control" placeholder="Enter vehicle"
                                                                name="vehicle[]">
                                                                <span class="text-danger">
                                                                    @error('vehicle.0')
                                                                    The vehicle field is required
                                                                    @enderror
                                                                </span>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Price <small>per month</small></label>
                                                            <input type="text" value="{{$p->price}}" class="form-control" placeholder="Enter price"
                                                                name="price[]">
                                                                <span class="text-danger">
                                                                    @error('price.0')
                                                                    The Price field is required
                                                                    @enderror
                                                                </span>
                                                        </div>
                                                        <div class="align-items-center col-md-2 d-flex form-group">
                                                            <a class="delete_button_price mt-4 btn pb-0" size-id="{{$p->id}}" href="javascript:void(0)"><i
                                                                    class="fas fa-minus-square"></i></a>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            @else
                                            <div class="row" >
                                                <div class="form-group col-md-3">
                                                    <label>Vehicle</label>
                                                    <input type="text" class="form-control" placeholder="Enter vehicle"
                                                        name="vehicle[]">
                                                        <span class="text-danger">
                                                            @error('vehicle.0')
                                                            The vehicle field is required
                                                            @enderror
                                                        </span>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Price per month</label>
                                                    <input type="text" class="form-control" placeholder="Enter price"
                                                        name="price[]">
                                                        <span class="text-danger">
                                                            @error('price.0')
                                                            The price field is required
                                                            @enderror
                                                        </span>
                                                </div>
                                                <div class="align-items-center col-md-2 d-flex form-group">
                                                    <a class="add_button_price mt-4 btn pb-0" href="javascript:void(0)"><i
                                                            class="fas fa-plus-square"></i></a>
                                                </div>
                                            </div>
                                            @endif
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
                </form>
            </div>
        </div>
    </section>
</div>

@endsection
@push('custom-script')

@if(isset($package))
    @foreach($package->attr as $key => $p)
    <script>
        $('.product_stock_{{$key}}').on('change', function(){
             var checkboxValue = $(this).is(':checked') ? 1 : 0;
             var attr_id = $(this).attr('attr-id');
             $.ajax({
                 type: "POST",
                 url: "{{route('out_stock')}}",
                 data:{
                     stock:checkboxValue ,
                     attr_id:attr_id
                 },
                 success:function(response){
                     console.log(response);
                 },
                 error:function(response){
                     console.log(response);
                 }
             })
        })
    </script>
    @endforeach
@endif    

<script>
var myEditor;
ClassicEditor
    .create(document.querySelector('#description2'), {
        ckfinder: {
            uploadUrl: "{{route('ckeditor.upload').'?_token='.csrf_token()}}"
        }
    })
    .then(editor => {
        myEditor = editor;
    })
    .catch(error => {
        console.error(error);
    });


$('.add_button_price').on('click', function() {
    var count = $('.attr-section').attr('field_count');
    
    var newRow = `
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Vehicle</label>
                        <input type="text"  class="form-control" placeholder="Enter vehicle"
                            name="vehicle[]">
                            <span class="text-danger">
                                @error('vehicle.0')
                                The vehicle field is required
                                @enderror
                            </span>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Price per month</label>
                        <input type="text" class="form-control" placeholder="Enter price"
                            name="price[]">
                            <span class="text-danger">
                                @error('price.0')
                                The size field is required
                                @enderror
                            </span>
                    </div>
                    <div class="align-items-center col-md-2 d-flex form-group">
                        <a class="delete_button_price btn pb-0 mt-4" href="javascript:void(0)"><i
                                class="fas fa-minus-square"></i></a>
                    </div>
                </div>
            `;
        count++ ;
        $('.attr-section').attr('field_count', count);   
    $(".attr-section").append(newRow);
})
$('.attr-section').on('click', '.delete_button_price', function() {
    var element = $(this);
    var size_id = $(this).attr('size-id');
    if(size_id == null){
        element.closest('.row').remove();
    }else{
        $.ajax({
            type: "POST",
            url: "{{route('delete_size')}}",
            data: {
                size_id: size_id
            },
            success:function(response){
                if(response.success == true){
                    element.closest('.row').remove();
                }else{
                    alert('Something went wrong');
                }
            },
            error:function(error){
                console.log(error);
            }
        })
    }
});
</script>
@endpush