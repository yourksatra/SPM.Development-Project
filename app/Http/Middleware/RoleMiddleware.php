<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!session('user_id') || session('user_type') !== (int) $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}