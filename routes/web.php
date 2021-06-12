<?php

use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PasswordResetController;
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
 * Reset Password
 */
Route::get('/forgot-password', [PasswordResetController::class, 'index'])->name('forgot.password');
Route::post('/forgot-password/done', [PasswordResetController::class, 'generate_token'])->name('forgot.password.done');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset_password'])->name('password.reset');
Route::post('/reset-password/done', [PasswordResetController::class, 'password_store'])->name('password.reset.done');

/**
 * Pages
 */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');

/**
 * Products
 */
Route::get('/product/{name}/{id}', [ProductController::class, 'index'])->name('product.profile');
Route::post('/product/add/review/{product_id}',[ProductController::class, 'store_review'])->name('product.review.add');

/**
 * Cart
 */
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
Route::post('/cart/delete', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/order_summary', [OrderController::class, 'index'])->name('order.summary');
Route::get('/checkout', [CartController::class, 'index'])->name('checkout');

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

/**
 * Store
 */
Route::get('/stores', [StoresController::class, 'index'])->name('stores.index');
Route::get('/stores/search', [StoresController::class, 'search'])->name('stores.search');
Route::get('/store/{name}/{id}', [StoresController::class, 'store_products_index'])->name('store.products');


/**
 * User Pages
 */
Route::group(['middleware' => 'auth'],function (){
    Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist')->middleware('auth');
    Route::post('/wishlist/add', [WishListController::class, 'store'])->name('wishlist.add');
    Route::get('/wishlist/{id}/delete', [WishListController::class, 'destroy'])->name('wishlist.destroy');
});

