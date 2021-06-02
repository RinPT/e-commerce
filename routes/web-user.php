<?php

use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\User\AddressController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "/account"], function() {
    Route::get('/', [AccountController::class, 'index'])->name('account');
    Route::post('/update', [AccountController::class, 'update_info'])->name('account.update');
    Route::post('/password', [AccountController::class, 'update_password'])->name('account.password.update');
    Route::delete('/delete', [AccountController::class, 'destroy'])->name('account.delete');

    Route::post('/new_address', [AddressController::class, 'store'])->name('address.add');
    Route::post('/address_update/{address_id}', [AddressController::class, 'update'])->name('address.update');
    Route::delete('/address_delete/{address_id}', [AddressController::class, 'destroy'])->name('address.destroy');
});



