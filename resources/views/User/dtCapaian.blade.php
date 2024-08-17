@extends('layout.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-light rounded">
            <div class="d-flex align-items-center">
                <h4 align="center" class="mx-3 mb-0 pb-0">{{ $titleHal }}</h4>
            </div>

            <div class="mt-2 mx-3">
                <select class="form-select w-auto" id="tahunSelector">
                    @foreach ($target->unique('Tahun') as $t)
                        <option value="{{ $t->Tahun }}">{{ $t->Tahun }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <table class="table table-bordered table-striped table-light">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-middle">No</th>
                            <th rowspan="2" class="text-center align-middle" width="450px">Indikator</th>
                            <th colspan="2" class="text-center align-middle">(Tahun)</th>
                            <th rowspan="2" class="text-center align-middle">Progres Capaian</th>
                        </tr>
                        <tr>
                            <th class="text-center align-middle">Jumlah Total yang Harus Dilayani</th>
                            <th class="text-center align-middle">Anggaran yang Harus Digunakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($target->groupBy('NamaIndex') as $indikator => $targets)
                            <tr>
                                <td colspan="5" style="font-weight: bolder;">Pelayanan Kesahatan {{ $indikator }}</td>
                            </tr>
                            @foreach ($targets as $index => $t)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $t->KatLayanan == 'A' ? 'Penerima Pelayanan Dasar' : 'Mutu Minimal Layanan Dasar' }}
                                    </td>
                                    <td>{{ $t->JmlhTargetTHN }}</td>
                                    <td>{{ $t->Anggaran }}</td>
                                    <td>
                                        @php
                                            $capaian = \App\Models\CapaianSPM::where('IdLayanan', $t->IdLayanan)
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
            </div>
        </div>
    </div>
    <!-- Content End -->
    <script>
        // Add any JavaScript for interactivity, such as handling the dropdown year selection
        document.getElementById('tahunSelector').addEventListener('change', function() {
            // Logic to reload the table data based on the selected year
        });
    </script>
@endsection
