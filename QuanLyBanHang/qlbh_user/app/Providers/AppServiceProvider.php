<?php

namespace App\Providers;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*view()->composer('header',function($view){
            $loai_sp = ProductType::all();
            $view->with('loai_sp',$loai_sp);
        });

        view()->composer('header',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart= new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer(['header','page.dat_hang'],function($view) {
            $loai_sp = ProductType::all();

            //$view->with('loai_sp',$loai_sp);
            $view->with('loai_sp', $loai_sp);
        });*/

        //chia se du lieu qua view(o day la view header)
        view()->composer(['header', 'page.dat_hang'], function ($view) {
            $loai_sp = ProductType::all();
            $view->with('loai_sp', $loai_sp);

        });

        view()->composer(['header', 'page.dat_hang'], function ($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'),
                    'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice,
                    'totalQty' => $cart->totalQty]);
            }
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
