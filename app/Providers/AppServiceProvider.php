<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $cartCount = \App\Models\CartItem::where('user_id', Auth::id())->count();
                $wishlistCount = \App\Models\Wishlist::where('user_id', Auth::id())->count();

                $view->with('cartCount', $cartCount);
                $view->with('wishlistCount', $wishlistCount);
            } else {
                $view->with('cartCount', 0);
                $view->with('wishlistCount', 0);
            }
        });

    }
}
