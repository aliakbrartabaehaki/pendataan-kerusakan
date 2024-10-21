<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                return redirect('/admin/dashboard');
            } elseif (Auth::user()->role == 'Karyawan') {
                return redirect('/karyawan/dashboard');
            }
        }
    
        return $next($request);
    }
    
}
