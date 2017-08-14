<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
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
        if (Auth::check()) {
            $right = User::find(Auth::id())->group()->orderBy('right', 'desc')->first()->right;
            if ($right > 99)
                return $next($request);
        }
        return redirect('/login');
    }
}
