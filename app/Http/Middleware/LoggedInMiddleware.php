<?php

namespace App\Http\Middleware;

use Closure;

class LoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('user'))
            return redirect()->route('no_access');
        return $next($request);
    }
}
