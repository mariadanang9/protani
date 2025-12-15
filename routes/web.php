<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Product routes (public)
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products');
    Route::get('/show/{id}', 'show')->name('products.show');
});

// Product management routes (protected - nanti bisa ditambah admin middleware)
Route::middleware('auth')->group(function () {
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('/create', 'create')->name('products.create');
        Route::post('/store', 'store')->name('products.store');
        Route::get('/edit/{id}', 'edit')->name('products.edit');
        Route::post('/update/{id}', 'update')->name('products.update');
        Route::delete('/delete/{id}', 'destroy')->name('products.destroy');
    });
});

// Cart & Order routes
Route::middleware('auth')->group(function () {
    // Cart routes
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart/add/{product}', 'add')->name('cart.add');
        Route::patch('/cart/update/{cart}', 'update')->name('cart.update');
        Route::delete('/cart/remove/{cart}', 'remove')->name('cart.remove');
        Route::delete('/cart/clear', 'clear')->name('cart.clear');
    });

    // Order routes
    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders', 'index')->name('orders.index');
        Route::get('/orders/{order}', 'show')->name('orders.show');
        Route::get('/checkout', 'create')->name('checkout.create');
        Route::post('/checkout', 'store')->name('checkout.store');
        Route::post('/orders/{order}/cancel', 'cancel')->name('orders.cancel');
    });
});

// Product routes dengan group
//Route::controller(ProductController::class)->prefix('products')->group(function () {
    //Route::get('/', 'index')->name('products');
    //Route::get('/create', 'create')->name('products.create');
    //Route::post('/store', 'store')->name('products.store');
    //Route::get('/show/{id}', 'show')->name('products.show');
    //Route::get('/edit/{id}', 'edit')->name('products.edit');
    //Route::post('/update/{id}', 'update')->name('products.update');
    //Route::delete('/delete/{id}', 'destroy')->name('products.destroy');
//});
