<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-sixteen.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="{{route('home')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{route('products')}}">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
              </li>
              <li class="nav-item active" >
                <a class="nav-link" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i> Cart </a>
              </li>
              {{-- <li class="nav-item">
                @if (Route::has('login'))
                <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
                @endif
              </li> --}}
              <li class="nav-item">
                @if(Auth::check())
                @if (Auth::user()->usertype == '0')
                 
                          <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>                     
                 
                @else
               <a href="{{ route('login') }}" class="nav-link">Log in</a>
               <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
              @endif
              @else
               <a href="{{ route('login') }}" class="nav-link">Log in</a>
               <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>                 
           @endif
            
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12 ">
        <div class="card m-4" >
          <div class="card-header">
            <h3 class="card-title">Cart</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
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
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              </thead>
              @php
                $count = 0;  
              @endphp
              @isset($items)
              
              @foreach ($items as $data)
              @php
                  $count = $count+1;
              @endphp 
              <tbody>  
                <tr>            
                <td>{{$count}}</td>
                <td>{{$data->product}}</td>
                <td>{{$data->data->description}}</td>
                <td><i class="fas fa-rupee-sign"></i> {{$data->price}}</td>   
                <td>{{$data->qty}}</td>
                <td><img src="{{asset('admin/product')}}/{{$data->data->image}}" alt="" class="img-fluid" width="100px" height="100px"></td>
                <td><a href="{{url('/cart_delete')}}/{{$data->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>                        
              </tr>
              </tbody>
              @endforeach
              @endisset
            </table>
            {{-- <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form  method="post" action="{{url('/trash')}}">
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
            </div> --}}
          </div>
          <!-- /.card-body -->
          <div class="card-footer ">
            <form action="{{route('applycoupon')}}" method="post" class="coupon form-inline">
              @csrf
              <input type="text" class="form-control " name="coupon" placeholder="Apply coupon..">
              <input type="submit" class="btn btn-primary ml-3" value="Apply">
            </form>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Shiping Detail</h3>
        </div>
        <div class="card-body">
          <form action="{{route('placeorder')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" placeholder="Enter your name..">
              <span class="text-danger">
                @error('name')
                {{$message}}                          
                @enderror
              </span>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email..">
              <span class="text-danger">
                @error('email')
                {{$message}}                          
                @enderror
              </span>
            </div>
            <div class="form-group">
              <label for="phone">Mobile Number:</label>
              <input type="text" class="form-control" name="phone" placeholder="Enter your mobile number..">
              <span class="text-danger">
                @error('phone')
                {{$message}}                          
                @enderror
              </span>
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address" placeholder="Enter your address..">
              <span class="text-danger">
                @error('address')
                {{$message}}                          
                @enderror
              </span>
            </div>
            <div class="form-group">
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city" placeholder="Enter your city..">
              <span class="text-danger">
                @error('city')
                {{$message}}                          
                @enderror
              </span>
            </div>
            <div class="form-group">
              <label for="code">Pincode:</label>
              <input type="text" class="form-control" name="pincode" placeholder="Enter your pincode..">
              <span class="text-danger">
                @error('pincode')
                {{$message}}                          
                @enderror
              </span>
            </div>
          
        </div>
    </div>
    </div>
  </div>
   {{-- row --}}  
   <div class="row">
    <div class="col-md-12 m-4 ">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Item</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @isset($items)
            <tr>
            
              @foreach ($items as $item)
                  <tr>
                    <td>{{$item->product}} X {{$item->qty}}</td>
                    <td><i class="fas fa-rupee-sign"></i> {{$item->total}}</td>
                  </tr>
              @endforeach
                  <tr>
                    <th>Cart Subtotal</th>
                    <th><i class="fas fa-rupee-sign"></i> {{$total}}</th>
                  </tr>
                  <tr>
                    <td>Shipping</td>
                    <td>free Shipping</td>
                  </tr>
                  @if (session()->has('dd'))
                  <tr>
                    <th>Coupon Discount</th>
                    <th><i class="fas fa-rupee-sign"></i> {{session('dd')}}</th>
                  </tr>
                  <tr>
                    <th>Order Total</th>
                    <th><i class="fas fa-rupee-sign"></i> {{$total - session('dd')}}</th>
                  </tr>
                  @else
                  <tr>
                    <th>Order Total</th>
                    <th><i class="fas fa-rupee-sign"></i> {{$total}}</th>
                  </tr>
                  @endif
            </tr>
             
                  
            @endisset
          </tbody>
        </table>
      </div>
      <ul class="list-group-horizontal">
        <input type="radio" value="online" name="payment" class="input-radio" id="payment_method_paypal">
        <label for="payment_method_paypal">PayPal <img class="img-sm" alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png">
        </label>
        <input type="radio" value="cod" name="payment"  class="input-radio" id="payment_method_paypal">
        <label for="payment_method_paypal">Cash on Delivary <i class="far fa-money-bill-alt"></i></label><br>
        <span class="text-danger">
          @error('payment')
          {{$message}}                          
          @enderror
        </span>
      </ul>
      <input type="hidden" class="form-control " name="cid" value="{{(session('cid'))? session('cid'): '' }}" placeholder="Apply coupon..">
      <input type="submit" class="btn btn-primary m-2" value="Place Order">
    </form>
    </div>
   </div>
</div>
     

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
          
          - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


  <!-- Additional Scripts -->
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script src="{{asset('assets/js/owl.js')}}"></script>
  <script src="{{asset('assets/js/slick.js')}}"></script>
  <script src="{{asset('assets/js/isotope.js')}}"></script>
  <script src="{{asset('assets/js/accordions.js')}}"></script>


  <script language = "text/Javascript"> 
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
    if(! cleared[t.id]){                      // function makes it static and global
        cleared[t.id] = 1;  // you could use true and false, but that's more typing
        t.value='';         // with more chance of typos
        t.style.color='#fff';
        }
    }
  </script>


</body>

</html>
