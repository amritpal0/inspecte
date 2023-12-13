@extends('admin.layouts.master')



@section('content')



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Order Detail</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Order Detail</li>

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

            <!-- Main content -->

            <div class="invoice p-3 mb-3">

              <!-- title row -->

              <div class="row mb-3">

                <div class="col-12">

                  <h4>

                    <i class="fas fa-globe"></i> Juneja Iron Steels

                     @php

                     $yrdata= strtotime($data->created_at);

                        $date = date('F d, Y', $yrdata);

                        @endphp

                    <small class="float-right">Date: {{$date}}</small>

                  </h4>

                </div>

                <!-- /.col -->

              </div>

              <!-- info row -->

              <div class="row">
                <div class="col-md-12">
                  <p class="mb-0"> <strong>Order ID:</strong>  #{{$data->orderId}} &nbsp;&nbsp;&nbsp; <strong> Date:</strong> {{$date}}</p>
                </div>
              </div><hr>

              <div class="row invoice-info">

                <div class="col-sm-4 invoice-col">

                   <strong>Billing Address</strong><hr>

                  <address>

                   {{$data->name}}<br>

                    {{$data->address}}<br>

                    {{$data->city}}, {{$data->state}} - {{$data->pincode}}<br>

                    {{$data->country}}<br>

                    Phone: {{$data->phone}}<br>

                    Email: {{$data->email}}

                  </address>

                </div>

                <!-- /.col -->

                <div class="col-sm-4 invoice-col">

                    <strong> Shipping Address</strong><hr>

                 

                  @if($data->shipping)

                  <address>

                    {{$data->shipping->name}}<br>

                    {{$data->shipping->address}}<br>

                    {{$data->shipping->city}}, {{$data->shipping->state}} - {{$data->shipping->pincode}}<br>

                    {{$data->shipping->country}}<br>

                    Phone: {{$data->shipping->phone}}<br>

                    Email: {{$data->shipping->email}}

                  </address>

                  @else

                  <address>NA</address>

                  @endif

                </div>

              </div>

              <!-- /.row -->



              <!-- Table row -->

              <div class="row">

                <div class="col-12 table-responsive">

                  <table class="table table-hovered">

                    <thead>

                    <tr>

                      <th>Product</th>

                      <th>Size</th>
                      
                      <th>Price</th>

                      <th>Qty.</th>

                      <th>Total</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($data->item as $p)

                    <tr>

                      <td>{{$p->product}} ({{$p->size}} Ft.)</td>

                      <td>{{$p->attr}}</td>
                      
                       <td>Rs. {{$p->price}}</td>

                      <td>{{$p->qty}}</td>

                      <td>Rs. {{$p->qty * $p->price}}</td>

                    </tr>
                    
                    @endforeach
                    
                    <tr>

                      <td colspan="4"> <strong>Grand Total</strong></td>
                      <td> <strong>Rs. {{$data->total}}</strong> </td>

                    </tr>

                    </tbody>

                  </table>

                </div>

                <!-- /.col -->

              </div>

              <!-- /.row -->



              <!-- this row will not appear when printing -->

              <div class="row no-print">

                <div class="col-12">

                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit

                    Payment

                  </button>

                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">

                    <i class="fas fa-download"></i> Generate PDF

                  </button>

                </div>

              </div>

            </div>

            <!-- /.invoice -->

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </section>

</div>



@endsection



@push('custom-script')

<script>

 window.addEventListener("load", window.print());

</script>

@endpush