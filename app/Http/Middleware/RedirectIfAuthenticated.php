<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($guard === 'user' && Auth::guard($guard)->check()) {
                return redirect()->route('user.home');
            } else if ($guard === 'admin' && Auth::guard($guard)->check()) {
                return redirect()->route('admin.home');
            } else if ($guard === 'brgy_official' && Auth::guard($guard)->check()) {
                return redirect()->route('brgy_official.home');
            } else if ($guard === 'lgu' && Auth::guard($guard)->check()) {
                return redirect()->route('lgu.home');
            }
        }

        return $next($request);
    }
}
