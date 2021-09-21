<?php

namespace App\Providers;

use App\Http\Middleware\Admin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Laravel\Cashier\Cashier;

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

        Cashier::calculateTaxes();

        Paginator::useBootstrap();

        Blade::if('admin', function(){
            if(auth()->guest())
                return false;
            return auth()->user()->is_admin;
        });
    }
}
