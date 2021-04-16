<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {

        unset($_SESSION['author']);
        unset($_SESSION['store']);

        return redirect()->route('admin.login');
    }
}
