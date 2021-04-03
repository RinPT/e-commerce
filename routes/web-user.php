<?php

use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\UserAddressController;
use Illuminate\Support\Facades\Route;

Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::post('/account/update', [AccountController::class, 'update_info'])->name('account.update');
Route::post('/account/password', [AccountController::class, 'update_password'])->name('password.update');
Route::delete('/account/delete', [AccountController::class, 'destroy'])->name('account.delete');

Route::post('/account/new_address', [AddressController::class, 'store'])->name('address.add');

Route::group(['prefix' => "/userprofile"], function() {
    //User Address Operations :
    Route::post('/{user:username}/address/{user_address}', [UserAddressController::class, 'update'])-> name('address.update');
    Route::delete('/{user:username}/address/{user_address}', [UserAddressController::class, 'destroy'])-> name('address.destroy');
});

//Products:

Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::post('/products', [ProductsController::class, 'create'])->name('product.create');
