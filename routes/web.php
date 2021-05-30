<?php

use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductProfileController;

include('web-user.php');
include('web-admin.php');

//Authorization :

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Pages :

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/store', [StoreController::class, 'index'])->name('store');

//Products:

Route::get('/product/{product:name}', [ProductProfileController::class, 'index'])->name('product.profile');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::post('/products', [ProductsController::class, 'create'])->name('product.create');
Route::post('/products/{product_id}', [ProductProfileController::class, 'store'])->name('product.store');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/{product_id}', [CartController::class, 'store'])->name('cart.add');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/order_summary', [OrderController::class, 'index'])->name('order.summary');
