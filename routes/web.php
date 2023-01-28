<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Front\{HomeController,AuthUserController,CartController,CheckoutController};
use \App\Http\Controllers\Admin\{AuthAdminController,BrandController,ProductController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::get('/', [HomeController::class, 'index'])->name('index');

    // register & login
    Route::get('register', [AuthUserController::class, 'register'])->name('register');
    Route::post('register', [AuthUserController::class, 'doRegister'])->name('do-register');
    Route::get('login', [AuthUserController::class, 'login'])->name('login');
    Route::post('login', [AuthUserController::class, 'doLogin'])->name('do-login');

    // products and brands
    Route::get('product-details/{product_id}', [HomeController::class, 'productDetails'])->name('product-details');
    Route::get('brands', [HomeController::class, 'brands'])->name('brands');
    Route::get('brand-products/{brand_id}', [HomeController::class, 'brandProducts'])->name('brand-products');


    // auth user
    Route::group(['middleware' => 'auth'],function (){

        Route::post('logout', [AuthUserController::class, 'logout'])->name('logout');

        // cart
        Route::get('cart', [CartController::class, 'cart'])->name('cart');
        Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
        Route::delete('delete-cart-item/{item_id}', [CartController::class, 'deleteCartItem'])->name('delete-cart-item');
        Route::post('update-cart-data', [CartController::class, 'updateCartData'])->name('update-cart-data');

        // checkout
        Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
        Route::post('checkout', [CheckoutController::class, 'doCheckout'])->name('do-checkout');
        Route::get('order-done', [CheckoutController::class, 'orderCompleted'])->name('order-done');


    });

