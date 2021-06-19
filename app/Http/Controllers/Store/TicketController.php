<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private $logged_author;

    public function __construct() {
        $this->logged_author = app('App\Http\Controllers\GlobalController')->index();
    }

    public function index() {
        return view('store.tickets.index');
    }
}
