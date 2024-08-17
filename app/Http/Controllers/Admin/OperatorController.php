<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Puskesmas;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    public function index()
    {
        $title = "Data Operator";
        $operators = User::where('role', 0)
            ->leftJoin('puskesmas', 'users.IdPuskesmas', '=', 'puskesmas.IdPuskesmas')
            ->select('users.*', 'puskesmas.Nama as NamaPuskesmas')
            ->get();
        $puskesmas = Puskesmas::all();
        return view('Admin.dtOperator', compact('operators', 'puskesmas', 'title'));
    }

    public function create(){
        $title = "Tambah Operator";
        $puskesmas = Puskesmas::all(); //load data puskesmas
        // Ambil user terakhir dengan username yang dimulai dengan 'OPT'
        $lastOperator = User::where('username', 'like', 'OPT%')->orderBy('username', 'desc')->first();
        // Ambil angka dari username terakhir
        if ($lastOperator) {
            $lastNumber = intval(substr($lastOperator->username, 3));
        } else {
            $lastNumber = 0;
        }

        // Tambah satu untuk username baru
        $newUsername = 'OPT' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return view('Admin.optCreate', compact('newUsername', 'puskesmas', 'title'));
    }


    public function store(Request $request){
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|size:7',
            'Nama' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'NoTelpon' => 'required|string|max:15',
            'IdPuskesmas' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 0; //operator;
        $data['Status'] = 1; //status;

        User::create($data);

        return redirect()->route('admin.operator.index')->with('notifikasi', 'Operator berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $operator = User::findOrFail($id);

        $data = $request->validate([
            'username' => 'required|string|max:255',
            'Nama' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'NoTelpon' => 'required|string|max:15',
            'IdPuskesmas' => 'required',
        ]);

        $operator->update($data);

        return redirect()->route('admin.operator.index')->with('notifikasi', 'Operator berhasil diperbarui.');
    }

    public function updateStatus($id)
    {
        $operator = User::findOrFail($id);
        $operator->Status = !$operator->Status;
        $operator->save();

        return redirect()->route('admin.operator.index')->with('notifikasi', 'Status operator berhasil diubah.');
    }

    public function resetPassword(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'newPassword' => 'required|string|size:7',
            'confirmPassword' => 'required|string|min:7',
        ]);

        // Cek apakah newPassword dan confirmPassword sama
        if ($request->newPassword !== $request->confirmPassword) {
            return redirect()->back()
                ->withErrors(['confirmPassword' => 'Password konfirmasi tidak sesuai dengan password baru. Coba Lagi!'])
                ->withInput();
        }

        // Temukan operator berdasarkan IdUser
        $operator = User::where('IdUser', $id)->firstOrFail();

        // Update password operator
        $operator->password = Hash::make($request->newPassword);
        $operator->save();

        return redirect()->route('admin.operator.index')->with('notifikasi', 'Password operator berhasil direset.');
    }
}