<?php

use App\Http\Controllers\Store\DiscountController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/store'], function() {

    /*
     * Discount
     */
    Route::get('/discount/list', [DiscountController::class, 'index'])->name('store.discount');
    Route::get('/discount/create', [DiscountController::class, 'create'])->name('store.discount.create');
    Route::post('/discount/create/done', [DiscountController::class, 'store'])->name('store.discount.store');
    Route::post('/discount/{id}/update', [DiscountController::class, 'update'])->name('store.discount.update');
    Route::delete('/discount/{id}/delete', [DiscountController::class, 'destroy'])->name('store.discount.delete');
});
