<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', [HomeController::class, 'users']);
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/cart_delete/{id}', [HomeController::class, 'cart_delete'])->name('cart-delete');
// Route::get('/add_to_cart/{id}', [HomeController::class, 'add_to_cart'])->name('add_to_cart');
// Route::post('/add_to_cart/{id}', [HomeController::class, 'add_to_cart'])->name('addToCart');
// Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
// Route::get('/about', [HomeController::class, 'about'])->name('about');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/products', [HomeController::class, 'products'])->name('products');
// Route::post('/placeorder', [HomeController::class, 'placeorder'])->name('placeorder');
// Route::post('/apply_coupon',[HomeController::class, 'coupon'])->name('applycoupon');

Route::get('/demo', function(){
   echo "there"; 
});

//logins
Route::get('/sign-in', [FrontController::class, 'login'])->name('sign_in');

Route::post('/sign-in', [FrontController::class, 'sign_in'])->name('front.login');

Route::post('/register-driver', [FrontController::class, 'drive_register'])->name('driver_register');
Route::post('/register-owner', [FrontController::class, 'owner_register'])->name('owner_register');


Route::get('/', [FrontController::class, 'home'])->name('home');



Route::get('/products', [FrontController::class, 'shop'])->name('shop');
Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');
Route::post('/send_otp', [FrontController::class, 'send_otp'])->name('send_otp');

Route::post('/add_package', [FrontController::class, 'add_package'])->name('add_package');




Route::get('/about-us', [FrontController::class, 'about_us'])->name('about_us');
Route::get('/contact-us', [FrontController::class, 'contact_us'])->name('contact_us');
Route::get('/cart', [FrontController::class, 'cart'])->name('cart');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('blogs');
Route::post('/place-order', [FrontController::class, 'place_order'])->name('place_order');

//ajax route
Route::post('/attr_change', [FrontController::class, 'attr_change'])->name('attr_change');
Route::post('/color_change', [FrontController::class, 'color_change'])->name('color_change');

Route::post('/add-to-cart', [FrontController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/update-cart', [FrontController::class, 'update_cart'])->name('update_cart');
Route::post('/delete-cart', [FrontController::class, 'delete_cart'])->name('delete_cart');
Route::post('/delete-all-cart', [FrontController::class, 'delete_all_cart'])->name('delete_all_cart');
Route::post('/verify_otp', [FrontController::class, 'verify_otp'])->name('verify_otp');
Route::post('/update_profile', [FrontController::class, 'update_profile'])->name('update_profile');
Route::post('/update_address', [FrontController::class, 'update_address'])->name('update_address');
Route::post('/send_query', [FrontController::class, 'send_query'])->name('send_query');


Route::get('/register-driver', [FrontController::class, 'register'])->name('register_driver');
Route::get('/register-owner', [FrontController::class, 'register_owner'])->name('register_owner');
Route::get('/add-driver', [FrontController::class, 'add_driver_form'])->name('add_driver_form');
Route::post('/add-driver', [FrontController::class, 'add_driver'])->name('add_driver');

Route::middleware(['auth'])->group(function(){
    Route::get('/my-profile', [FrontController::class, 'my_profile'])->name('my_profile');
    Route::post('/driver-car-register', [FrontController::class, 'driver_car_register'])->name('driver_car_register');
    Route::get('/driver-car-register', [FrontController::class, 'driver_car_register_form'])->name('driver_car_register_form');

    Route::get('/car-register', [FrontController::class, 'car_register_form'])->name('car_register_form');
    Route::post('/car-register', [FrontController::class, 'car_register'])->name('car_register');
    Route::get('/inspecte', [FrontController::class, 'inspecte_form'])->name('inspecte_form');
});

Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
     return 'Config cache cleared';
 }); 
 
 Route::get('/route-clear', function() {
     $exitCode = Artisan::call('route:clear');
     return 'Config cache cleared';
 }); 

 Route::prefix('fr')->group(function(){
    Route::get('/', [FrontController::class, 'french_home'])->name('french_home');

 });



