<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndikatorSPM;
use App\Models\Puskesmas;
use App\Models\TargetSPM;
use Illuminate\Http\Request;

class DataSPMController extends Controller
{
    public function index(Request $request)
    {
        $title = "Indikator & Target SPM-BK";
        $row = IndikatorSPM::all();
        $tahun = $request->get('tahun', date('Y'));
        $targetLayanan = TargetSPM::where('Tahun', $tahun)
        ->join('puskesmas', 'targetlayanan.IdPuskesmas', '=', 'puskesmas.IdPuskesmas')
        ->select('targetlayanan.IdPuskesmas', 'puskesmas.Nama as NamaPuskesmas')
        ->groupBy('targetlayanan.IdPuskesmas')
        ->get();
        
        return view('admin/indexSPM', compact('title', 'row', 'targetLayanan', 'tahun'));
    }

    public function inputIndikator(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'Detail' => 'nullable|string|max:255',
        ]);

        IndikatorSPM::create($validated);
        return redirect()->route('admin.dataSPM')->with('notifikasi', 'Berhasil Menambahkan Indikator.');
    }
    
    public function editIndikator(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'Detail' => 'nullable|string|max:255',
        ]);

        IndikatorSPM::where('IdIndikator', $id)->update($validated);

        return redirect()->route('admin.dataSPM')->with('notifikasi', 'Indikator berhasil diperbarui.');
    }

    public function deleteIndikator($id)
    {
        IndikatorSPM::where('IdIndikator', $id)->delete();
        return redirect()->route('admin.dataSPM')->with('notifikasi', 'Data Indikator berhasil dihapus.');
    }

    // Target Layanan
    public function createTarget()
    {
        $title = "Input Target SPM-BK";
        $puskesmasList = Puskesmas::all();
        $indikatorList = IndikatorSPM::all();
        return view('admin/targetCreate', compact('puskesmasList', 'indikatorList', 'title'));
    }

    public function storeTarget(Request $request)
    {
        $data = $request->all();
        $puskesmasId = $request->input('puskesmas');
        $tahun = $request->input('tahun');
        
        foreach ($data['targets'] as $indikatorId => $targets) {
            // Layanan Dasar
            $idLayananDasar = $indikatorId . 'A' . $puskesmasId . $tahun;
            $targetLayananDasar = new TargetSPM([
                'IdLayanan' => $idLayananDasar,
                'IdIndikator' => $indikatorId,
                'KatLayanan' => 'A',
                'Detail' => NULL,
                'JmlhTargetTHN' => $targets['layanan_dasar']['target'],
                'Anggaran' => $targets['layanan_dasar']['anggaran'],
                'Tahun' => $request->input('tahun'),
                'IdPuskesmas' => $request->input('puskesmas')
            ]);
            $targetLayananDasar->save();

            // Pencapaian Mutu Minimal
            $idPencapaianMutu = $indikatorId . 'B' . $puskesmasId . $tahun;
            $targetPencapaianMutu = new TargetSPM([
                'IdLayanan' => $idPencapaianMutu,
                'IdIndikator' => $indikatorId,
                'KatLayanan' => 'B',
                'Detail' => NULL,
                'JmlhTargetTHN' => $targets['pencapaian_mutu']['target'],
                'Anggaran' => $targets['pencapaian_mutu']['anggaran'],
                'Tahun' => $request->input('tahun'),
                'IdPuskesmas' => $request->input('puskesmas')
            ]);
            $targetPencapaianMutu->save();
        }
        
        return redirect()->route('admin.dataSPM')->with('notifikasi', 'Target Layanan berhasil ditambahkan.');
    }

    public function editTarget($IdPuskesmas, $tahun)
    {
        $title = "Edit Target"; 
        // Fetch the target data based on IdPuskesmas and tahun
        $targetLayanan = TargetSPM::where('IdPuskesmas', $IdPuskesmas)->where('Tahun', $tahun)->orderBy('IdIndikator')->get()->groupBy('IdIndikator');
        $puskesmasList = Puskesmas::all();
        $indikatorList = IndikatorSPM::all();

        return view('admin/targetEdit', compact('targetLayanan', 'puskesmasList', 'indikatorList', 'IdPuskesmas', 'tahun', 'title'));
    }

    public function updateTarget(Request $request, $IdPuskesmas, $tahun)
    {
        // Validasi input
        $validatedData = $request->validate([
            'targets' => 'required|array',
            'targets.*.A.target' => 'required|integer',
            'targets.*.A.anggaran' => 'required|numeric',
            'targets.*.B.target' => 'required|integer',
            'targets.*.B.anggaran' => 'required|numeric',
        ]);

        // Proses update target layanan
        foreach ($validatedData['targets'] as $indikatorId => $data) {
            $targetLayananDasar = TargetSPM::where('IdPuskesmas', $IdPuskesmas)
                ->where('Tahun', $tahun)
                ->where('IdIndikator', $indikatorId)
                ->where('KatLayanan', 'A')
                ->first();

            $targetLayananDasar->update([
                'JmlhTargetTHN' => $data['A']['target'],
                'Anggaran' => $data['A']['anggaran'],
            ]);

            $targetLayananMutu = TargetSPM::where('IdPuskesmas', $IdPuskesmas)
                ->where('Tahun', $tahun)
                ->where('IdIndikator', $indikatorId)
                ->where('KatLayanan', 'B')
                ->first();

            $targetLayananMutu->update([
                'JmlhTargetTHN' => $data['B']['target'],
                'Anggaran' => $data['B']['anggaran'],
            ]);
        }

        return redirect()->route('admin.dataSPM')->with('notifikasi', 'Target Layanan berhasil diperbarui.');
    }

    public function dtCapaian(Request $request)
    {
        $title = "Data Capaian SPM";
        $puskesmas = Puskesmas::all();
        $puskesmasId = $request->get('puskesmas');
        $tahun = $request->get('tahun');
        $bulan = $request->get('bulan');

        $target = collect();
        $tahunList = collect();
        $bulanList = range(1, 12);

        if ($puskesmasId) {
            $tahunList = TargetSPM::where('IdPuskesmas', $puskesmasId)
                ->distinct()
                ->pluck('Tahun');

        } if ($puskesmasId && $tahun && $bulan) {
            $target = TargetSPM::where('IdPuskesmas', $puskesmasId)
                ->where('targetlayanan.Tahun', $tahun)
                ->join('indikator', 'targetlayanan.IdIndikator', '=', 'indikator.IdIndikator')
                ->leftJoin('capaian', function ($join) use ($bulan) {
                    $join->on('targetlayanan.IdLayanan', '=', 'capaian.IdLayanan')
                        ->where('capaian.Bulan', '=', $bulan);
                })
                ->select('targetlayanan.*', 'indikator.name as NamaIndex', 'capaian.CapaianBLN', 'capaian.P_Anggaran')
                ->orderBy('targetlayanan.IdIndikator')
                ->get();
        }

        return view('admin.dataCapaian', compact('title', 'puskesmas', 'tahunList', 'bulanList', 'tahun', 'bulan', 'target'));
    }
}