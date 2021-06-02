<?php

use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ContractController;
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

/**
 * Authorization
 */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

/**
 * Pages
 */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/store', [StoreController::class, 'index'])->name('store');

/**
 * Products
 */
Route::get('/product/{product:name}', [ProductProfileController::class, 'index'])->name('product.profile');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::post('/products', [ProductsController::class, 'create'])->name('product.create');
Route::post('/products/{product_id}', [ProductProfileController::class, 'store'])->name('product.store');

/**
 * Cart
 */
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/{product_id}', [CartController::class, 'store'])->name('cart.add');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/order_summary', [OrderController::class, 'index'])->name('order.summary');

/**
 * Contracts
 */
Route::get('/privacy-policy', [ContractController::class, 'index_privacy']) -> name('privacy.index');
Route::get('/purchase-rules', [ContractController::class, 'index_purchase']) -> name('purchase.index');
Route::get('/registration-rules', [ContractController::class, 'index_registration']) -> name('registration.index');

/**
 * Category
 */
Route::get('/category/{name}', [CategoryProductController::class, 'index'])->name('category.product.index');

/**
 * Seller Application Form
 */
Route::get('/seller-application-form', [SellerController::class, 'index'])->name('application.form');
Route::post('/seller-application-form', [SellerController::class, 'store'])->name('application.form.store');

