@extends('front.layouts.master')

@section('content')

@include('front.layouts.breadcrumb')


<!-- cart_section - start
    ================================================== -->
<section class="cart_section sec_ptb_140 clearfix">
    <div class="container">

        <ul class="checkout_step ul_li clearfix">
            <li class="active"><a href="#"><span>01.</span> Shopping Cart</a></li>
            <li><a href="{{route('checkout')}}"><span>02.</span> Checkout</a></li>
            <li><a href="#"><span>03.</span> Order Completed</a></li>
        </ul>

        <div class="cart_table mb_50">
            <table class="table">
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
                    @foreach($cart as $c)
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
                                <button type="button" class="remove_btn">
                                    <i class="fal fa-times"></i>
                                </button>
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

        <div class="coupon_wrap mb_50">
            <div class="row justify-content-lg-between">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <div class="coupon_form">
                        <div class="form_item mb-0">
                            <input type="text" class="coupon" placeholder="Coupon Code">
                        </div>
                        <button type="submit" class="custom_btn bg_danger text-uppercase">Apply Coupon</button>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="cart_pricing_table pt-0 text-uppercase" data-bg-color="#f2f3f5">
                        <h3 class="table_title text-center" data-bg-color="#ededed">Cart Total</h3>
                        <ul class="ul_li_block clearfix">
                            <li><span>Subtotal</span> <span>Rs. {{$total}}</span></li>
                            <li><span>Total</span> <span>Rs. {{$total}}</span></li>
                        </ul>
                        <a href="{{route('checkout')}}" class="custom_btn bg_success">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cart_section - end
    ================================================== -->


@endsection