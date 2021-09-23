<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->routeIs('admin.*')){
                return redirect()->route('admin.login');
            }
            if($request->routeIs('user.*')){
                return redirect()->route('user.login');
            }
            if($request->routeIs('brgy_official.*')){
                return redirect()->route('user.login');
            }
            if($request->routeIs('local_unit.*')){
                return redirect()->route('user.login');
            }
        }
    }
}
