<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Wishlist;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['website.master'],function ($view){
            $view->with('categories', Category::all());
            $view->with('wishlist', Wishlist::where('customer_id',Session::get('customer_id'))->get());

        });
    }
}
