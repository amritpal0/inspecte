<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">



  <title>Pro Inspected</title>



  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="{{asset('/admin/css/all.min.css')}}">

  <!-- DataTables -->

  <link rel="stylesheet" href="{{asset('/admin/css/dataTables.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('/admin/css/responsive.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('/admin/css/buttons.bootstrap4.min.css')}}">

  <!-- Theme style -->

  <link href="//cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet"/>

    <link href="//cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/basic.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.css">

  <link rel="stylesheet" href="{{asset('/admin/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{asset('/admin/css/style.css')}}">

  <style>

    

  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<!-- Site wrapper -->

<div class="wrapper">

  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

      </li>

      <li class="nav-item d-none d-sm-inline-block">

        <a href="#" class="nav-link">Home</a>

      </li>

    </ul>



  </nav>

  <!-- /.navbar -->



  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="#" class="brand-link text-center">

      <!-- <img src="{{asset('/admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->

      <span class="brand-text font-weight-light">Admin Panel</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">

          <img src="{{asset('/admin/img/user-icon.svg')}}" class="img-circle elevation-2" alt="User Image">

        </div>

        <div class="info">

          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>

        </div>

      </div>



      <!-- SidebarSearch Form -->

      <!-- <div class="form-inline">

        <div class="input-group" data-widget="sidebar-search">

          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">

          <div class="input-group-append">

            <button class="btn btn-sidebar">

              <i class="fas fa-search fa-fw"></i>

            </button>

          </div>

        </div>

      </div> -->



      <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

          <li class="nav-item">

            <a href="{{route('admin')}}" class="nav-link {{(request()->routeIs('admin'))? 'active': ''}}">

              <i class="nav-icon fas fa-tachometer-alt"></i>

              <p>

                Dashboard

              </p>

            </a>

          </li>

          {{--<li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-folder-plus"></i>

              <p>

               Services

                <i class="right fas fa-angle-right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ route('post_category') }}" class="nav-link">

                  <i class="nav-icon far fa-circle nav-icon"></i>

                  <p>Category</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{route('post.create')}}" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add Service</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{route('post.index')}}" class="nav-link">

                  <i class="nav-icon far fa-circle nav-icon"></i>

                  <p>All Services</p>

                </a>

              </li>

            </ul>

          </li>--}}

          <li class="nav-item {{(request()->routeIs('add_form') || request()->routeIs('color.*') || request()->routeIs('product-category.*') || request()->routeIs('detail') || request()->routeIs('size') || request()->routeIs('edit') || request()->routeIs('edit_size'))? 'menu-open': ''}}">

            <a href="#" class="nav-link">

            <i class="nav-icon fas fa-archive"></i>

              <p>

               Packages

                <i class="right fas fa-angle-right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">
                
                {{--<li class="nav-item">

                <a href="{{ route('size') }}" class="nav-link {{(request()->routeIs('size') || request()->routeIs('edit_size'))? 'active': ''}}">

                  <i class="nav-icon far fa-circle nav-icon"></i>

                  <p>Manage Size</p>

                </a>

              </li>--}}

              {{--<li class="nav-item">

                <a href="{{ route('color.index') }}" class="nav-link {{(request()->routeIs('color.*'))? 'active': ''}}">

                  <i class="nav-icon far fa-circle nav-icon"></i>

                  <p>Colors</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{ route('product-category.index') }}" class="nav-link {{(request()->routeIs('product-category.index') || request()->routeIs('product-category.edit'))? 'active': ''}}">

                  <i class="nav-icon far fa-circle nav-icon"></i>

                  <p>Category</p>

                </a>

              </li>--}}

              {{--<li class="nav-item">

                <a href="{{route('add_form')}} " class="nav-link {{(request()->routeIs('add_form') || request()->routeIs('edit'))? 'active': ''}}">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add Package</p>

                </a>

              </li>--}}

              <li class="nav-item">

                <a href="{{route('detail')}}" class="nav-link {{(request()->routeIs('detail'))? 'active': ''}}">

                  <i class="nav-icon far fa-circle nav-icon"></i>

                  <p>All Packages</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item">

            <a href="#" class="nav-link">

             <i class="fas fa-sticky-note nav-icon"></i>

              <p>

               Blogs

                <i class="right fas fa-angle-right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{route('adminblogs.create')}}" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add Blog</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{route('adminblogs.index')}}" class="nav-link">

                  <i class="nav-icon far fa-circle nav-icon"></i>

                  <p>All Blogs</p>

                </a>

              </li>

            </ul>

          </li>
          
          <li class="nav-item">

            <a href="#" class="nav-link">

             <i class="fas fa-sticky-note nav-icon"></i>

              <p>

               Banners

                <i class="right fas fa-angle-right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{route('banners.create')}}" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add Banner</p>

                </a>

              </li>

              <li class="nav-item">

                <a href="{{route('banners.index')}}" class="nav-link">

                  <i class="nav-icon far fa-circle nav-icon"></i>

                  <p>All Banners</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item">

            <a href="{{route('testimonial.create')}}" class="nav-link">

              <i class="fas fa-comment-dots nav-icon"></i>

              <p>

               Brands

              </p>

            </a>

          </li>
          

          {{--<li class="nav-item">

            <a href="{{route('gallery')}}" class="nav-link">

              <i class="fas fa-images nav-icon"></i>

              <p>

                Gallery

              </p>

            </a>

          </li>

           <li class="nav-item">

            <a href="{{route('topbar')}}" class="nav-link">

              <i class="fas fa-pen-square nav-icon"></i>

              <p>

                Top Bar

              </p>

            </a>

          </li>--}}
          
          <li class="nav-item">

            <a href="{{route('orderdetail')}}" class="nav-link">

              <i class="fas fa-comment-dots nav-icon"></i>

              <p>

               Orders

              </p>

            </a>

          </li>

          <!--<li class="nav-item">-->

          <!--  <a href="#" class="nav-link">-->

          <!--   <i class="nav-icon fas fa-tags"></i>-->

          <!--    <p>-->

          <!--     Coupons-->

          <!--      <i class="right fas fa-angle-left"></i>-->

          <!--    </p>-->

          <!--  </a>-->

          <!--  <ul class="nav nav-treeview">-->

          <!--    <li class="nav-item">-->

          <!--      <a href="{{route('coupon')}}" class="nav-link">-->

          <!--        <i class="far fa-circle nav-icon"></i>-->

          <!--        <p>Add Coupons</p>-->

          <!--      </a>-->

          <!--    </li>-->

          <!--    <li class="nav-item">-->

          <!--      <a href="#" class="nav-link">-->

          <!--        <i class="nav-icon far fa-circle nav-icon"></i>-->

          <!--        <p>All Coupons</p>-->

          <!--      </a>-->

          <!--    </li>-->

          <!--  </ul>-->

          <!--</li>-->
          <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"

            onclick="event.preventDefault();

                          document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt nav-icon"></i>

             {{ __('Logout') }}

         </a>



         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

             @csrf

         </form>

        </li>

        </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>



  @yield('content')





  <footer class="main-footer">

    <div class="float-right d-none d-sm-block">

      <b>Version</b> 3.1.0

    </div>

    <strong>Copyright &copy; <?php echo date('Y'); ?> Juneja Iron Store</strong> All rights reserved.

  </footer>



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->

