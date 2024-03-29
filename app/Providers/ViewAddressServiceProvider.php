<?php

namespace App\Providers;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewAddressServiceProvider extends ServiceProvider
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
        View::composer('pages.delivery', function ($view) {
            $addresses = 0;
    
            if(request()->hasCookie('browser_session') && Auth::check()){

                $addressItems = request()->cookie('browser_session');

                $addresses = Address::where('session_token', $addressItems)->orWhere("user_id", auth()->user()->id)->get();

            }else if(request()->hasCookie('browser_session')) {

                $addressItems = request()->cookie('browser_session');

                $addresses = Address::where('session_token', $addressItems)->get();

            }
            
    
            $view->with('addresses', $addresses);
        });
    }
}
