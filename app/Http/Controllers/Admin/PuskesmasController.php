<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Puskesmas;
use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    public function index()
    {
        $data['title'] = "Daftar Puskesmas";
        $data['row'] = Puskesmas::all();
        $data['kecamatan'] = $this->getKecamatanList();
        return view('admin/dtPuskesmas', $data);
    }

    public function storePuskesmas(Request $request)
    {
        $validated = $request->validate([
            'Nama' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'Kecamatan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        $idPuskesmas = Puskesmas::generateUniqueId($validated['Nama']);
        $validated['IdPuskesmas'] = $idPuskesmas;

        Puskesmas::create($validated);
        return redirect()->route('admin.puskesmas.index')->with('notifikasi', 'Data Puskesmas berhasil ditambahkan.');
    }

    public function editPuskesmas($id)
    {
        $data['title'] = "Edit Puskesmas";
        $data['puskesmas'] = Puskesmas::findOrFail($id);
        $data['kecamatan'] = $this->getKecamatanList();
        return view('admin/editPuskesmas', $data);
    }

    public function updatePuskesmas(Request $request, $id)
    {
        $validated = $request->validate([
            'Nama' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'Kecamatan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Puskesmas::where('IdPuskesmas', $id)->update($validated);

        return redirect()->route('admin.puskesmas.index')->with('notifikasi', 'Data Puskesmas berhasil diperbarui.');
    }

    public function deletePuskesmas($id)
    {
        Puskesmas::where('IdPuskesmas', $id)->delete();
        return redirect()->route('admin.puskesmas.index')->with('notifikasi', 'Data Puskesmas berhasil dihapus.');
    }

    private function getKecamatanList()
    {
        return [
            "Alas", "Alas Barat", "Batu Lanteh", "Buer", "Empang",
            "Labangka", "Labuhan Badas", "Lantung", "Lape",
            "Lenangguar", "Lopok", "Lunyuk", "Maronge", "Moyo Hilir",
            "Moyo Hulu", "Moyo Utara", "Orong Telu", "Plampang", "Rhee",
            "Ropang", "Sumbawa", "Tarano", "Unter Iwes", "Utan"
        ];
    }
}