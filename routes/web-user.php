<?php

use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserAddressController;
use Illuminate\Support\Facades\Route;

Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::post('/account/update', [AccountController::class, 'update_info'])->name('account.update');
Route::post('/account/password', [AccountController::class, 'update_password'])->name('password.update');
Route::delete('/account/delete', [AccountController::class, 'destroy'])->name('account.delete');


Route::group(['prefix' => "/userprofile"], function() {
    //User Address Operations :
    Route::get('/{user}/address', [UserAddressController::class, 'index']) -> name('user.address'); //display all saved addresses of this user
    Route::get('/{user:username}/address/{user_address}', [UserAddressController::class, 'display']) -> name('address.display'); //display specific address update form
    Route::post('/{user:username}/address/{user_address}', [UserAddressController::class, 'update'])-> name('address.update'); //updates specific address
    Route::delete('/{user:username}/address/{user_address}', [UserAddressController::class, 'destroy'])-> name('address.destroy'); //deletes the specific address
    Route::get('/{user:username}/newaddress', [UserAddressController::class, 'show']) -> name('address.add'); //shows a new address adding form
    Route::post('/{user:username}/newaddress', [UserAddressController::class, 'store']) -> name('address.store'); //save the new added address

});

//Products:

Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::post('/products', [ProductsController::class, 'create'])->name('product.create');
