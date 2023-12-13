<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\postcategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Post;
use App\Models\Topbar;
use App\Models\Product;


use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        View::composer('*', function($view1)
        {
                if(Auth::user()){
                    $session_id = Auth::user()->id;
                }else{
                    $session_id = session()->getId();
                }
                $dropProducts = Product::orderby('id', 'desc')->get();
                $topcount = Cart::where('cart_number', '=', $session_id)->count('id');
                $cart_item = Cart::where('cart_number', $session_id)->with('product_detail', 'attr')->orderBy('id', 'desc')->get();
                $view1->with([
                'topcount' => $topcount,
                'cart_item' => $cart_item,
                'dropProducts' => $dropProducts
                ]);
            
        });
        Paginator::useBootstrap();
    }
}
