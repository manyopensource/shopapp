<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MyAuthenticate;

Route::get('/', function () {
    return view('home', ['user' => auth()->user()]);
})->name('home');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products');

Route::middleware(MyAuthenticate::class)->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])
    ->name('orders');

    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');

    Route::post('/checkout', [OrderController::class, 'checkout']);
});
