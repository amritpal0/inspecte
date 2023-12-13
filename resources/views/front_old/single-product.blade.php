@extends('front.layouts.master')

@section('content')

@include('front.layouts.breadcrumb')


<!-- sports_details - start
================================================== -->
<section class="sports_details sec_ptb_100 pb-0 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between">

            <div class="col-lg-12">
                <div class="row mb_100 justify-content-lg-between">
                    <div class="col-lg-6 col-md-7">
                        <div class="details_image_tab">
                            <div class="tab-content mb_30">
                                @if($product->gallery->isEmpty())
                                <div id="di_tab_1" class="tab-pane active">
                                    <div class="details_image text-center">
                                        <img src="{{asset('uploads/products/'.$product->image)}}" alt="image_not_found">
                                    </div>
                                </div>
                                @else
                                    @foreach($product->gallery as $key => $g)
                                    <div id="di_tab_{{$key}}" class="tab-pane {{($key == 0)? 'active': ''}}">
                                        <div class="details_image text-center">
                                            <img src="{{asset('uploads/products/gallery/'.$g->image)}}" alt="image_not_found">
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>

                            <ul class="details_image_nav nav ul_li_center" role="tablist">
                                @if($product->gallery->isEmpty())
                                <li>
                                    <a class="active" data-toggle="tab" href="#di_tab_1">
                                        <img src="{{asset('uploads/products/'.$product->image)}}" alt="image_not_found">
                                    </a>
                                </li>
                                @else
                                    @foreach($product->gallery as $key => $g)
                                    <li>
                                        <a class="{{($key == 0)? 'active': ''}}" data-toggle="tab" href="#di_tab_{{$key}}">
                                            <img src="{{asset('uploads/products/gallery/'.$g->image)}}" alt="image_not_found">
                                        </a>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8">
                        <div class="details_content">
                            <span class="item_type">{{$product->category->name}}</span>
                            <h2 class="item_title mb_15">{{$product->product}}</h2>
                            <div class="rating_wrap d-flex align-items-center mb_15 text-uppercase">
                                <ul class="rating_star ul_li mr-2 clearfix">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <span class="review_text" data-text-color="#ff3f3f">(5.0 Rating)</span>
                            </div>
                            <div class="product-description mb_15">
                                {!! $product->description !!}
                            </div>
                            <span class="product_price mb_30"><strong class="price_span">Rs. {{$product->attr[0]->price}}</strong></span>
                            <div class="item_size d-flex align-items-center mb_30">
                                <h4 class="list_title text-uppercase mb-0 mr-3">Size:</h4>
                                <ul class="ul_li clearfix">
                                    @foreach($productAttr as $key => $a)
                                    <li><button class="{{($loop->iteration == 1)? 'active': '' }} size_btn" data-size="{{$key}}" type="button">{{$key}}</button></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="color_div">

                                <div class="item_size d-flex align-items-center mb_30">
                                    <h4 class="list_title text-uppercase mb-0 mr-3">Color:</h4>
                                    <ul class="ul_li clearfix">
                                        @foreach($productAttr->first() as $key => $a)
                                        <li><button class="{{($key == 0)? 'active': '' }} color_btn" data-color= '{{$a->color}}' type="button">{{$a->pColor->color}}</button></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <ul class="btns_group ul_li clearfix">
                                <!-- <li>
                                    <div class="quantity_input">
                                        <form action="#">
                                            <span class="input_number_decrement">–</span>
                                            <input class="input_number" type="text" value="1">
                                            <span class="input_number_increment">+</span>
                                        </form>
                                    </div>
                                </li>
                                <li> -->
                                    <a class="custom_btn add_to_cart bg_sports_red text-uppercase" href="javascript:void(0)">Add To Cart</a>
                                </li>
                            </ul>
                            <hr>
                            <div class="item_tags mb_15 d-flex align-items-center">
                                <h4 class="list_title text-uppercase mb-0 mr-3">Tags:</h4>
                                <ul class="ul_li clearfix">
                                    <li><a href="#!">T-Shirt</a></li>
                                    <li><a href="#!">Clothes</a></li>
                                    <li><a href="#!">Fashion</a></li>
                                    <li><a href="#!">Shop</a></li>
                                </ul>
                            </div>
                            <div class="share_links d-flex align-items-center">
                                <h4 class="list_title text-uppercase mb-0 mr-3">Share:</h4>
                                <ul class="primary_social_links ul_li_right clearfix">
                                    <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#!"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sports_description_tab mb_100">
                    <ul class="nav text-uppercase" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#description_tab">Description</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#information_tab">Additional Information</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#review_tab">Reviews (3)</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="description_tab" class="tab-pane active">
                            <h3 class="title_text mb_15">Description:</h3>
                            <p class="mb_15">
                                Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
                            </p>
                            <p class="mb_15">
                                Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
                            </p>
                            <p class="mb-0">
                                Eodem modo typi, qui nunc nobis videntur parum clari.
                            </p>
                            <div class="row">
                                <div class="col-lg-5">
                                    <ul class="des_info_list ul_li_block">
                                        <li><i class="fas fa-caret-right"></i>Nam liber tempor cum;</li>
                                        <li><i class="fas fa-caret-right"></i>Mirum est notare quam;</li>
                                        <li><i class="fas fa-caret-right"></i>Claritas est etiam;</li>
                                    </ul>
                                </div>

                                <div class="col-lg-5">
                                    <ul class="des_info_list ul_li_block">
                                        <li><i class="fas fa-caret-right"></i>Typi non habent claritatem;</li>
                                        <li><i class="fas fa-caret-right"></i>Eodem modo typi.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="information_tab" class="tab-pane fade">
                            
                            <div class="row mb_50">
                                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 order-last">
                                    <div class="image_wrap">
                                        <img src="assets/images/details/shop/img_07.jpg" alt="image_not_found">
                                    </div>
                                </div>
                                
                                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                    <div class="content_wrap">
                                        <h4 class="list_title">Paragraph text</h4>
                                        <p class="mb_15">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                        </p>
                                        <p class="mb_30">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                        </p>
                                        
                                        <h4 class="list_title">Pretium turpis et arcu</h4>
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <span class="aware_info_icons">
                                <img src="assets/images/icons/aware_icons.png" alt="image_not_found">
                            </span>
                            
                        </div>

                        <div id="review_tab" class="tab-pane fade">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="email" name="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form_item">
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                </div>
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Submit Review</button>
                            </form>	
                        </div>
                    </div>
                </div>

                <div class="sports_related_products">
                    <div class="sports_section_title text-uppercase">
                        <span class="sub_title mb-0">Join Our</span>
                        <h3 class="title_text mb-0">Related Products</h3>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="sports_product_item">
                                <div class="item_image" data-bg-color="#f5f5f5">
                                    <img src="assets/images/shop/sports/img_01.png" alt="image_not_found">
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
                                    <h3 class="item_title bg_black text-white mb-0">PHANTOM VISION ACADEMY</h3>
                                    <span class="item_price bg_sports_red"><strong>$195</strong> <del>$390</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="sports_product_item">
                                <div class="item_image" data-bg-color="#f5f5f5">
                                    <img src="assets/images/shop/sports/img_02.png" alt="image_not_found">
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
                                    <h3 class="item_title bg_black text-white mb-0">HOODIE & MORE</h3>
                                    <span class="item_price bg_sports_red"><strong>$195</strong> <del>$390</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="sports_product_item">
                                <div class="item_image" data-bg-color="#f5f5f5">
                                    <img src="assets/images/shop/sports/img_03.png" alt="image_not_found">
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
                                    <h3 class="item_title bg_black text-white mb-0">Nike Free RN Flyknit</h3>
                                    <span class="item_price bg_sports_red"><strong>$195</strong> <del>$390</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- sports_details - end
