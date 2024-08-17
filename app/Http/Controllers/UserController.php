<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use App\Models\TargetSPM;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = "Dashboard Operator";
        $operator = User::find(session('user_id'));
        $puskesmas = Puskesmas::find(session('Puskesmas'));
        $titleHal = "CAPAIAN SPM " . $puskesmas->Nama;

        $tahun = date('Y');
        $target = TargetSPM::where('IdPuskesmas', $puskesmas->IdPuskesmas)
            ->where('Tahun', $tahun)
            ->join('indikator', 'targetlayanan.IdIndikator', '=', 'indikator.IdIndikator')
            ->select('targetlayanan.*', 'indikator.name as NamaIndex')
            ->orderby('targetlayanan.IdIndikator')
            ->paginate(6);
        return view('user/dashboard', compact('title', 'operator', 'target', 'puskesmas', 'titleHal', 'tahun'));
    }

    public function panduan()
    {
        $data['title'] = "Panduan Input Capaian SPM";
        return view('user/panduan', $data);
    }
}