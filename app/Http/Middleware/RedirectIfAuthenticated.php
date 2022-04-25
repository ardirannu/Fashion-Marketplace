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
        // if guard is pelanggan, redirect authenticated user to pelanggan url
        // if guard is web or default, redirect authenticated user to home url
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('dashboard.index');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home.keranjang');
                }
                break;
        }
        return $next($request);
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }
    }
}
