<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Simran Bharoli</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favourite_icon_01.png')}}">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- icon - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">

    <!-- animation - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">

    <!-- nice select - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nice-select.css')}}">

    <!-- carousel - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">

    <!-- popup images & videos - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">

    <!-- jquery ui - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}">

    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> -->

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

</head>


<body class="home_sports">

    <div id="loader-overlay">
        <div class="loader"></div>
    </div>

    <!-- backtotop - start -->
    <div id="thetop"></div>
    <!-- <div class="backtotop bg_fashion2_red">
			<a href="#" class="scroll">
				<i class="far fa-arrow-up"></i>
			</a>
		</div> -->
    <!-- backtotop - end -->

    <!-- preloader - start -->
    <!-- <div id="preloader"></div> -->
    <!-- preloader - end -->


    <!-- header_section - start
		================================================== -->
    <header class="header_section sports_header sticky_header d-flex align-items-center clearfix">
        <div class="container-fluid prl_100">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="brand_logo">
                        <a class="brand_link" href="{{asset('')}}">
                            <img src="{{asset('assets/images/logo/logo.jpeg')}}"
                                srcset="{{asset('assets/images/logo/logo.jpeg')}} 2x" alt="logo_not_found">
                        </a>
                    </div>
                </div>

                <div class="col-6">
                    <div class="header_btns_group d-flex align-items-center justify-content-end">
                        <ul class="circle_social_links ul_li clearfix">
                            <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                        <ul class="header_action_btns ul_li clearfix">
                            <li>
                                <button type="button" class="cart_btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="btn_badge">2</span>
                                </button>
                            </li>
                            <li><button type="button" class="mobile_menu_btn"><i class="far fa-bars"></i></button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header_section - end
		================================================== -->


    <!-- main body - start
================================================== -->
    <main>


        <!-- sidebar mobile menu & sidebar cart - start
