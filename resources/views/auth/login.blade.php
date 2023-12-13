<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Admin</title>



    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet"

        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{asset('backend1/fontawesome-free/css/all.min.css')}}">

    <!-- Theme style -->

    <link rel="stylesheet" href="{{asset('backend1/css/adminlte.min.css')}}">

</head>



<body class="hold-transition login-page">



    <div class="login-box">

        <div class="login-logo">

            <a href="#"><b>Admin</b></a>

        </div>

        <!-- /.login-logo -->

        <div class="card">

            <div class="card-body login-card-body">

                <p class="login-box-msg pb-1">Sign in</p>

                 <p class="text-danger mb-2 text-center font-weight-bold" id="login-msg1"></p>

                 <p class="text-danger mb-2 text-center font-weight-bold" id="login-msg"></p>



                <form action="{{route('login')}}" method="post" id="loginForm">

                    @csrf

                    <div class="input-group mb-3">

                        <input type="email" class="form-control email1" placeholder="Email" name="email1">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-envelope"></span>

                            </div>

                        </div>

                        @error('email')

                        <span class="invalid-feedback" role="alert">

                            <strong>{{ $message }}</strong>

                        </span>

                        @enderror

                    </div>

                    <div class="input-group mb-3">

                        <input type="password" class="form-control password1" placeholder="Password" name="password1">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                        @error('password')

                        <span class="invalid-feedback" role="alert">

                            <strong>{{ $message }}</strong>

                        </span>

                        @enderror

                    </div>

                    <div class="col-4 float-right">

                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>

                    </div>

                </form>

            </div>

            <!-- /.login-card-body -->

        </div>

    </div>



    <!-- jQuery -->

    <script src="{{asset('backend1/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap 4 -->

    <script src="{{asset('backend1/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- AdminLTE App -->

    <script src="{{asset('backend1/js/adminlte.min.js')}}"></script>

    <script>

    $.ajaxSetup({



    headers: {



        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



    }



});

        var loginForm = $("#loginForm");



    loginForm.submit(function(e) {



        e.preventDefault();



        var email1 = $('.email1').val();



        var password1 = $('.password1').val();



        console.log('ethe');



        $('#login-msg').empty();



        $('#login-msg1').empty();



        $('#phoneError').empty();



        $('#passwordError').empty();







        $.ajax({



            url: "{{route('login')}}",



            type: 'POST',



            data: {



                      email1:email1,



                      password1:password1,



                    },



            success: function(data) {



                console.log(data.success);



                if(data.success == true){



                     window.location = "{{route('admin')}}";



                }



                if(data.success == false){



                    console.log('ethe');



                    $('#login-msg').text(data.msg);



                }



                



            },



            error: function(response) {



                console.log(response.responseJSON.errors);



                // $('#nameError').remove();



                // $('#emailError').remove();



                // $('#phoneError').remove();



                // $('#passwordError').remove();



                



                $('#login-msg').text(response.responseJSON.errors.name);



                $('#login-msg1').text(response.responseJSON.errors.email1);



                $('#phoneError').text(response.responseJSON.errors.phone);



                $('#login-msg').text(response.responseJSON.errors.password1);



            }



        });



    });

    </script>

</body>



</html>