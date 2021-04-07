<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\PermController as PermController;
use App\Http\Controllers\Admin\GroupController as GroupController;
use \App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\TicketController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "/admin"], function() {

    Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'store'])->name('admin.login.post');

    Route::get('/pwreset', [AdminHomeController::class, 'index'])->name('admin.pwreset');

    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.home');

    Route::get('/perms', [PermController::class, 'index'])->name('admin.perms.index');
    Route::get('/perm/create', [PermController::class, 'create'])->name('admin.perm.create');
    Route::post('/perm/create', [PermController::class, 'store'])->name('admin.perm.store');
    Route::get('/perm/{id}/update/', [PermController::class, 'edit'])->name('admin.perm.edit');
    Route::post('/perm/{id}/update/', [PermController::class, 'update'])->name('admin.perm.update');
    Route::get('/perm/{id}/delete/', [PermController::class, 'destroy'])->name('admin.perm.destroy');

    Route::get('/groups', [GroupController::class, 'index'])->name('admin.groups.index');
    Route::get('/group/create', [GroupController::class, 'create'])->name('admin.group.create');
    Route::post('/group/create', [GroupController::class, 'store'])->name('admin.group.store');
    Route::get('/group/{id}/update/', [GroupController::class, 'edit'])->name('admin.group.edit');
    Route::post('/group/{id}/update/', [GroupController::class, 'update'])->name('admin.group.update');
    Route::get('/group/{id}/delete/', [GroupController::class, 'destroy'])->name('admin.group.destroy');

    Route::get('/authors', [AuthorController::class, 'index'])->name('admin.authors');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('admin.author.create');
    Route::post('/author/create', [AuthorController::class, 'store'])->name('admin.author.store');
    Route::get('/author/{id}/update/', [AuthorController::class, 'edit'])->name('admin.author.edit');
    Route::post('/author/{id}/update/', [AuthorController::class, 'update'])->name('admin.author.update');
    Route::get('/author/{id}/delete/', [AuthorController::class, 'destroy'])->name('admin.author.destroy');

    Route::get('/stores', [AdminHomeController::class, 'index'])->name('admin.stores');
    Route::get('/store/create', [AdminHomeController::class, 'create'])->name('admin.store.create');
    Route::post('/store/create', [AdminHomeController::class, 'store'])->name('admin.store.store');
    Route::get('/store/{id}/update/', [AdminHomeController::class, 'edit'])->name('admin.store.edit');
    Route::post('/store/{id}/update/', [AdminHomeController::class, 'update'])->name('admin.store.update');
    Route::get('/store/{id}/delete/', [AdminHomeController::class, 'destroy'])->name('admin.store.delete');


    //Complain Operations :
    //Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.admin');
    Route::post('/complains/{complains}', [AdminController::class, 'update_complain']) -> name('update.complain'); //updates status of the complain
    Route::delete('/complains/{complains}', [AdminController::class, 'delete_complain'])-> name('delete.complain'); //deletes the specific complain

    //Ticket Operations :
    Route::get('/tickets/author', [TicketController::class, 'getAuthorTickets']) -> name('admin.view_author_tickets');
    Route::get('/tickets/store', [TicketController::class, 'getStoreTickets']) -> name('admin.view_store_tickets');
    Route::get('/tickets/create', [TicketController::class, 'getCreateTicket']) -> name('admin.view_create_new_ticket');

    Route::post('/tickets/{tickets}', [AdminController::class, 'update_ticket']) -> name('update.ticket'); //updates status of the ticket
    Route::delete('/tickets/{tickets}', [AdminController::class, 'delete_ticket'])-> name('delete.ticket'); //deletes the specific ticket
    Route::get('/tickets/reply/{tickets}', [AdminController::class, 'reply_ticket_display']) -> name('reply.ticket_display'); //display reply form of a specific ticket
    Route::post('/tickets/reply/{tickets}', [AdminController::class, 'reply_ticket']) -> name('ticket.reply'); //display reply form of a specific ticket
    Route::delete('/tickets/reply/{ticket_replies}', [AdminController::class, 'delete_reply'])-> name('delete.reply'); //deletes the specific ticket reply

    //Activity Log Operations :
    Route::delete('/activity_logs/{activity_logs}', [AdminController::class, 'delete_activity_log'])-> name('delete.activity_log'); //deletes the specific activity log

    //Configuration Operations :
    Route::delete('/configs/{configs}', [AdminController::class, 'delete_config'])-> name('delete.config'); //deletes the specific configuration

    Route::post('/configs/{configs}', [AdminController::class, 'update_config']) -> name('update.config'); //updates status of the ticket

    Route::get('/configs/add', [AdminController::class, 'add_config_display']) -> name('add.config_display'); //display configuration_add form of a specific ticket
    Route::post('/configs/add/done', [AdminController::class, 'add_config']) -> name('add.config'); //adds the new configuration

    //Permission Operations:
    Route::get('/permissions', [AdminController::class, 'add_permission_display']) -> name('add.permission_display'); //display permission_add form of a specific ticket
    Route::post('/perm/add/done', [AdminController::class, 'add_permission']) -> name('add.perm'); //adds the new perm
    Route::delete('/perm/{permissions}', [AdminController::class, 'delete_permission'])-> name('delete.perm'); //deletes the specific perm


    //Group Operations :
    Route::get('/user_group/add', [AdminController::class, 'add_user_group_display']) -> name('add.user_group_display'); //display user_group_add form
    Route::post('/user_group/add/done', [AdminController::class, 'add_user_group']) -> name('add.user_group'); //adds the new user_group
    Route::delete('/user_group/delete/{group}', [AdminController::class, 'delete_group'])-> name('delete.group'); //deletes the specific user_group
    Route::post('/user_group/update_permissions/{group}', [AdminController::class, 'update_group_permissions']) -> name('update.group_permissions'); //updates status of the ticket
    Route::post('/user_group/add/member', [AdminController::class, 'add_user_to_group']) -> name('add.user_to_group'); //adds the a registered user to a group
    Route::post('/user_group/remove/member', [AdminController::class, 'remove_user_from_group']) -> name('remove.user_from_group'); //removes the a registered user from a group

});
