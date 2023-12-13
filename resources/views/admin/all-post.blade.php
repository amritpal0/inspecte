@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
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
                <h3 class="card-title">All Post</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (session()->has('msg'))
                    <div class="alert alert-info">
                      {{session()->get('msg')}}
                      <button class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Post Category</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                   <tbody>
                  @foreach ($data as $post)
                 <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{ Str::limit($post->short_description, 30, $end='.......') }}</td>
                    <td><img src="{{asset('admin/post')}}/{{$post->featured_image}}" alt="" class="img-fluid" width="100px" height="100px"></td>
                    <td><a href="{{route('post.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                        <a href="#myModal" class="btn btn-danger" data-toggle="modal" data-id="{{$post->id}}">Delete</a></td>                        
                     </tr> 
                  
                  @endforeach
                  </tbody>
                </table>
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form  method="post" action="{{route('post.delete')}}">
                        @csrf
                      <div class="modal-header">
                        <h4 class="modal-title">Delete</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        Do you want to delete this post.
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