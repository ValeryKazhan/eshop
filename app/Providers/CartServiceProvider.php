<?php

namespace App\Providers;

use App\Services\Cart\Cart;
use App\Services\Cart\SessionCart;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Cart::class, function($app, Request $request){
            return new SessionCart($request);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
