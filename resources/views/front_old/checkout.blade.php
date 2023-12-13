@extends('front.layouts.master')

@section('content')

@include('front.layouts.breadcrumb')

<!-- checkout_section - start
			================================================== -->
<section class="checkout_section sec_ptb_140 clearfix">
    <div class="container">

        <ul class="checkout_step ul_li clearfix">
            <li class="activated"><a href="{{route('cart')}}"><span>01.</span> Shopping Cart</a></li>
            <li class="active"><a href="#"><span>02.</span> Checkout</a></li>
            <li><a href="#"><span>03.</span> Order Completed</a></li>
        </ul>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="form_title mb_30">Login or Register</h3>
                <div class="checkout_collapse_content">
                    <div class="wrap_heade">
                        <div class="card-body border-0">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form_item">
                                            <input type="email" class="otp_email" name="email"
                                                placeholder="Enter your email..">
                                            <span class="otp_msg"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 otp_div" style="display:none;">
                                        <div class="form_item">
                                            <input type="text" name="password" class="otp" placeholder="Enter otp">
                                        </div>
                                    </div>
                                </div>
                                <div class="login_button">
                                    <button type="button" class="custom_btn send_otp bg_default_red">Send Otp</button>
                                    <button type="button" style="display:none;"
                                        class="custom_btn verify_otp bg_default_red">Verify Otp</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="billing_form mb_50">
            <h3 class="form_title mb_30">Billing details</h3>
            <form action="#">
                <div class="form_wrap">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form_item">
                                <span class="input_title">First Name<sup>*</sup></span>
                                <input type="text" name="firstname">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form_item">
                                <span class="input_title">Last Name<sup>*</sup></span>
                                <input type="text" name="lastname">
                            </div>
                        </div>
                    </div>

                    <div class="form_item">
                        <span class="input_title">Company Name<sup>*</sup></span>
                        <input type="text" name="company">
                    </div>

                    <div class="option_select">
                        <span class="input_title">Country<sup>*</sup></span>
                        <select name="country">
                            <option value="USA" selected>United States</option>
                            <option value="USA">United States</option>
                            <option value="USA">United States</option>
                            <option value="USA">United States</option>
                        </select>
                    </div>

                    <div class="form_item">
                        <span class="input_title">Address<sup>*</sup></span>
                        <input type="text" name="address" placeholder="House number and street name">
                    </div>

                    <div class="form_item">
                        <span class="input_title">Town/City<sup>*</sup></span>
                        <input type="text" name="city">
                    </div>

                    <div class="form_item">
                        <span class="input_title">County<sup>*</sup></span>
                        <input type="text" name="county">
                    </div>

                    <div class="form_item">
                        <span class="input_title">Postcode / Zip<sup>*</sup></span>
                        <input type="text" name="postcode">
                    </div>

                    <div class="form_item">
                        <span class="input_title">Phone<sup>*</sup></span>
                        <input type="tel" name="phone">
                    </div>

                    <div class="form_item">
                        <span class="input_title">Email Address<sup>*</sup></span>
                        <input type="email" name="email">
                    </div>

                    <div class="checkbox_item">
                        <label for="account_create_checkbox"><input id="account_create_checkbox" type="checkbox"> Create
                            an account?</label>
                    </div>

                    <hr>

                    <div class="checkbox_item mb_30">
                        <label for="ship_address_checkbox"><input id="ship_address_checkbox" type="checkbox"> Ship to a
                            different address?</label>
                    </div>

                    <div class="form_item mb-0">
                        <span class="input_title">Order notes<sup>*</sup></span>
                        <textarea name="note"
                            placeholder="Note about your order, eg. special notes fordelivery."></textarea>
                    </div>

                </div>
            </form>
        </div>

        <div class="billing_form">
            <h3 class="form_title mb_30">Your order</h3>
            <form action="#">
                <div class="form_wrap">

                    <div class="checkout_table">
                        <table class="table text-center mb_50">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Attribute</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($data as $c)
                                <tr>
                                    <td>
                                        <div class="cart_product">
                                            <div class="item_image">
                                                <img src="{{asset('uploads/products/'.$c->product_detail->image)}}"
                                                    alt="image_not_found">
                                            </div>
                                            <div class="item_content">
                                                <h4 class="item_title">{{$c->product_detail->product}}</h4>
                                                <span class="item_type">{{$c->product_detail->category->name}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="price_text">Size: {{$c->attr->size}}<br>
                                            Color: {{$c->attr->pcolor->color}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="price_text">Rs. {{$c->price}} x{{$c->qty}}</span>
                                    </td>
                                    <td><span class="total_price">Rs. {{$c->total}}</span></td>
                                    @php $total += $c->total; @endphp
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="billing_payment_mathod">
                        <ul class="ul_li_block clearfix">
                            <li>
                                <div class="checkbox_item mb_15 pl-0">
                                    <label for="bank_transfer_checkbox"><input id="bank_transfer_checkbox"
                                            type="checkbox" checked> Direct Bank Transfer</label>
                                </div>
                                <p class="mb-0">
                                    Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order will not be shipped until the funds have cleared in
                                    our account.
                                </p>
                            </li>

                            <li>
                                <div class="checkbox_item mb-0 pl-0">
                                    <label for="check_payments"><input id="check_payments" type="checkbox">Check
                                        Payments</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox_item mb-0 pl-0">
                                    <label for="cash_delivery"><input id="cash_delivery" type="checkbox"> Cash On
                                        Delivery</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox_item mb-0 pl-0">
                                    <label for="paypal_checkbox"><input id="paypal_checkbox" type="checkbox"> Paypal <a
                                            href="#!"><img class="paypal_image"
                                                src="assets/images/payment_methods_03.png"
                                                alt="image_not_found"></a></label>
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class="custom_btn bg_default_red">PLACE ORDER</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</section>
<!-- checkout_section - end
			================================================== -->


@endsection


@push('custom-scripts')
<script>
$('.send_otp').on('click', function() {
    var email = $('.otp_email').val();
    var checkout = 1;
    if (!email) {
        createToast('fa-times-circle', 'Please fill the email', 'error');
    } else {

        $.ajax({
            type: "POST",
            url: "{{route('send_otp')}}",
            data: {
                email: email,
                checkout: checkout
            },
            success: function(response) {
                if (response.success == true) {
                    createToast('fa-badge-check', response.msg, 'success');
                    $('.send_otp').hide();
                    $('.verify_otp').show();
                    $('.otp_div').show();
                    $('.otp_email').attr('disabled');
                    $('.otp_msg').text(response.msg);
                } else {
                    createToast('fa-times-circle', response.msg, 'error');
                }
            },
            error: function(response) {
                createToast('fa-times-circle', 'Someting went wrong.', 'error');
            }
        })
    }
})
</script>
@endpush