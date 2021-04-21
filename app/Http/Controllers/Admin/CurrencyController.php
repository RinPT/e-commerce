<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index() {
        return view('admin.settings.currencies');
    }

    public function create() {
        return view('admin.settings.add_currency');
    }

    public function store() {

    }
}
