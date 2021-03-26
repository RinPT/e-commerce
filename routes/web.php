<?php

use Illuminate\Support\Facades\Route;

//Home Page:
Route::get('/','App\Http\Controllers\HomeController@index')-> name('home');

//Authorization :

Route::post('/logout','App\Http\Controllers\Auth\LogoutController@store')-> name('logout');

Route::get('/login','App\Http\Controllers\Auth\LoginController@index') -> name('login') -> middleware('guest');;
Route::post('/login','App\Http\Controllers\Auth\LoginController@store');

Route::get('/register','App\Http\Controllers\Auth\RegisterController@index') -> name('register') -> middleware('guest');
Route::post('/register','App\Http\Controllers\Auth\RegisterController@store');

//User :

Route::get('/userprofile/{user}','App\Http\Controllers\UserController@index') -> name('user.profile'); //display userprofile

Route::delete('userprofile/{user}','App\Http\Controllers\UserController@destroy') -> name('user.destroy'); //delete user
Route::post('/userprofile/{user}/update','App\Http\Controllers\UserController@update_info')-> name('user.update'); //updates user info

Route::post('/userprofile/{user}/passwordchange','App\Http\Controllers\UserController@update_password')-> name('user.password'); //updates user password

//User Address Operations :

Route::get('/userprofile/{user}/address','App\Http\Controllers\UserAddressController@index') -> name('user.address'); //display all saved addresses of this user

Route::get('/userprofile/{user}/address/{user_address}','App\Http\Controllers\UserAddressController@display') -> name('address.display'); //display specific address update form

Route::post('/userprofile/{user}/address/{user_address}','App\Http\Controllers\UserAddressController@update')-> name('address.update'); //updates specific address

Route::delete('/userprofile/{user}/address/{user_address}','App\Http\Controllers\UserAddressController@destroy')-> name('address.destroy'); //deletes the specific address

Route::get('/userprofile/{user}/newaddress','App\Http\Controllers\UserAddressController@show') -> name('address.add'); //shows a new address adding form

Route::post('/userprofile/{user}/newaddress','App\Http\Controllers\UserAddressController@store') -> name('address.store'); //save the new added address



