@extends('layout.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-light rounded mb-5">
            <div class="d-flex justify-content-between align-items-center">
                <h4>{{ $title }}</h4>
            </div>
            <form action="{{ route('user.capaian.create') }}" method="GET">
                <div class="d-flex mb-4">
                    <select name="tahun" class="form-select w-auto me-3" onchange="this.form.submit()">
                        @foreach ($target->unique('Tahun') as $t)
                            <option value="{{ $t->Tahun }}" {{ $t->Tahun == $tahun ? 'selected' : '' }}>
                                {{ $t->Tahun }}</option>
                        @endforeach
                    </select>
                    <select name="bulan" class="form-select w-auto" onchange="this.form.submit()">
                        @foreach (range(1, 12) as $month)
                            @if (!in_array($month, $filledMonths))
                                <option value="{{ $month }}" {{ $month == $bulan ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </form>
            <form action="{{ route('user.capaian.store') }}" method="POST">
                @csrf
                <input type="hidden" name="tahun" value="{{ $tahun }}">
                <input type="hidden" name="bulan" value="{{ $bulan }}">
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th class="text-center align-middle">No</th>
                            <th width="250px" class="text-center align-middle">Indikator</th>
                            <th class="text-center align-middle">Jumlah Total Yang Harus Dilayani Tahun Ini</th>
                            <th class="text-center align-middle">Jumlah Total Yang Terlayani Hingga Bulan Lalu</th>
                            <th class="text-center align-middle">Jumlah Total Yang Terlayani Bulan Ini</th>
                            <th class="text-center align-middle">Jumlah Yang Belum Terlayani</th>
                            <th class="text-center align-middle">Jumlah Total Anggaran Yang Harus Digunakan Tahun Ini</th>
                            <th class="text-center align-middle">Jumlah Total Anggaran Yang Digunakan Hingga Bulan Lalu</th>
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
                                    <td>
                                        <input type="hidden" name="capaian[{{ $index }}][IdLayanan]"
                                            value="{{ $t->IdLayanan }}">
                                        <input type="number" name="capaian[{{ $index }}][CapaianBLN]"
                                            class="form-control" value="{{ old('capaian.' . $index . '.CapaianBLN') }}"
                                            required>
                                    </td>
                                    <td>{{ $t->JmlhTargetTHN - $capaianBLNLalu }}</td>
                                    <td>{{ $t->Anggaran }}</td>
                                    <td>{{ $anggaranBLNLalu }}</td>
                                    <td>
                                        <input type="number" name="capaian[{{ $index }}][P_Anggaran]"
                                            class="form-control" value="{{ old('capaian.' . $index . '.P_Anggaran') }}"
                                            required>
                                    </td>
                                    <td>{{ $t->Anggaran - $anggaranBLNLalu }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
