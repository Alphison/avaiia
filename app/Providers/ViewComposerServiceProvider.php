<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.Header', function ($view) {
            $cartItemsCount = 0;
    
            if(request()->hasCookie('browser_session') && Auth::check()){
                $cartItems = request()->cookie('browser_session');

                $productsInCart = Cart::where('session_token', $cartItems)->orWhere("user_id", auth()->user()->id)->get();

                $cartItemsCount = $productsInCart->count();

            }else if(request()->hasCookie('browser_session')) {

                    $cartItems = request()->cookie('browser_session');
    
                    $productsInCart = Cart::where('session_token', $cartItems)->get();
    
                    $cartItemsCount = $productsInCart->count();
                }
            
    
            $view->with('cartItemsCount', $cartItemsCount);
        });
    }
}
