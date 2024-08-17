<?php

namespace App\Http\Middleware;

use App\Models\Logacces;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSessionExpiry
{
    public function handle(Request $request, Closure $next)
    {
        $log_id = session('log_id');
        $log = Logacces::find($log_id);

        if ($log && Carbon::now()->greaterThanOrEqualTo($log->Expires_time)) {
            $log->LastAcces = $log->Expires_time;
            $log->save();
            Auth::logout();
            session()->flush();
            return redirect()->route('login')->withErrors(['message' => 'Sesi Anda Kadaluwarsa <br> Silahkan Login Kembali.']);
        }

        return $next($request);
    }
}