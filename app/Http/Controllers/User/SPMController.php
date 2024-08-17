<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CapaianSPM;
use App\Models\CapaianTracker;
use App\Models\Puskesmas;
use App\Models\TargetSPM;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SPMController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data SPM";
        $puskesmas = Puskesmas::find(session('Puskesmas'));
        $titleHal = "CAPAIAN SPM " . $puskesmas->Nama;

        $tahun = $request->get('tahun', date('Y'));
        $target = TargetSPM::where('IdPuskesmas', $puskesmas->IdPuskesmas)
            ->where('Tahun', $tahun)
            ->join('indikator', 'targetlayanan.IdIndikator', '=', 'indikator.IdIndikator')
            ->select('targetlayanan.*', 'indikator.name as NamaIndex')
            ->orderby('targetlayanan.IdIndikator')
            ->get();

        return view('User.dtCapaian', compact('target', 'puskesmas', 'titleHal', 'title'));
    }

    public function create(Request $request)
    {
        $title = "INPUT CAPAIAN";
        $puskesmas = Puskesmas::find(session('Puskesmas'));
        $tahun = $request->get('tahun', date('Y'));
        $bulan = $request->get('bulan', date('n'));

        // Mengambil data target berdasarkan puskesmas dan tahun
        $target = TargetSPM::where('IdPuskesmas', $puskesmas->IdPuskesmas)
            ->where('Tahun', $tahun)
            ->join('indikator', 'targetlayanan.IdIndikator', '=', 'indikator.IdIndikator')
            ->select('targetlayanan.*', 'indikator.name as NamaIndex')
            ->orderby('targetlayanan.IdIndikator')
            ->get();

        // Mengambil data capaian berdasarkan IdLayanan, tahun, dan bulan
        $capaian = CapaianSPM::where('Tahun', $tahun)
            ->where('Bulan', $bulan)
            ->whereIn('IdLayanan', $target->pluck('IdLayanan'))
            ->get();

        // Menentukan bulan-bulan yang belum terisi
        $filledMonths = CapaianSPM::where('Tahun', $tahun)
            ->whereIn('IdLayanan', $target->pluck('IdLayanan'))
            ->pluck('Bulan')->unique()->toArray();

        return view('user/capaianCreate', compact('target', 'capaian', 'puskesmas', 'title', 'tahun', 'bulan', 'filledMonths'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'tahun' => 'required',
            'bulan' => 'required',
            'capaian.*.IdLayanan' => 'required',
            'capaian.*.CapaianBLN' => 'required|integer',
            'capaian.*.P_Anggaran' => 'required|numeric',
        ]);

        $dataCapaian = $request->input('capaian');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        foreach ($dataCapaian as $index => $data) {
            $idLayanan = $data['IdLayanan'];
            $capaianBLN = $data['CapaianBLN'];
            $pAnggaran = $data['P_Anggaran'];

            $idCapaian = $idLayanan . str_pad($bulan, 2, '0', STR_PAD_LEFT);

            // Simpan ke tabel capaian
            CapaianSPM::updateOrCreate(
                ['IdCapaian' => $idCapaian],
                [
                    'IdLayanan' => $idLayanan,
                    'CapaianBLN' => $capaianBLN,
                    'P_Anggaran' => $pAnggaran,
                    'Bulan' => $bulan,
                    'Tahun' => $tahun,
                ]
            );

            CapaianTracker::create([
                'IdCapaian' => $idCapaian,
                'IdUser' => session('user_id'),
                'Access' => Carbon::now(),
            ]);
        }

        return redirect()->route('user.capaian.index')
            ->with('notifikasi', 'Capaian berhasil disimpan.');
    }
}