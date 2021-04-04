<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {

        return redirect()->route('admin.home');
    }
}
