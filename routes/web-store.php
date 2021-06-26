<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\OrderController;
use App\Http\Controllers\Store\ProductController;
use App\Http\Controllers\Store\DiscountController;
use App\Http\Controllers\Store\HomeController;
use App\Http\Controllers\Store\ProductDiscountController;
use App\Http\Controllers\Store\TicketController;

Route::group(['prefix' => '/store'], function() {
    /*
     * Dashboard
     */
    Route::get('/home', [HomeController::class, 'index'])->name('store.home');

    /*
     * Store Discount
     */
    Route::get('/discount/list', [DiscountController::class, 'index'])->name('store.discount');
    Route::get('/discount/create', [DiscountController::class, 'create'])->name('store.discount.create');
    Route::post('/discount/create/done', [DiscountController::class, 'store'])->name('store.discount.store');
    Route::post('/discount/{id}/update', [DiscountController::class, 'update'])->name('store.discount.update');
    Route::delete('/store/discount/{id}/delete', [DiscountController::class, 'destroy'])->name('store.discount.delete');

    /*
     * Product Discount
     */
    Route::get('/product/discount/list', [ProductDiscountController::class, 'index'])->name('store.product.discount');
    Route::get('/prodcut/discount/create', [ProductDiscountController::class,'create'])->name('store.product.discount.create');
    Route::post('product/discount/create/done', [ProductDiscountController::class, 'store'])->name('store.product.discount.store');
    Route::post('product/discount/{id}/update', [ProductDiscountController::class, 'update'])->name('store.product.discount.update');
    Route::delete('/discount/{id}/delete', [ProductDiscountController::class, 'destroy'])->name('store.product.discount.delete');


    /*
     * Product
     */
    Route::get('/product/list', [ProductController::class, 'index'])->name('store.product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('store.product.create');
    Route::post('/product/create/done', [ProductController::class, 'store'])->name('store.product.store');
    Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('store.product.update');
    Route::delete('/product/{id}/delete', [ProductController::class, 'destroy'])->name('store.product.delete');

    /*
     * Orders
     */
    Route::get('/order', [OrderController::class, 'index'])->name('store.orders');
    Route::post('/order/{id}/update/', [OrderController::class, 'update'])->name('store.orders.update');
    Route::get('/order/{id}/delete/', [OrderController::class, 'destroy'])->name('store.orders.destroy');
    Route::get('/order/pending', [OrderController::class, 'show_pending'])->name('store.orders.show_pending');
    Route::get('/order/canceled', [OrderController::class, 'show_canceled'])->name('store.orders.show_canceled');
    Route::get('/order/cancel_request', [OrderController::class, 'show_cancel_request'])->name('store.orders.show_cancel_request');

    /*
     * Tickets
     */
    Route::get('/tickets', [TicketController::class, 'index'])->name('store.tickets');
    Route::get('tickets/{id}/view', [TicketController::class, 'view_ticket'])->name('store.tickets.view');
    Route::post('/ticket/answer/{tid}', [TicketController::class, 'answer_ticket'])->name('store.ticket.answer');
});
