<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product routes dengan group
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products');
    Route::get('/create', 'create')->name('products.create');
    Route::post('/store', 'store')->name('products.store');
    Route::get('/show/{id}', 'show')->name('products.show');
    Route::get('/edit/{id}', 'edit')->name('products.edit');
    Route::post('/update/{id}', 'update')->name('products.update');
    Route::delete('/delete/{id}', 'destroy')->name('products.destroy');
});
