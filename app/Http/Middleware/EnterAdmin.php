<?php

namespace App\Http\Middleware;

use Closure;

class EnterAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::check()) {
            if (\Auth::user()->adminGroups()->count() > 0)
                return $next($request);
        }
        return abort('403');
    }
}
