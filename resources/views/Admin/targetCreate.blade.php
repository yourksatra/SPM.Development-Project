@extends('layout.main')

@section('content')
    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4 align-items-center justify-content-center mx-0">
                <div class="h-100 mb-3">
                    <div class="bg-light rounded p-4">
                        <h5>Tambah Target Layanan</h5>
                        <form id="targetLayananForm" action="{{ route('targetlayanan.store') }}" method="POST">
                            @csrf
                            <!-- Bagian 1: Input Tahun dan Puskesmas -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control" required>
                                        <option value="" disabled selected>Pilih Tahun</option>
                                        @for ($i = date('Y'); $i <= date('Y') + 5; $i++)
                                            <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="puskesmas" class="form-label">Puskesmas</label>
                                    <select class="form-control" id="puskesmas" name="puskesmas" required>
                                        <option value="" disabled selected>Pilih Puskesmas</option>
                                        @foreach ($puskesmasList as $pkm)
                                            <option value="{{ $pkm->IdPuskesmas }}">{{ $pkm->Nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                    <!-- Bagian 2: Input Target dan Anggaran Berdasarkan Indikator -->
                    @foreach ($indikatorList as $index => $indikator)
                        <div class="bg-light rounded p-4 mt-3 pb-2">
                            <div class="mb-2">
                                <h5 style="font-style: italic">{{ $index + 1 }}. Pelayanan Kesehatan {{ $indikator->name }}</h5>
                                <div class="row mt-2">
                                    <!-- Layanan Dasar -->
                                    <div class="col-md-6">
                                        <h6>Layanan Dasar</h6>
                                        <div class="mb-3">
                                            <label for="target_{{ $indikator->IdIndikator }}_layanan_dasar"
                                                class="form-label">Target</label>
                                            <input type="number" class="form-control"
                                                id="target_{{ $indikator->IdIndikator }}_layanan_dasar"
                                                name="targets[{{ $indikator->IdIndikator }}][layanan_dasar][target]"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="anggaran_{{ $indikator->IdIndikator }}_layanan_dasar"
                                                class="form-label">Anggaran</label>
                                            <input type="number" step="0.01" class="form-control"
                                                id="anggaran_{{ $indikator->IdIndikator }}_layanan_dasar"
                                                name="targets[{{ $indikator->IdIndikator }}][layanan_dasar][anggaran]"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Pencapaian Mutu Minimal -->
                                    <div class="col-md-6">
                                        <h6>Pencapaian Mutu Minimal</h6>
                                        <div class="mb-3">
                                            <label for="target_{{ $indikator->IdIndikator }}_pencapaian_mutu"
                                                class="form-label">Target</label>
                                            <input type="number" class="form-control"
                                                id="target_{{ $indikator->IdIndikator }}_pencapaian_mutu"
                                                name="targets[{{ $indikator->IdIndikator }}][pencapaian_mutu][target]"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="anggaran_{{ $indikator->IdIndikator }}_pencapaian_mutu"
                                                class="form-label">Anggaran</label>
                                            <input type="number" step="0.01" class="form-control"
                                                id="anggaran_{{ $indikator->IdIndikator }}_pencapaian_mutu"
                                                name="targets[{{ $indikator->IdIndikator }}][pencapaian_mutu][anggaran]"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="bg-light rounded p-4 mt-3">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