================================================== -->
        <div class="sidebar-menu-wrapper">
            <div class="cart_sidebar">
                <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

                <ul class="cart_items_list ul_li_block mb_30 clearfix">
                    <li>
                        <div class="item_image">
                            <img src="assets/images/cart/img_01.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                    <li>
                        <div class="item_image">
                            <img src="assets/images/cart/img_01.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                    <li>
                        <div class="item_image">
                            <img src="assets/images/cart/img_01.jpg" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">Yellow Blouse</h4>
                            <span class="item_price">$30.00</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                </ul>

                <ul class="total_price ul_li_block mb_30 clearfix">
                    <li>
                        <span>Subtotal:</span>
                        <span>$90</span>
                    </li>
                    <li>
                        <span>Vat 5%:</span>
                        <span>$4.5</span>
                    </li>
                    <li>
                        <span>Discount 20%:</span>
                        <span>- $18.9</span>
                    </li>
                    <li>
                        <span>Total:</span>
                        <span>$75.6</span>
                    </li>
                </ul>

                <ul class="btns_group ul_li_block clearfix">
                    <li><a href="{{route('cart')}}">View Cart</a></li>
                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                </ul>
            </div>

            <div class="sidebar_mobile_menu">
                <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

                <div class="msb_widget brand_logo text-center">
                    <a href="{{asset('')}}">
                        <img src="assets/images/logo/logo_25_1x.png" srcset="assets/images/logo/logo_25_2x.png 2x"
                            alt="logo_not_found">
                    </a>
                </div>

                <div class="msb_widget mobile_menu_list clearfix">
                    <h3 class="title_text mb_15 text-uppercase"><i class="far fa-bars mr-2"></i> Menu List</h3>
                    <ul class="ul_li_block clearfix">
                        <li class="active dropdown">
                            <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                            <ul class="ul_li_block dropdown-menu">
                                <li><a href="home_carparts.html">Carparts</a></li>
                                <li><a href="home_classic_ecommerce.html">Classic Ecommerce</a></li>
                                <li><a href="home_creative_onelook.html">Creative Onelook</a></li>
                                <li><a href="home_electronic.html">Electronic</a></li>
                                <li><a href="home_fashion.html">Fashion</a></li>
                                <li><a href="home_fashion_minimal.html">Fashion Minimal</a></li>
                                <li><a href="home_furniture.html">Furniture</a></li>
                                <li><a href="home_gadget.html">Gadget</a></li>
                                <li><a href="home_lookbook_creative.html">Lookbook Creative</a></li>
                                <li><a href="home_lookbook_slide.html">Lookbook Slide</a></li>
                                <li><a href="home_medical.html">Medical</a></li>
                                <li><a href="home_modern.html">Modern</a></li>
                                <li><a href="home_modern_minimal.html">Modern Minimal</a></li>
                                <li><a href="home_motorcycle.html">Motorcycle</a></li>
                                <li><a href="home_parallax_shop.html">Parallax Shop</a></li>
                                <li><a href="home_simple_shop.html">Simple Shop</a></li>
                                <li><a href="home_single_story_black.html">Single Story Black</a></li>
                                <li><a href="home_single_story_white.html">Single Story White</a></li>
                                <li><a href="home_sports.html">Sports</a></li>
                                <li><a href="home_supermarket.html">Supermarket</a></li>
                                <li><a href="home_watch.html">Watch</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown ul_li_block">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Carparts</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="carparts_shop.html">Shop Page</a></li>
                                        <li><a href="carparts_shop_grid.html">Shop Grid</a></li>
                                        <li><a href="carparts_shop_list.html">Shop List</a></li>
                                        <li><a href="carparts_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Classic Ecommerce</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="classic_ecommerce_shop.html">Shop Page</a></li>
                                        <li><a href="classic_ecommerce_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Electronic</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="electronic_shop.html">Shop Page</a></li>
                                        <li><a href="electronic_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Fashion</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="fashion_shop.html">Shop Page</a></li>
                                        <li><a href="fashion_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Fashion Minimal</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="fashion_minimal_shop.html">Shop Page</a></li>
                                        <li><a href="fashion_minimal_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Fashion Minimal</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="fashion_minimal_shop.html">Shop Page</a></li>
                                        <li><a href="fashion_minimal_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Furniture</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="furniture_shop.html">Shop Page</a></li>
                                        <li><a href="furniture_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Gadget</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="gadget_shop.html">Shop Page</a></li>
                                        <li><a href="gadget_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Medical</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="medical_shop.html">Shop Page</a></li>
                                        <li><a href="medical_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Modern Minimal</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="modern_minimal_shop.html">Shop Page</a></li>
                                        <li><a href="modern_minimal_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Modern</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="modern_shop.html">Shop Page</a></li>
                                        <li><a href="modern_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Motorcycle</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="motorcycle_shop_grid.html">Shop Grid</a></li>
                                        <li><a href="motorcycle_shop_list.html">Shop List</a></li>
                                        <li><a href="motorcycle_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Simple Shop</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="simple_shop.html">Shop Page</a></li>
                                        <li><a href="simple_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Sports</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="sports_shop.html">Shop Page</a></li>
                                        <li><a href="sports_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Lookbook</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="lookbook_creative_shop.html">Shop Page</a></li>
                                        <li><a href="lookbook_creative_shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop
                                        Other Pages</a>
                                    <ul class="dropdown-menu ul_li_block">
                                        <li><a href="#!"><del>Shop Page</del></a></li>
                                        <li><a href="shop_details.html">Shop Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop
                                        Inner Pages</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="shop_cart.html">Shopping Cart</a></li>
                                        <li><a href="shop_checkout.html">Checkout Step 1</a></li>
                                        <li><a href="shop_checkout_step2.html">Checkout Step 2</a></li>
                                        <li><a href="shop_checkout_step3.html">Checkout Step 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="404.html">404 Page</a></li>
                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Blogs</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog.html">Blog Page</a></li>
                                        <li><a href="blog_details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Compare</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="compare_1.html">Compare V.1</a></li>
                                        <li><a href="compare_2.html">Compare V.2</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#!" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Register</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="signup.html">Sign Up</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Conatct</a></li>
                    </ul>
                </div>

                <div class="user_info">
                    <h3 class="title_text mb_30 text-uppercase"><i class="fas fa-user mr-2"></i> User Info</h3>
                    <div class="profile_info clearfix">
                        <div class="user_thumbnail">
                            <img src="assets/images/meta/img_01.png" alt="thumbnail_not_found">
                        </div>
                        <div class="user_content">
                            <h4 class="user_name">Jone Doe</h4>
                            <span class="user_title">Seller</span>
                        </div>
                    </div>
                    <ul class="settings_options ul_li_block clearfix">
                        <li><a href="#!"><i class="fal fa-user-circle"></i> Profile</a></li>
                        <li><a href="#!"><i class="fal fa-user-cog"></i> Settings</a></li>
                        <li><a href="#!"><i class="fal fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>

            <div class="overlay"></div>
        </div>
        <!-- sidebar mobile menu & sidebar cart - end
================================================== -->


        @yield('content')



    </main>
    <!-- main body - end
