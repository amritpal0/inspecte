@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Colors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Colors</li>
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
                            @if(isset($color))
                                @method('put')
                            @endif    
                            <div class="card-body">
                                <!-- Tabs content -->
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="general">
                                        <div class="form-group">
                                            <label>Color</label>
                                            <input type="text" class="form-control"
                                                value="{{isset($color->color)? $color->color: old('color') }}"
                                                placeholder="Enter color" name="color">
                                            <span class="text-danger">
                                                @error('color')
                                                {{$message}}
                                                @enderror
                                            </span>
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
                        <h3 class="card-title">Colors</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example12" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($colors as $cat)
                            <tbody>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$cat->color}}</td>
                                <td><a href="{{route('color.edit', $cat->id)}}" class="btn btn-primary">Edit</a>
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
                                    <form method="post" action="{{route('color_delete')}}">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete</h4>
                                            <button class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete this color.
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