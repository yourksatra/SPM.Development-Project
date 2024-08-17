<?php

namespace App\Http\Controllers;

use App\Models\Logacces;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('logPage');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            session(['user_id' => $user->IdUser, 'username' => $user->username, 'user_type' => $user->role]);
            
            // Log acces Record
            $log = new Logacces();
            $log->IdUser = $user->IdUser;
            $log->TimeAcces = Carbon::now();
            $log->Expires_time = Carbon::now()->addMinutes(60);
            $log->save();

            session(['log_id' => $log->log_id]);
            // Log::info('Log access record created', ['log' => $log]);

            if ($user->role == 0) {
                if($user->Status == 1){
                    session(['Puskesmas'=> $user->IdPuskesmas]);
                    return redirect()->route('user.dashboard')->with('notifikasi', 'Login Berhasil');
                }
            } elseif ($user->role == 1) {
                if($user->Status == 1){
                    return redirect()->route('admin.dashboard')->with('notifikasi', 'Login Berhasil');
                }
            }
            return redirect()->back()->withErrors(['Status' => 'User Tidak Aktif, Silahkan Hubungi Admin']);
        } else {
            return redirect()->back()->withErrors(['username' => 'Username dan Password Invalid'])->withInput();
        }
    }

    public function logout()
    {
        $log_id = session('log_id');
        $log = Logacces::find($log_id);
        $log->LastAcces = Carbon::now();
        $log->save();

        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with('notifikasi', 'Logout Berhasil');;
    }
}