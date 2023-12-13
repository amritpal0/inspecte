@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Readings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Readings</li>
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
                <h3 class="card-title">Reading Orders Detail</h3>
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
                    <th>Sno.</th>
                    <th>Date</th>
                    <th>Reading</th>
                    <th>User</th>
                    <th>Phone</th>
                    <th>Email</th>
                  </tr>
                  </thead>
                   <tbody>
                  @foreach ($data as $r)
                  @php 
                    $yrdata= strtotime($r->created_at);
                    $date = date('F d, Y', $yrdata);
                    @endphp
                 <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$date}}</td>
                    <td>{{$r->reading->title}}</td>
                    <td>{{$r->user->name}}</td>
                    <td>{{$r->user->phone}}</td>
                    <td>{{$r->user->email}}</td>                        
                      </tr>
                  
                  @endforeach
                  </tbody>
                </table>
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