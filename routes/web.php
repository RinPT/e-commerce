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