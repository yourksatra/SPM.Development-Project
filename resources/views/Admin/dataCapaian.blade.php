@extends('layout.main')
@section('content')
    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="row gt-4 align-items-center justify-content-center mx-0">
                <form action="{{ route('admin.capaian') }}" method="GET">
                    <div class="d-flex mb-4">
                        <select name="puskesmas" class="form-select w-auto me-3" onchange="this.form.submit()">
                            <option value="">Pilih Puskesmas</option>
                            @foreach ($puskesmas as $p)
                                <option value="{{ $p->IdPuskesmas }}"
                                    {{ $p->IdPuskesmas == request('puskesmas') ? 'selected' : '' }}>
                                    {{ $p->Nama }}
                                </option>
                            @endforeach
                        </select>
                        <select name="tahun" class="form-select w-auto me-3">
                            <option value="">Pilih Tahun</option>
                            @foreach ($tahunList as $t)
                                <option value="{{ $t }}" {{ $t == request('tahun') ? 'selected' : '' }}>
                                    {{ $t }}</option>
                            @endforeach
                        </select>
                        <select name="bulan" class="form-select w-auto" onchange="this.form.submit()">
                            <option value="">Pilih Bulan</option>
                            @foreach ($bulanList as $month)
                                <option value="{{ $month }}" {{ $month == request('bulan') ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if ($target->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th class="text-center align-middle">No</th>
                                <th width="250px" class="text-center align-middle">Indikator</th>
                                <th class="text-center align-middle">Jumlah Total Yang Harus Dilayani Tahun Ini</th>
                                <th class="text-center align-middle">Jumlah Total Yang Terlayani Hingga Bulan Lalu</th>
                                <th class="text-center align-middle">Jumlah Total Yang Terlayani Bulan Ini</th>
                                <th class="text-center align-middle">Jumlah Yang Belum Terlayani</th>
                                <th class="text-center align-middle">Jumlah Total Anggaran Yang Harus Digunakan Tahun Ini
                                </th>
                                <th class="text-center align-middle">Jumlah Total Anggaran Yang Digunakan Hingga Bulan Lalu
                                </th>
                                <th class="text-center align-middle">Jumlah Total Anggaran Yang Digunakan Bulan Ini</th>
                                <th class="text-center align-middle">Jumlah Anggaran Yang Belum Digunakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($target->groupBy('NamaIndex') as $indikator => $targets)
                                <tr>
                                    <td colspan="10" style="font-weight: bolder;">Pelayanan Kesahatan {{ $indikator }}
                                    </td>
                                </tr>
                                @foreach ($targets as $index => $t)
                                    @php
                                        $capaian = App\Models\CapaianSPM::where('IdLayanan', $t->IdLayanan)
                                        ->where('Tahun', $tahun)
                                        ->where('Bulan', '<', $bulan) // hanya hingga bulan sebelum bulan yang dipilih
                                        ->get();
                                        $capaianBLNLalu = $capaian->sum('CapaianBLN');
                                        $anggaranBLNLalu = $capaian->sum('P_Anggaran');
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $t->KatLayanan == 'A' ? 'Penerima Pelayanan Dasar' : 'Mutu Minimal Layanan Dasar' }}
                                        </td>
                                        <td>{{ $t->JmlhTargetTHN }}</td>
                                        <td>{{ $capaianBLNLalu }}</td>
                                        <td>{{ $t->CapaianBLN ?? 0 }}</td>
                                        @if ($bulan == 1)
                                        <td>{{ $t->JmlhTargetTHN - $t->CapaianBLN }}</td>
                                        @else
                                        <td>{{ $t->JmlhTargetTHN - $capaianBLNLalu }}</td>
                                        @endif
                                        <td>{{ $t->Anggaran }}</td>
                                        <td>{{ $anggaranBLNLalu }}</td>
                                        <td>{{ $t->P_Anggaran ?? 0 }}</td>
                                        @if ($bulan == 1)
                                        <td>{{ $t->Anggaran - $t->P_Anggaran }}</td>
                                        @else
                                        <td>{{ $t->Anggaran - $anggaranBLNLalu }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning" role="alert">
                        Silakan pilih Puskesmas, Tahun, dan Bulan untuk melihat data.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
