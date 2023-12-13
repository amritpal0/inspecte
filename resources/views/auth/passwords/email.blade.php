@extends('front.layouts.app')

@section('content')

<section class="as_shop_banner d-flex">
    <!--Slider Start-->
    <div class="shop-banner mb-4">
        <div class="ast_banner_text as_shop_text">
            <div class="starfield">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="ast_waves">
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
            </div>
            <div class="ast_waves2">
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
            </div>
            <div class="ast_waves3">
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
                <div class="ast_wave"></div>
            </div>
            <div class="container">
                <div class="row as_verticle_center custom-top-banner">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="as_banner_slider">
                            <div class="as_banner_detail inner-banner-design">
                                <h1>Forgot Password</h1>
                                <img src="{{asset('assets/images/star.png')}}" class="inner-star">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Slider End-->
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-4" >

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="mt-4">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn as_btn">Reset password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