================================================== -->

    <!-- footer_section - start
		================================================== -->
    <footer class="footer_section fashion_minimal_footer clearfix" data-bg-color="#222222">
        <div class="backtotop" data-background="{{asset('assets/images/shape_01.png')}}">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>

        <div class="footer_widget_area sec_ptb_100 clearfix">
            <div class="container">
                <div class="row justify-content-lg-between">

                    <div class="col-lg-4 col-lmd-6 col-sm-6 col-xs-12">
                        <div class="footer_widget footer_about">
                            <div class="brand_logo mb_30">
                                <a href="#!">
                                    <img src="{{asset('assets/images/logo/logo_33_1x.png')}}"
                                        srcset="{{asset('assets/images/logo/logo_33_2x.png')}} 2x" alt="logo_not_found">
                                </a>
                            </div>
                            <p class="mb_30">
                                Etiam rhoncus sit amet adip scing sed
                                ipsum. Lorem ipsum dolor sit amet adipiscing
                                sem neque. dolor sit amet adipiscing
                                sem neque.
                            </p>
                            <ul class="circle_social_links ul_li clearfix">
                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-lmd-6 col-sm-6 col-xs-12">
                        <div class="row justify-content-lg-between">
                            <div class="col-lg-6 col-lmd-6 col-sm-6 col-xs-12">
                                <div class="footer_widget footer_useful_links clearfix">
                                    <h3 class="footer_widget_title text-white">Links</h3>
                                    <ul class="ul_li_block">
                                        <li><a href="#!">About</a></li>
                                        <li><a href="#!">Contact</a></li>
                                        <li><a href="#!">Our Gallery</a></li>
                                        <li><a href="#!">Programs</a></li>
                                        <li><a href="#!">Events</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-lmd-6 col-sm-6 col-xs-12">
                                <div class="footer_widget footer_useful_links clearfix">
                                    <h3 class="footer_widget_title text-white">Links</h3>
                                    <ul class="ul_li_block">
                                        <li><a href="#!">Table/Floor Toys</a></li>
                                        <li><a href="#!">Outdoor Games</a></li>
                                        <li><a href="#!">Sand Play</a></li>
                                        <li><a href="#!">Play Dough</a></li>
                                        <li><a href="#!">Building Blocks</a></li>
                                        <li><a href="#!">Water Play</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-lmd-6 col-sm-6 col-xs-12">
                        <div class="footer_widget sports_footer_contact clearfix">
                            <h3 class="footer_widget_title text-white">Get In Touch</h3>
                            <ul class="ul_li_block">
                                <li>
                                    <span class="icon"><i class="fal fa-phone-square"></i></span>
                                    <div class="content_wrap d-table">
                                        <p class="mb-0">Open: 8:00 AM - Close: 18:00 PM</p>
                                        <p class="mb-0">Saturday - Sunday: Close</p>
                                    </div>
                                </li>
                                <li>
                                    <span class="icon"><i class="fal fa-envelope"></i></span>
                                    <div class="content_wrap d-table">
                                        <p class="mb-0">(012) 800 456 789-987</p>
                                        <p class="mb-0">jthemes@gmail.com</p>
                                    </div>
                                </li>
                                <li>
                                    <span class="icon"><i class="fal fa-map"></i></span>
                                    <div class="content_wrap d-table">
                                        <p class="mb-0">
                                            123 Main Street, Anytown, CA 12345 - USA. United States
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="footer_bottom">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p class="copyright_text mb-0">
                            © Copyrights, 2019 <a href="#!" class="author_link text-white">Neoncart.com</a>
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="payment_methods float-lg-right float-md-right">
                            <img src="{{asset('assets/images/payment_methods_04.png')}}" alt="image_not_found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_section - end
		================================================== -->

        <ul class="notifications"></ul>
    <!-- fraimwork - jquery include -->
    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- mobile menu - jquery include -->
    <script src="{{asset('assets/js/mCustomScrollbar.js')}}"></script>

    <!-- google map - jquery include -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6">
    </script>
    <script src="{{asset('assets/js/gmaps.min.js')}}"></script>

    <!-- animation - jquery include -->
    <script src="{{asset('assets/js/parallaxie.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>

    <!-- nice select - jquery include -->
    <script src="{{asset('assets/js/nice-select.min.js')}}"></script>

    <!-- carousel - jquery include -->
    <script src="{{asset('assets/js/slick.min.js')}}"></script>

    <!-- countdown timer - jquery include -->
    <script src="{{asset('assets/js/countdown.js')}}"></script>

    <!-- popup images & videos - jquery include -->
    <script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>

    <!-- filtering & masonry layout - jquery include -->
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>

    <!-- jquery ui - jquery include -->
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>

    <!-- custom - jquery include -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script>

    $(document).ready(function () {
        $(document).ajaxStart(function () {
            $("#loader-overlay").css("display", "flex");
        });
    
        $(document).ajaxStop(function () {
            $("#loader-overlay").css("display", "none");
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
      //toast js

    const notifications = document.querySelector(".notifications");

    const removeToast = (toast) => {
        toast.classList.add("hide");
        if(toast.timeoutId) clearTimeout(toast.timeoutId);
        setTimeout(() => toast.remove(), 500); 
    }
    const createToast = (icon, text, className) => {
        const toast = document.createElement("li");
        toast.className = `custom_toast ${className}`;
        
        toast.innerHTML = `<div class="column">
                            <i class="fas ${icon}"></i>
                            <span>${text}</span>
                        </div>
                        <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`;
        notifications.appendChild(toast); 
        
        toast.timeoutId = setTimeout(() => removeToast(toast), 5000);
    }
    </script>

    @stack('custom-scripts')
</body>

</html>