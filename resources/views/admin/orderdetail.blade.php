@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders detail</li>
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
                <h3 class="card-title">Orders detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (session()->has('msg'))
                    <div class="alert alert-info">
                      {{session()->get('msg')}}
                      <button class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-hover outer-order-table">
                  <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  @php
                      $count = 0;
                  @endphp
                  <tbody>
                      @foreach ($data as $detail)
                      
                      @php
                          $count = $count+1;
                      @endphp
                      <!--<i class='expandable-table-caret fas fa-caret-right fa-fw'></i>-->
                      <tr>
                         
                        <td> {{$count}}</td>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->email}}</td>
                        <td>{{$detail->phone}}</td>
                        <td><a href="{{route('single-order', $detail->id)}}" class="btn btn-info">View detail</a></td>
                          
                      </tr>
                       
                          
                      @endforeach
                   
                  </tbody>
                </table>
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form  method="post" action="{{route('trash')}}">
                        @csrf
                      <div class="modal-header">
                        <h4 class="modal-title">Trash</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        Do you want to move this product to trash..
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