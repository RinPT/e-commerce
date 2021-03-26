<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Home Page:

Route::get('/', [HomeController::class, 'index'])->name('home');

//Authorization :

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::group(['prefix' => "/userprofile"], function() {
    //User :
    Route::get('/{user:username}', [UserController::class, 'index']) -> name('user.profile'); //display userprofile
    Route::delete('/{user:username}', [UserController::class, 'destroy']) -> name('user.destroy'); //delete user
    Route::post('/{user:username}/update', [UserController::class, 'update_info'])-> name('user.update'); //updates user info
    Route::post('/{user:username}/passwordchange', [UserController::class, 'update_password'])-> name('user.password'); //updates user password

    //User Address Operations :
    Route::get('/{user}/address', [UserAddressController::class, 'index']) -> name('user.address'); //display all saved addresses of this user
    Route::get('/{user:username}/address/{user_address}', [UserAddressController::class, 'display']) -> name('address.display'); //display specific address update form
    Route::post('/{user:username}/address/{user_address}', [UserAddressController::class, 'update'])-> name('address.update'); //updates specific address
    Route::delete('/{user:username}/address/{user_address}', [UserAddressController::class, 'destroy'])-> name('address.destroy'); //deletes the specific address
    Route::get('/{user:username}/newaddress', [UserAddressController::class, 'show']) -> name('address.add'); //shows a new address adding form
    Route::post('/{user:username}/newaddress', [UserAddressController::class, 'store']) -> name('address.store'); //save the new added address
});
