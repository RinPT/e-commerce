<?php

use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\Admin\CargoController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TicketController;
use \App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\StoreDiscountController;
use \App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\CategoryDiscountController;
use App\Http\Controllers\Admin\PermController as PermController;
use App\Http\Controllers\Admin\UserController as UserController;
use App\Http\Controllers\Admin\GroupController as GroupController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProductsController as ProductsController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\LogoutController as AdminLogoutController;

Route::group(['prefix' => "/author", 'middleware' => ['authorisvalid']], function() {

    Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'store'])->name('admin.login.post');

    Route::get('/logout', [AdminLogoutController::class, 'store'])->name('admin.logout');

    Route::get('/pwreset', [AdminHomeController::class, 'index'])->name('admin.pwreset');

    /**
     * Admin Main Page
     */
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.home');

    /**
     * General settings
     */
    Route::get('/general-settings', [GeneralSettingController::class, 'edit'])->name('admin.general-setting.edit');
    Route::post('/general-settings', [GeneralSettingController::class, 'update'])->name('admin.general-setting.update');

    /**
     * Currencies
     */
    Route::get('/currencies', [CurrencyController::class, 'index'])->name('admin.currency');
    Route::get('/currency/create', [CurrencyController::class, 'create'])->name('admin.currency.create');
    Route::post('/currency/create', [CurrencyController::class, 'store']);
    Route::post('/currency/{id}/update', [CurrencyController::class, 'update'])->name('admin.currency.update');
    Route::delete('/currency/{id}/delete', [CurrencyController::class, 'destroy'])->name('admin.currency.delete');

    /**
     * Orders
     */
    Route::get('/order', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('/order/pending', [OrderController::class, 'show_pending'])->name('admin.order.show_pending');
    Route::get('/order/canceled', [OrderController::class, 'show_canceled'])->name('admin.order.show_canceled');
    Route::get('/order/cancel_requests', [OrderController::class, 'cancel_request'])->name('admin.order.cancel_request');
    Route::post('/order/{id}/update/', [OrderController::class, 'update'])->name('admin.order.update');
    Route::get('/order/{id}/delete/', [OrderController::class, 'destroy'])->name('admin.order.destroy');


    /**
     * Categories
     */
    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/category/create', [CategoriesController::class, 'create'])->name('admin.category.create');
    Route::post('/category/create', [CategoriesController::class, 'store'])->name('admin.category.store');
    Route::get('/category/{category_id}/update', [CategoriesController::class, 'edit'])->name('admin.category.edit');
    Route::patch('/category/{category_id}/update', [CategoriesController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/{category_id}/delete', [CategoriesController::class, 'destroy'])->name('admin.category.destroy');

    /**
     * Products
     */
    Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('/product/create', [ProductsController::class, 'create'])->name('admin.product.create');
    Route::post('/product/create', [ProductsController::class, 'store'])->name('admin.product.store');
    Route::get('/products/{product_id}/update', [ProductsController::class, 'edit'])->name('admin.product.edit');
    Route::post('/products/{product_id}/update', [ProductsController::class, 'update'])->name('admin.product.update');
    Route::delete('/products/{product_id}/delete', [ProductsController::class, 'destroy'])->name('admin.product.destroy');
    Route::get('/products/image/{id}/delete', [ProductsController::class, 'image_delete'])->name('admin.product.image.delete');

    /**
     * Discounts
     */
    Route::get('/product/discount', [ProductDiscountController::class, 'index'])->name('product.discount');
    Route::get('/product/discount/create', [ProductDiscountController::class, 'create'])->name('product.discount.create');
    Route::post('/product/discount/create', [ProductDiscountController::class, 'store']);
    Route::delete('/product/discount/{id}/delete', [ProductDiscountController::class, 'destroy'])->name('product.discount.destroy');
    Route::post('/product/discount/{id}/update', [ProductDiscountController::class, 'update'])->name('product.discount.update');

    Route::get('/store/discount', [StoreDiscountController::class, 'index'])->name('store.discount');
    Route::get('/store/discount/create', [StoreDiscountController::class, 'create'])->name('store.discount.create');
    Route::post('/store/discount/create', [StoreDiscountController::class, 'store']);
    Route::delete('/store/discount/{id}/delete', [StoreDiscountController::class, 'destroy'])->name('store.discount.destroy');
    Route::post('/store/discount/{id}/update', [StoreDiscountController::class, 'update'])->name('store.discount.update');

    Route::get('/category/discount', [CategoryDiscountController::class, 'index'])->name('category.discount');
    Route::get('/category/discount/create', [CategoryDiscountController::class, 'create'])->name('category.discount.create');
    Route::post('/category/discount/create', [CategoryDiscountController::class, 'store']);
    Route::delete('/category/discount/{id}/delete', [CategoryDiscountController::class, 'destroy'])->name('category.discount.destroy');
    Route::post('/category/discount/{id}/update', [CategoryDiscountController::class, 'update'])->name('category.discount.update');

    /**
     * Cargo
     */
    Route::get('/cargo', [CargoController::class, 'index'])->name('admin.cargo');
    Route::get('/cargo/create', [CargoController::class, 'create'])->name('admin.cargo.create');
    Route::post('/cargo/create', [CargoController::class, 'store'])->name('admin.cargo.store');
    Route::post('/cargo/{id}/update/', [CargoController::class, 'update'])->name('admin.cargo.update');
    Route::get('/cargo/{id}/delete/', [CargoController::class, 'destroy'])->name('admin.cargo.destroy');

    /**
     * Advertisement
     */
    Route::get('/advertisement', [AdvertisementController::class, 'index'])->name('admin.advertisement.index');
    Route::get('/advertisement/create', [AdvertisementController::class, 'create'])->name('admin.advertisement.create');
    Route::post('/advertisement/create/done', [AdvertisementController::class, 'store'])->name('admin.advertisement.store');
    Route::post('/advertisement/update/{id}', [AdvertisementController::class, 'update'])->name('admin.advertisement.update');
    Route::get('/advertisement/delete/{id}', [AdvertisementController::class, 'destroy'])->name('admin.advertisement.delete');

    /**
     * Permission Management
     */
    Route::get('/perms', [PermController::class, 'index'])->name('admin.perms.index');
    Route::get('/perm/create', [PermController::class, 'create'])->name('admin.perm.create');
    Route::post('/perm/create', [PermController::class, 'store'])->name('admin.perm.store');
    Route::get('/perm/{id}/update/', [PermController::class, 'edit'])->name('admin.perm.edit');
    Route::post('/perm/{id}/update/', [PermController::class, 'update'])->name('admin.perm.update');
    Route::get('/perm/{id}/delete/', [PermController::class, 'destroy'])->name('admin.perm.destroy');

    /**
     * User Group Management
     */
    Route::get('/groups', [GroupController::class, 'index'])->name('admin.groups.index');
    Route::get('/group/create', [GroupController::class, 'create'])->name('admin.group.create');
    Route::post('/group/create', [GroupController::class, 'store'])->name('admin.group.store');
    Route::get('/group/{id}/update/', [GroupController::class, 'edit'])->name('admin.group.edit');
    Route::post('/group/{id}/update/', [GroupController::class, 'update'])->name('admin.group.update');
    Route::get('/group/{id}/delete/', [GroupController::class, 'destroy'])->name('admin.group.destroy');

    /**
     * Author Management
     */
    Route::get('/authors', [AuthorController::class, 'index'])->name('admin.authors');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('admin.author.create');
    Route::post('/author/create', [AuthorController::class, 'store'])->name('admin.author.store');
    Route::get('/author/{id}/update/', [AuthorController::class, 'edit'])->name('admin.author.edit');
    Route::post('/author/{id}/update/', [AuthorController::class, 'update'])->name('admin.author.update');
    Route::get('/author/{id}/delete/', [AuthorController::class, 'destroy'])->name('admin.author.destroy');

    /**
     * Store Management
     */
    Route::get('/stores', [StoreController::class, 'index'])->name('admin.stores');
    Route::get('/store/create', [StoreController::class, 'create'])->name('admin.store.create');
    Route::post('/store/create', [StoreController::class, 'store'])->name('admin.store.store');
    Route::get('/store/{id}/update/', [StoreController::class, 'edit'])->name('admin.store.edit');
    Route::post('/store/{id}/update/', [StoreController::class, 'update'])->name('admin.store.update');
    Route::get('/store/{id}/delete/', [StoreController::class, 'destroy'])->name('admin.store.destroy');


    Route::get('/store/requests', [StoreController::class, 'requests_index'])->name('admin.store.requests');
    Route::get('/store/request/{id}/accept', [StoreController::class, 'accept_request'])->name('admin.store.accept');
    Route::get('/store/requests/{id}/delete/', [StoreController::class, 'destroy_request'])->name('admin.store.destroy_request');
    Route::get('/store/requests/{id}/add', [StoreController::class, 'add_request'])->name('admin.store.add_request');
    Route::post('/store/request/{id}/update', [StoreController::class, 'update_request'])->name('admin.store.update_request');
    Route::post('/store/request/{id}/reject', [StoreController::class, 'reject_request'])->name('admin.store.reject_request');
    Route::post('/store/application', [StoreController::class, 'application'])->name('admin.store.application');

    /**
     * User Management
     */
    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index'); //show all users
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create'); //create a new user
    Route::post('/user/create/done', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');

    /**
     * Ticket Management
     */
    Route::post('/ticket/create', [TicketController::class, 'create_ticket'])->name('admin.ticket.create');

    Route::get('/tickets/department/create', [TicketController::class, 'create'])->name('admin.ticket.department.create');
    Route::post('/tickets/department/done', [TicketController::class, 'store'])->name('admin.ticket.department.store');
    Route::post('/tickets/department/{id}/update', [TicketController::class, 'update'])->name('admin.ticket.department.update');
    Route::delete('/tickets/department/{id}/delete', [TicketController::class, 'department_destroy'])->name('admin.ticket.department.delete');

    Route::get('/tickets/author', [TicketController::class, 'getAuthorTickets'])->name('admin.view_author_tickets');
    Route::get('/tickets/author/{tid}/view', [TicketController::class, 'authorTicket'])->name('admin.view_author_tickets.view');
    Route::post('/tickets/answer/{tid}', [TicketController::class, 'answer_ticket'])->name('admin.ticket.answer');

    Route::get('/tickets/store', [TicketController::class, 'getStoreTickets']) -> name('admin.view_store_tickets');
    Route::get('/tickets/store/{id}/view', [TicketController::class, 'storeTicket']) -> name('admin.view_store_tickets.view');

    Route::get('/tickets/user', [TicketController::class, 'getUserTickets']) -> name('admin.view_user_tickets');
    Route::get('/tickets/user/{id}/view', [TicketController::class, 'userTicket']) -> name('admin.view_user_tickets.view');

    Route::delete('/tickets/{id}/delete', [TicketController::class, 'ticket_destroy'])->name('admin.ticket.delete');

    /**
     * Slider Management
     */
    Route::get('/slider/edit', [SliderController::class, 'index'])->name('slider');
    Route::post('/slider/edit/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider/create/done', [SliderController::class, 'store'])->name('slider.store');
    Route::delete('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');

    /**
     * Coupons
     */
    Route::get('/coupons/list', [CouponController::class, 'index'])->name('admin.coupons');
    Route::get('/coupons/create', [CouponController::class, 'create'])->name('admin.coupons.create');
    Route::post('/coupons/store', [CouponController::class, 'store'])->name('admin.coupons.store');
    Route::post('/coupon/{id}/update', [CouponController::class, 'update'])->name('admin.coupons.update');
    Route::delete('/coupon/{id}/delete', [CouponController::class, 'destroy'])->name('admin.coupons.delete');

        /**
     * Comments
     */
    Route::get('/comments', [CommentController::class, 'index'])->name('admin.comments');
    Route::get('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('admin.comments.delete');
    Route::post('/comments/update/{id}', [CommentController::class, 'update'])->name('admin.comments.update');
});

