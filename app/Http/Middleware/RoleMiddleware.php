<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param Role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }



        if (! $request->user()->hasAnyRole($roles)) {
            abort(404);
        }

        return $next($request);
    }
}
