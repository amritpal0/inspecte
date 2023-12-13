@extends('admin.layouts.master')



@section('content')



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Dashboard</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Dashboard</li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="row">

          <div class="col-lg-4 col-6">

            <!-- small box -->

            <div class="small-box bg-info">

              <div class="inner">

                <h3>{{$totalproduct}}</h3>

                <p>Total Products</p>

              </div>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-4 col-6">

            <!-- small box -->

            <div class="small-box bg-success">

              <div class="inner">

                <h3>{{$totalorder}}</h3>



                <p>Total Orders</p>

              </div>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-4 col-6">

            <!-- small box -->

            <div class="small-box bg-warning">

              <div class="inner">

                <h3>{{$orderitem}}</h3>



                <p>Total Order Items</p>

              </div>             

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-4 col-6">

            <!-- small box -->

            <div class="small-box bg-danger">

              <div class="inner">

                <h3>{{$users}}</h3>



                <p>User Registered</p>

              </div>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-4 col-6">

            <!-- small box -->

            <div class="small-box bg-info">

              <div class="inner">

                <h3>{{$reading}}</h3>



                <p>Total Reading Orders</p>

              </div>

            </div>

          </div>

        </div>

        <!-- /.row -->

        <!-- Main row -->

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

</div>

  <!-- /.content-wrapper -->



@endsection

