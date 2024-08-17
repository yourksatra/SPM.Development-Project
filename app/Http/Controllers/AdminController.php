<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data['title'] = "Dashboard Admin";
        return view('admin/dashboard', $data);
    }
    public function loginfo()
    {
        $data['title'] = "Informasi Admin";
        return view('admin/dtAdmin', $data);
    }
    // Proses untuk mengubah username
    public function username(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
        ]);

        if (session('user_type') == 1) {
            User::where('IdUser', session('user_id'))->update($data);
            return redirect()->back()->with('notifikasi', 'Username berhasil diubah. Silakan login kembali dengan username baru.');
        }

        return redirect()->back()->withErrors(['username' => 'Anda tidak memiliki otoritas untuk mengubah username'])->withInput();
    }

    // Proses untuk mereset password
    public function password(Request $request)
    {
        $request->validate([
            'newPassword' => 'required|string|min:8|confirmed',
        ]);

        $user = User::Where('IdUser', session('user_id'))->first();

        if ($user->role == 1) {
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return redirect()->back()->with('notifikasi', 'Password berhasil diubah. Silakan login kembali dengan password baru.');
        }

        return redirect()->back()->withErrors(['newPassword' => 'Anda tidak memiliki otoritas untuk mereset password'])->withInput();
    }

    public function dtLaporan()
    {
        $data['title'] = "Test Halaman";
        return view('blank', $data);
    }
}