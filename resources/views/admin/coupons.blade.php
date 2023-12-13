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
              <form method = "post" enctype="multipart/form-data" action="{{$url}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Coupon Name:</label>
                    <input type="text" class="form-control" value="{{isset($product->product)? $product->product: old('coupon') }}" placeholder="Enter coupon" name="coupon">
                    <span class="text-danger">
                        @error('coupon')
                        {{$message}}                          
                        @enderror
                      </span>
                  </div>
                <div class="form-group">
                    <label>Discount:</label>
                    <input type="text" class="form-control" value="{{isset($product->product)? $product->price: old('discount') }}" placeholder="Enter discount" name="discount">
                    <span class="text-danger">
                        @error('discount')
                        {{$message}}                          
                        @enderror
                    </span>  
                </div>
                <div class="form-group">
                  <label>Valid upto:</label>
                  <input type="date" class="form-control" value="{{isset($product->product)? $product->qty: old('validupto') }}" name="validupto">
                  <span class="text-danger">
                    @error('validupto')
                        {{$message}}                          
                        @enderror
                   </span>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">{{$btn}}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </section>
</div>
    
@endsection