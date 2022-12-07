<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.main.welcome');
}) -> name('index');

Route::get('/products', [ProductController::class, 'getByCategory'])
    ->name('products');

Route::get('/products/{id}/addCart' , [CartController::class, 'addProduct'])
    ->name('addProductCart');

Route::get('/products/{id}/removeCart', [CartController::class,'delProduct'])
    ->name('delProductCart');

Route::get('/detail', [ProductController::class, 'getDetail'])
    ->name('detail');

Route::get('/cart', [CartController::class, 'getCart'])
    ->name('cart');

Route::get('/checkout', [CartController::class, 'getCheckout'])
    ->name('checkout');

Route::post('/order', [OrderController::class, 'create'])
    ->name('createOrder');

Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/admin', [AdminController::class, 'main'])
        ->name('admin');
});



