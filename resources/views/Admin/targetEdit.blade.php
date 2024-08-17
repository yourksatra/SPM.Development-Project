@extends('layout.main')

@section('content')
    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4 align-items-center justify-content-center mx-0">
                <div class="h-100 mb-3">
                    <div class="bg-light rounded p-4">
                        <h5>Edit Target Layanan</h5>
                        <form id="targetLayananForm" action="{{ route('targetlayanan.update', ['IdPuskesmas' => $IdPuskesmas, 'tahun' => $tahun]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Bagian 1: Input Tahun dan Puskesmas -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" value="{{ $tahun }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="puskesmas" class="form-label">Puskesmas</label>
                                    <input type="text" class="form-control" value="{{ $puskesmasList->find($IdPuskesmas)->Nama }}" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- Bagian 2: Input Target dan Anggaran Berdasarkan Indikator -->
                        @foreach ($targetLayanan as $indikatorId => $targets)
                            <div class="bg-light rounded p-4 mt-3 pb-2">
                                <div class="mb-2">
                                    <h5 style="font-style: italic">{{ $loop->iteration }}. Pelayanan Kesehatan {{ $indikatorList->find($indikatorId)->name }}</h5>
                                    <div class="row mt-2">
                                        <!-- Layanan Dasar -->
                                        <div class="col-md-6">
                                            <h6>Layanan Dasar</h6>
                                            @php
                                                $layananDasar = $targets->where('KatLayanan', 'A')->first();
                                            @endphp
                                            <div class="mb-3">
                                                <label for="target_{{ $indikatorId }}_layanan_dasar" class="form-label">Target</label>
                                                <input type="number" class="form-control" id="target_{{ $indikatorId }}_layanan_dasar" name="targets[{{ $indikatorId }}][A][target]" value="{{ $layananDasar->JmlhTargetTHN ?? '' }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="anggaran_{{ $indikatorId }}_layanan_dasar" class="form-label">Anggaran</label>
                                                <input type="number" step="0.01" class="form-control" id="anggaran_{{ $indikatorId }}_layanan_dasar" name="targets[{{ $indikatorId }}][A][anggaran]" value="{{ $layananDasar->Anggaran ?? '' }}" required>
                                            </div>
                                        </div>
                                        <!-- Pencapaian Mutu Minimal -->
                                        <div class="col-md-6">
                                            <h6>Pencapaian Mutu Minimal</h6>
                                            @php
                                                $pencapaianMutu = $targets->where('KatLayanan', 'B')->first();
                                            @endphp
                                            <div class="mb-3">
                                                <label for="target_{{ $indikatorId }}_pencapaian_mutu" class="form-label">Target</label>
                                                <input type="number" class="form-control" id="target_{{ $indikatorId }}_pencapaian_mutu" name="targets[{{ $indikatorId }}][B][target]" value="{{ $pencapaianMutu->JmlhTargetTHN ?? '' }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="anggaran_{{ $indikatorId }}_pencapaian_mutu" class="form-label">Anggaran</label>
                                                <input type="number" step="0.01" class="form-control" id="anggaran_{{ $indikatorId }}_pencapaian_mutu" name="targets[{{ $indikatorId }}][B][anggaran]" value="{{ $pencapaianMutu->Anggaran ?? '' }}" required>
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
    </div>
@endsection