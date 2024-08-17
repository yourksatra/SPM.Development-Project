@extends('layout.main')
@section('content')
    <div class="container-fluid pt-4 px-4 pb-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="rounded p-4 mb-4" style="background-color: #ffffff">
                    <h5 class="mb-3" style="font-weight: bold">Data Operator</h5>
                    <div>
                        <div class="info-container">
                            <label for="username">Username:</label>
                            <p id="username">{{ $operator->username }}</p>
                        </div>

                        <div class="info-container">
                            <label for="nama">Nama:</label>
                            <p id="nama">{{ $operator->Nama }}</p>
                        </div>
                        <div>
                            <label for="alamat">Alamat:</label>
                            <p id="alamat" style="text-align: justify; color: black">{{ $operator->Alamat }}</p>
                        </div>
                        <div class="info-container">
                            <label for="noTelp">No.Telp:</label>
                            <p id="noTelp" style="text-align: justify; color: black">{{ $operator->NoTelpon }}</p>
                        </div>
                    </div>
                </div>
                <div class="rounded p-4 mb-4" style="background-color: #ffffff">
                    <h5 class="mb-3" style="font-weight: bold">{{ $puskesmas->Nama }}</h5>
                    <div>
                        <label for="alamat">Alamat:</label>
                        <p id="alamat" style="text-align: justify; color: black">{{ $puskesmas->Alamat }}</p>
                    </div>
                    <div>
                        <label for="kmt">Kecamatan:</label>
                        <p id="kmt" style="text-align: justify; color: black">{{ $puskesmas->Kecamatan }}</p>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <p id="email" style="text-align: justify; color: black">{{ $puskesmas->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="rounded p-4 mb-0 pb-0" style="background-color: #ffffff">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 align="center" class="mx-3 mb-0 pb-0">{{ $titleHal }} TAHUN {{ $tahun }}</h5>
                            <a class="btn btn-primary" href="{{ route('user.capaian.index') }}"
                                style="text-decoration-line: underline">Detail</a>
                        </div>

                        <div class="mt-3">
                            <table class="table table-bordered table-striped table-light">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle" width="450px">Indikator</th>
                                        <th class="text-center align-middle">Progres Capaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($target->groupBy('NamaIndex') as $indikator => $targets)
                                        <tr>
                                            <td colspan="5" style="font-weight: bolder;">Pelayanan Kesahatan
                                                {{ $indikator }}</td>
                                        </tr>
                                        @foreach ($targets as $index => $t)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $t->KatLayanan == 'A' ? 'Penerima Pelayanan Dasar' : 'Mutu Minimal Layanan Dasar' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $capaian = \App\Models\CapaianSPM::where(
                                                            'IdLayanan',
                                                            $t->IdLayanan,
                                                        )
                                                            ->where('Tahun', $t->Tahun)
                                                            ->sum('CapaianBLN');
                                                        $progress =
                                                            $capaian !== null && $t->JmlhTargetTHN > 0
                                                                ? ($capaian / $t->JmlhTargetTHN) * 100
                                                                : 0;
                                                    @endphp
                                                    <div class="progress position-relative" role="progressbar"
                                                        aria-label="Progress Capaian" aria-valuenow="{{ $progress }}"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar"
                                                            style="width: {{ $progress > 0 ? $progress . '%' : '0%' }}">
                                                            @if ($progress > 0)
                                                                {{ round($progress) }}%
                                                            @endif
                                                        </div>
                                                        @if ($progress == 0)
                                                            <span class="progress-placeholder">0%</span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                                {{ $target->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
