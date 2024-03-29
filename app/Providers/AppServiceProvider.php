<?php

namespace App\Providers;

use App\Interfaces\Repositories\UnisenderRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Services\UnisenderServiceInterface;
use App\Models\Product;
use App\Observers\ProductObserver;
use App\Repositories\UnisenderRepository;
use App\Repositories\UserRepository;
use App\Services\UnisenderService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(UnisenderServiceInterface::class, UnisenderService::class);
        $this->app->bind(UnisenderRepositoryInterface::class, UnisenderRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
	    if (!env('APP_DEBUG')) {
	    	URL::forceScheme('https');
	    }
    }

    protected $observers = [
        Product::class => [ProductObserver::class],
    ];
}