<!-- jQuery -->





<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script src="{{asset('/admin/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->

<script src="{{asset('/admin/js/bootstrap.bundle.min.js')}}"></script>

<script>

  $.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

</script>

<!-- AdminLTE App -->

<script src="{{asset('/admin/js/adminlte.min.js')}}"></script>



<!-- AdminLTE for demo purposes -->

<script src="{{asset('/admin/js/demo.js')}}"></script>

<!-- bs-custom-file-input -->   

<script src="{{asset('/admin/js/bs-custom-file-input.min.js')}}"></script>

<!-- DataTables  & Plugins -->

<script src="{{asset('/admin/jquery/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('/admin/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('/admin/js/dataTables.responsive.min.js')}}"></script>

<script src="{{asset('/admin/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('/admin/js/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('/admin/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{asset('/admin/js/jszip.min.js')}}"></script>

<script src="{{asset('/admin/js/pdfmake.min.js')}}"></script>

<script src="{{asset('/admin/js/vfs_fonts.js')}}"></script>

<script src="{{asset('/admin/js/buttons.html5.min.js')}}"></script>

<script src="{{asset('/admin/js/buttons.print.min.js')}}"></script>

<script src="{{asset('/admin/js/buttons.colVis.min.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script src="{{asset('/admin/js/initializedropzon.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.js"></script>

<script>

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

</script>



@stack('custom-script')



<script>

   $(document).ready(function() {

             $("#show_data").click(function(){

                 $("#detail").toggle();

             })

        });





  $("#example1").DataTable({

      "responsive": true, "lengthChange": false, "autoWidth": false,

      "buttons": ["excel", "pdf", "print", "colvis"]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

$(function () {

  bsCustomFileInput.init();

});



$(document).ready(function(){

    $('#remove_modal').on('show.bs.modal', function(event){

      var button = $(event.relatedTarget);

      var id = button.data('id');

      var modal = $(this)

      modal.find('#remove').val(id);

    })

  });



$(document).ready(function(){

      $('#myModal').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget) // Button triggered the modal

  var id = button.data('id');

  //alert(id);

  var modal = $(this)

  modal.find('#delete').val(id);

});

    });



$(document).ready(function(){

      $('#restore').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget) // Button triggered the modal

  var id = button.data('id');

  //alert(id);

  var modal = $(this)

  modal.find('#re_id').val(id);

})

    })

    

  $(document).ready(function(){

    var quantity=0;

     $(".btn-right").click(function(e){

       e.preventDefault();

       var quantity = parseInt($(this).closest('.d1').find('.qty').val());

      $(this).closest('.d1').find('.qty').val(quantity + 1);

      // $(".a1").val(quantity + 1);



    });

  });



  $(document).ready(function(){

    $(".btn-left").click(function(e){

      e.preventDefault();

      var quantity = parseInt($(this).closest('.d1').find('.qty').val());

      if (quantity > 0){

        $(this).closest('.d1').find('.qty').val(quantity - 1);

      }

        

                    



    });

  });



  $(function () {

    $('#myModal').on('show.bs.modal',function (e) {

      console.log("ethe");

        $('#myModal').focus();

        $('.modal-backdrop').remove();

    })

});

</script>

<script>

  

</script>

</body>

</html>

