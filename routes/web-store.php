<?php

use App\Http\Controllers\Store\DiscountController;
use App\Http\Controllers\Store\ProductDiscountController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/store'], function() {

    /*
     * Store Discount
     */
    Route::get('/discount/list', [DiscountController::class, 'index'])->name('store.discount');
    Route::get('/discount/create', [DiscountController::class, 'create'])->name('store.discount.create');
    Route::post('/discount/create/done', [DiscountController::class, 'store'])->name('store.discount.store');
    Route::post('/discount/{id}/update', [DiscountController::class, 'update'])->name('store.discount.update');
    Route::delete('/discount/{id}/delete', [DiscountController::class, 'destroy'])->name('store.discount.delete');

    /*
     * Product Discount
     */
    Route::get('/product/discount/list', [ProductDiscountController::class, 'index'])->name('store.product.discount');
    Route::get('/prodcut/discount/create', [ProductDiscountController::class,'create'])->name('store.product.discount.create');
    Route::post('product/discount/create/done', [ProductDiscountController::class, 'store'])->name('store.product.discount.store');
    Route::post('product/discount/{id}/update', [ProductDiscountController::class, 'update'])->name('store.product.discount.update');
    Route::delete('/discount/{id}/delete', [ProductDiscountController::class, 'destroy'])->name('store.product.discount.delete');
});
