<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyMiddleware
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
        //Check if user logged in
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if(Auth::user()->role->role_title == 'Admin'){
            return redirect()->route('admin.dashboard');
        }
        //If not admin, redirect to company dashboard
        if(Auth::user()->role->role_title == 'Company'){
            return $next($request);
        }

        if(Auth::user()->role->role_title == 'Customer'){
            return redirect()->route('customer.dashboard');
        }
    }
}
