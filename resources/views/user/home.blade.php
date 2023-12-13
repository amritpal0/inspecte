<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
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
              <li class="nav-item active">
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
              <li class="nav-item">
                <a class="nav-link" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i> Cart [{{$count}}]</a>
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
    @if (session()->has('msg'))
    <div class="alert alert-info msg m-2">
      {{session()->get('msg')}}
     
    </div>
    @endif  
  <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          @foreach ($products as $product)
          <div class="col-md-3">
            <div class="card card-ht mb-4">
              <div class="product-item">
                <a href="#"><img src="{{asset('/admin/product')}}/{{$product->image}}" alt="" style="height: 200px"></a>
                <div class="down-content">
                  <a href="#"><h4>{{$product->product}}</h4></a>
                  <h6><i class="fas fa-rupee-sign"></i> {{$product->price}}</h6>
                  <p>{{$product->description}}</p>
                  {{-- <ul class="stars">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  </ul> --}}
                  <form method="post" action="{{url('/add_to_cart')}}/{{$product->id}}">
                    @csrf
                    <div class="float-right d1">
                        <input type="button" class="minus btn btn-primary btn-sm" value="-">
                        <input type="text" size="4" name='qty' class="qty text q1 form-control"  value="1" min="1" >
                        <input type="button" class="plus btn btn-primary btn-sm" value="+">
                    </div>
                    <div> 
                      <button class="btn btn-primary btn-sm" type="submit"><i class='fas fa-cart-arrow-down'></i> cart</button>
                      {{-- <input type="submit" class="btn btn-primary btn-sm" value=> --}}
                     </div>
                  </form>  
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
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

<!-- Latest jQuery form server -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
   
     <script>
         $(document).ready(function(){
            $('.minus').click(function(e){
                e.preventDefault();
                var quantity = parseInt($(this).closest('.d1').find('.q1').val());
                if(quantity > 1 ){
                    $(this).closest('.d1').find('.q1').val(quantity - 1);
                }
            })
        })
        $(document).ready(function(){
            var quantity = 0;
            $('.plus').click(function(e){
                e.preventDefault();
                var quantity = parseInt($(this).closest('.d1').find('.q1').val());
                $(this).closest('.d1').find('.q1').val(quantity + 1);
            })
        })
        </script>



  </body>

</html>
    
   