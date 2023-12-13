@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trashed Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Trashed Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Trashed Product</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (session()->has('msg'))
                    <div class="alert alert-info">
                      {{session()->get('msg')}}
                      <button class="close" data-dismiss="alert">x</button>
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  @foreach ($products as $product)
                  <tbody>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product}}</td>
                    <td>{{$product->description}}</td>
                    <td><i class="fas fa-rupee-sign"></i> {{$product->price}}</td>
                    <td><img src="{{asset('admin/product')}}/{{$product->image}}" alt="" class="img-fluid" width="100px" height="100px"></td>
                    <td><a href="#restore" class="btn btn-primary" data-toggle= "modal" data-id="{{$product->id}}">restore</a>
                        <a href="#myModal" class="btn btn-danger" data-toggle="modal" data-id="{{$product->id}}">Delete</a></td>                        
                      
                  </tbody>
                  @endforeach
                </table>
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form  method="post" action="{{route('delete')}}">
                        @csrf
                      <div class="modal-header">
                        <h4 class="modal-title">Delete</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        Do you want to delete the product.
                        <input type="hidden" name="id" id="delete" >                      
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" name="delete">Yes</button>
                        <button class="btn btn-danger" data-dismiss="modal">No</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="restore">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form  method="post" action="{{route('restore')}}">
                          @csrf
                        <div class="modal-header">
                          <h4 class="modal-title">Restore</h4>
                          <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          Do you want to restore the product.
                          <input type="hidden" name="id" id="re_id" >                      
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" type="submit" name="delete">Yes</button>
                          <button class="btn btn-danger" data-dismiss="modal">No</button>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  

@endsection