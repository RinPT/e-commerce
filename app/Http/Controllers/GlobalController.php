<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function index() {
        return $logged_author = Store::find($_SESSION['author']);
    }
}
