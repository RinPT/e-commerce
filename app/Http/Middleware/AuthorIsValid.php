<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthorIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $route = Route::currentRouteName();
        if($route == 'admin.login' || $route == 'admin.login.post'){
            if(isset($_SESSION['author'])){
                return redirect()->route('admin.home');
            }
        }else{
            if(!isset($_SESSION['author'])){
                return redirect()->route('admin.login');
            }
        }
        return $next($request);
    }
}