================================================== -->

<!-- inputs -->
<input type="hidden" class="product_id" value="{{$product->id}}">
<input type="hidden" class="size_input" value="{{$productAttr->first()[0]->size}}">
<input type="hidden" class="color_input" value="{{$productAttr->first()[0]->pcolor->color}}">
<input type="hidden" class="price_input" value="{{$productAttr->first()[0]->price}}">
<input type="hidden" class="product_attr" value="{{$productAttr->first()[0]->id}}">


@endsection


@push('custom-scripts')

<script>

    function color_function() {

        $('.color_btn').on('click', function(){
            $('.color_btn').removeClass('active');
            var product_id = $('.product_id').val();
            var size = $('.size_input').val();
            var color = $(this).attr('data-color');
            var color_btn = $(this);
            $.ajax({
                type: "POST",
                url: "{{route('color_change')}}",
                data:{
                    color:color,
                    size:size,
                    product_id: product_id
                },
                success:function(response){
                    if(response.success == true){
                        $('.price_span').text(`Rs. ${response.data.price}`)
                        $('.price_input').val(response.data.price);
                        $('.color_input').val(response.data.pcolor.color);
                        color_btn.addClass('active');
                        $('.product_attr').val(response.data.id); 
                    }else{
                        createToast('fa-circle-xmark', 'Something went wrong', 'error');
                    }
                },
                error:function(response){
                    createToast('fa-circle-xmark', 'Something went wrong', 'error');
                }
            })
            
        })
    } 

    $('.size_btn').on('click', function(){
        $('.size_btn').removeClass('active');
        var size = $(this).attr('data-size');
        var size_btn = $(this);
        var product_id = $('.product_id').val();
        $.ajax({
            type: "POST",
            url: "{{route('attr_change')}}",
            data:{
                size:size,
                product_id: product_id
            },
            success:function(response){
                if(response.success == true){
                    var data = response.attr;
                    var inner_html = `<div class="item_size d-flex align-items-center mb_30">
                                            <h4 class="list_title text-uppercase mb-0 mr-3">Color:</h4>
                                            <ul class="ul_li clearfix">`;
                    for (let index = 0; index < data.length; index++) {
                        const element = data[index];
                        var active = '';
                        if(index == 0){
                            active = 'active';
                        }else{
                            active = '';
                        }
                        inner_html += `<li><button class="color_btn ${active}" data-color="${element.color}" type="button">${element.pcolor.color}</button></li>`; 
                    }
                    inner_html += `      </ul>
                                    </div>`;
                    $('.color_div').html(inner_html);
                    $('.price_span').text(`Rs. ${data[0].price}`)
                    $('.price_input').val(data[0].price);
                    $('.color_input').val(data[0].pcolor.color);
                    $('.size_input').val(data[0].size);
                    $('.product_attr').val(data[0].id);
                    size_btn.addClass('active');
                    color_function();
                }else{
                    createToast('fa-check-circle', 'Something went wrong', 'error');
                }
            },
            error:function(response){
                createToast('fa-times-circle', 'Something went wrong', 'error');
            }
        })
    })

    color_function();

    $('.add_to_cart').on('click', function(){
        var product_id = $('.product_id').val();
        var attr_id = $('.product_attr').val();
        var price = $('.price_input').val();
        var size = $('.size_input').val();
        $.ajax({
            type: "POST",
            url: "{{route('add_to_cart')}}",
            data:{
                product_id:product_id,
                attr_id: attr_id,
                price:price,
                size:size
            },
            success:function(response){
                if(response.success == true){
                    createToast('fa-badge-check', response.msg, 'success'); 
                    setTimeout(() => {
                        window.location.href = "{{route('cart')}}";
                    }, 3000);                      
                }else{
                    createToast('fa-times-circle', 'This is messsage', 'success');                       
                }
            },
            error:function(response){
                createToast('fa-times-circle', 'This is messsage', 'success'); 
            }
        })
    })
</script>

@endpush