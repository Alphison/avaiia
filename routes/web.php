<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['set_locale'])->group(function() {

    Route::controller(UserController::class)->group(function () {
        Route::post('/users/create', 'store')->name('user-create');
        Route::post('/users', 'auth')->name('user-auth');
        Route::get('/language/{language}', 'setLocale')->name("set-locale");
    
        Route::middleware(['auth'])->group(function () {
            Route::get('/users/{id}', 'show')->name('user-page');
            Route::post('/users/{id}/update', 'update')->name('user-update');
            Route::get('/users/{id}/delete', 'delete')->name('user-delete');
            Route::get('/logout', 'logout')->name('user-logout');
            Route::get('/users/{id}/admin', 'setAdmin');
        });
    });
    
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('page-index');
        Route::get('/login', 'login')->name('page-auth');
        // Route::get('/registration', 'reg')->name('page-reg');
        Route::get('/about', 'about')->name('page-about');
        Route::get('/announcement', 'anons')->name('page-anons');
        Route::get('/not-predicted-yet', 'notPredicted')->name('collection-not-predicted');
        Route::get('/bared', 'bared')->name('collection-bared');
        Route::get('/contacts', 'contacts')->name('page-contact');
        Route::get('/success_pay', 'success_pay')->name('success_pay');
    });
    
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products/{product:slug}', 'show')->name('product-page');
    
        Route::middleware(['auth', 'isAdmin'])->group(function () {
            Route::post('/products/create', 'store')->name('product-create');
            Route::post('/products/{product}/update', 'update')->name('product-update');
            Route::get('/products/{product}/update', 'edit')->name('product-edit');
            Route::get('/products/{product}/delete', 'delete')->name('product-delete');
        });
    });
    
    Route::controller(CollectionController::class)->group(function () {
        Route::get('/collections', 'index')->name('collections-page');
        Route::get('/collections/{collection:slug}', 'show')->name('collection-page');
    
        Route::middleware(['auth', 'isAdmin'])->group(function () {
            Route::post('/collections/create', 'store')->name('collection-create');
            Route::post('/collections/{collection}/update', 'update')->name('collection-update');
            Route::get('/collections/{collection}/update', 'edit')->name('collection-edit');
            Route::get('/collections/{collection}/delete', 'delete')->name('collection-delete');
        });
    });
    
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'show')->name('cart-page');
        Route::post('/cart/create', 'store')->name('cart-create');
        Route::get('/cart/{id}/delete', 'delete')->name('cart-delete');
    
        Route::get('/cart/{productId}/{sizeId}/increase', 'increase')->name('cart-increase');
        Route::get('/cart/{productId}/{sizeId}/decrease', 'decrease')->name('cart-decrease');
    });
    
    Route::controller(AddressController::class)->group(function () {
        Route::get('/delivery/{id}', 'index')->name('delivery-page');
        Route::post('/delivery/create', 'store')->name('delivery-create');
        Route::get('/delivery/{address}/delete', 'delete')->name('delivery-delete');
        Route::get('/payments/{id}', 'payment')->name('payment-view');
    });
    
    
    Route::controller(OrderController::class)->group(function () {
        Route::post('/orders/create', 'store')->name('order-create');
        Route::post('/orders/{id}/update', 'update')->name('order-update');
        Route::get('/orders/{id}/delete', 'delete')->name('order-delete');
        Route::get('/orders/{id}/success', 'success')->name('order-success');
        Route::get('/orders/rejected', 'rejected')->name('order-reject');
    });

    Route::controller(SubscribeController::class)->group(function () {
        Route::post('/subscribe', 'store')->name('sub-create');
    });
    
    Route::controller(SizeController::class)->middleware(['auth', 'isAdmin'])->group(function () {
        Route::post('/product/size/create', 'store')->name('size-create');
    });
    
    Route::controller(FavoriteController::class)->group(function () {
        Route::get('/favorites', 'index')->name('favorite-page');
    });
    
    Route::controller(PreOrderController::class)->middleware(['auth'])->group(function () {
        Route::post('/pre-order', 'store')->name('preOrder-create');
    });
    
    Route::controller(PromocodeController::class)->group(function () {
        Route::get('/promo/{promocode}', 'find');
        Route::post('/promo/create', 'store')->name('promo-create');
        Route::get('/promo/{promocode}/delete', 'destroy');
    });

    Route::controller(AdminController::class)->middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/admin', 'index')->name('admin-page');
        Route::get('/orders/{id}', 'order')->name('order-page');
    });
    

});





