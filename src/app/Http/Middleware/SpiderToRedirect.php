<?php

namespace Ken\SpiderAdmin\App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SpiderToRedirect
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
        if (Auth::guard($guard)->check() && auth()->user()->getProfile->roles != 'admin') {
            return redirect(config('spider.route_prefix').'/dashboard');
        }

        return $next($request);
    }
}
