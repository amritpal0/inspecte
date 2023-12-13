@extends('front.layouts.master')

@section('content')

@include('front.layouts.breadcrumb')


<!-- product_section - start
			================================================== -->
<section class="product_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="carparts_filetr_bar clearfix">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 col-md-6">
                    <p class="result_text mb-0">Showing 1 to 10 of 243 products</p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <form action="#">
                        <div class="option_select d-flex align-items-center mb-0">
                            <span class="option_title text-uppercase">Sort by:</span>
                            <select>
                                <option data-display="Select Your Option">Nothing</option>
                                <option value="1" selected> Popularity</option>
                                <option value="2">Another option</option>
                                <option value="3" disabled>A disabled option</option>
                                <option value="4">Potato</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach($category->productDetail as $p)
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="sports_product_item">
                        <div class="item_image" data-bg-color="#f5f5f5">
                            <a href="{{route('single_product', ['category' => $category->slug, 'product' => $p->slug])}}">

                                <img src="{{asset('uploads/products/'.$p->image)}}" alt="image_not_found">
                            </a>
                            <ul class="product_action_btns ul_li_center clearfix">
                                <li><a href="#!"><i class="fal fa-search"></i></a></li>
                                <li><a href="#!"><i class="fas fa-shopping-cart"></i></a></li>
                            </ul>
                            <ul class="product_label ul_li text-uppercase clearfix">
                                <li class="bg_sports_red">50% Off</li>
                                <li class="bg_sports_red">Sale</li>
                            </ul>
                        </div>
                        <div class="item_content text-uppercase text-white">
                            <h3 class="item_title bg_black text-white mb-0">
                                <a class="text-white" href="{{route('single_product', ['category' => $category->slug, 'product' => $p->slug])}}">
                                {{$p->product}}
                                </a>
                            </h3>
                            <span class="item_price bg_sports_red"><strong>Rs. {{$p->attr[0]->price}}</strong></span>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- product_section - end
			================================================== -->


<!-- newsletter area - start
			================================================== -->
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-lg-8">
            <div class="sports_newsletter d-flex align-items-center"
                data-background="assets/images/backgrounds/bg_33.jpg">
                <div class="content_wrap text-center text-white">
                    <span class="sub_title text-uppercase" data-text-color="#ff3f3f">Join Our</span>
                    <h2 class="title_text text-uppercase text-white mb_15">Newsletters Now!</h2>
                    <p class="mb_30">
                        Hugo & Marie is an independent artist management firm and Creative agency based in New York
                        City. Founded in 2008
                    </p>
                    <form action="#!">
                        <div class="form_item mb-0">
                            <input type="email" name="email" placeholder="Enter email">
                            <button type="submit" class="submit_btn bg_sports_red text-uppercase">SUBCRIBE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="sports_feature_video" data-background="assets/images/backgrounds/bg_34.jpg">
                <a class="play_btn_1" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><span><i
                            class="fas fa-play"></i></span></a>
            </div>
        </div>
    </div>
</div>
<!-- newsletter area - end
			================================================== -->


<!-- brand_section - start
			================================================== -->
<div class="brand_section sec_ptb_100 clearfix">
    <div class="container-fluid prl_100">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_31.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_32.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_33.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_34.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_35.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_36.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_32.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_34.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_31.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_36.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_35.png" alt="image_not_found">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 col-6">
                        <a class="brand_item" href="#!">
                            <img src="assets/images/brands/img_33.png" alt="image_not_found">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand_section - end
			================================================== -->


@endsection