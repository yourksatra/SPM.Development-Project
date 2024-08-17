<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!session('user_id')){
            return redirect()->route('login')->withErrors(['message' => 'Autentikasi Gagal, Silahkan Login.']);
        }
        return $next($request);
    }
}