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
            <div class="checkout_wrapper_box">
				    <h3> Reset Password</h3>
				    @if($errors->any())
                                    {!! implode('', $errors->all('<div class="text-danger mt-3 mb-2">:message</div>')) !!}
                                @endif
					<form class="as_appointment_form" action="{{ route('password.update') }}" method="post">
					    @csrf
					    <input type="hidden" name="token" value="{{ $token }}">
					    <div class="woocommerce_billing step">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
								</div>
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" Placeholder="Enter new password" required autocomplete="new-password">
								</div>
								
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
								 <input id="password-confirm" type="password" class="form-control" placeholder="Re-enter your new password" name="password_confirmation" required autocomplete="new-password">
								</div>
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="col-md-12 ">
						    <button class="as_btn  float-end mb-4 next-btn1" type="submit" >Submit</button>
						</div>
					</div>
					</form>
				</div>
        </div>
    </div>
</div>
@endsection