Route::middleware(['auth', 'isAdmin'])->prefix('backend')->group(function(){
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
    Route::get('/add', [AdminController::class, 'add_show'])->name('add_form');
    Route::get('/detail', [AdminController::class, 'detail_show'])->name('detail');
    Route::post('/uploadproduct', [AdminController::class, 'upload'])->name('upload');
    Route::any('/deleteproduct-imggallery/{id}', [AdminController::class, 'img_delete'])->name('img_delete');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::post('/trash', [AdminController::class, 'trash'])->name('trash');
    Route::get('/trash_view', [AdminController::class, 'trash_data'])->name('trashedData');
    Route::post('/delete', [AdminController::class, 'delete'])->name('delete');
    Route::post('/restore', [AdminController::class, 'restore'])->name('restore');
    Route::get('/orderdetail', [AdminController::class, 'orderdetail'])->name('orderdetail');
    Route::get('/booked-readings', [AdminController::class, 'book_reading'])->name('booked-reading');
    Route::get('/gallery', [AdminController::class, 'gallery'])->name('gallery');
    Route::post('/admin/savegallery', [AdminController::class, 'gallery_store'])->name('savegallery');
    Route::any('/delete-gallery/{id}', [AdminController::class, 'gallery_delete'])->name('gallerydelete');
    Route::get('/order-detail/{id}', [AdminController::class, 'single_order'])->name('single-order');
    
     Route::any('/print-order/{id}', [AdminController::class, 'print_single_order'])->name('print-single-order');
    
    Route::get('/top-bar', [AdminController::class, 'topbar'])->name('topbar');
    Route::post('/top-bar', [AdminController::class, 'addtopbar'])->name('addtopbar');

    Route::post('/delete-size', [AdminController::class, 'delete_size'])->name('delete_size');


    Route::post('upload', [AdminController::class, 'uploadCkImage'])->name('ckeditor.upload');
    Route::resource('post', PostController::class);

    Route::resource('product-category', ProductCategoryController::class);
    Route::post('product-category-delete', [ProductCategoryController::class, 'category_delete'])->name('category_delete');

    Route::resource('color', ColorController::class);
    Route::post('color-delete', [ColorController::class, 'color_delete'])->name('color_delete');



    Route::resource('testimonial', TestimonialController::class);
    Route::any('testimonial-delete/{id}', [TestimonialController::class, 'testimonial_delete'])->name('testimonial.delete');

    Route::resource('adminblogs', BlogsController::class);
    Route::post('blogs-delete', [BlogsController::class, 'blog_delete'])->name('adminblogs.delete');
    Route::post('post-delete', [PostController::class, 'post_delete'])->name('post.delete');
    Route::get('/size', [AdminController::class, 'size'])->name('size');
    Route::get('/size/{id}', [AdminController::class, 'edit_size'])->name('edit_size');
    Route::post('/size/{id}', [AdminController::class, 'update_size'])->name('update_size');
    Route::post('/size', [AdminController::class, 'add_size'])->name('add_size');
    Route::post('/delete-product-size', [AdminController::class, 'delete_product_size'])->name('delete_product_size');

    Route::get('/coupon', [AdminController::class, 'coupon'])->name('coupon');
    Route::post('/coupon', [AdminController::class, 'add_coupon'])->name('add_coupon');
    
    Route::post('/out_stock', [AdminController::class, 'out_stock'])->name('out_stock');
    
    Route::resource('banners', BannerController::class);
    Route::post('banner-delete', [BannerController::class, 'banner_delete'])->name('banners.delete');
});


Auth::routes();

Route::get('/blogs/{slug}', [FrontController::class, 'single_blog'])->name('single_blog');
Route::get('/{category}', [FrontController::class, 'single_category'])->name('single_category');
Route::get('/{category}/{product}', [FrontController::class, 'single_product'])->name('single_product');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
