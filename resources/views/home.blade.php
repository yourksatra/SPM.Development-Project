@extends('layout.main')
@section('content')
    <div class="container-fluid pt-4 px-4 pb-5" style="background-color: #ffffff">
        <div class="row g-4">
            <!-- Card Perkenalan -->
            <div class="col-lg-8">
                <div class="bg-light rounded p-4 mb-4">
                    <h5 class="mb-3" style="font-weight: bold">Selamat Datang di Website Standar Pelayanan Minimal (SPM)
                        Bidang Kesehatan</h5>
                    <p style="text-align: justify; color: black">Standar Pelayanan Minimal (SPM) Bidang Kesehatan adalah
                        tolok ukur yang wajib
                        dipenuhi oleh setiap pemerintah daerah dalam menyelenggarakan pelayanan kesehatan bagi
                        masyarakat. SPM ini dirancang untuk memastikan bahwa seluruh warga negara, tanpa terkecuali,
                        mendapatkan layanan kesehatan yang layak, bermutu, dan sesuai dengan kebutuhan dasar kesehatan
                        mereka.</p>
                    <p style="text-align: justify; color: black">Tujuan utama dari penerapan SPM Bidang Kesehatan adalah
                        untuk meningkatkan
                        akses dan kualitas layanan kesehatan, serta menjamin pemerataan layanan di seluruh wilayah
                        Indonesia. Dengan adanya standar yang jelas dan terukur, pemerintah daerah dapat lebih fokus
                        dalam merencanakan, melaksanakan, dan mengevaluasi program-program kesehatan yang
                        diselenggarakan.</p>
                </div>

                <!-- Card Indikator -->
                <div class="bg-light rounded p-4">
                    <h5 class="mb-3">12 Indikator SPM Bidang Kesehatan</h5>
                    <div class="row">
                        @foreach ($indikatorList as $index => $indikator)
                            <div class="col-md-2 text-center mb-0">
                                <div class="indikator-icon">
                                    <img src="{{ asset('asset/img/index/' . $indikator->IdIndikator . '.png') }}"
                                        class="img-fluid rounded-circle mb-2" alt="{{ $indikator->IdIndikator }}">
                                </div>
                                <p style="font-size: small; text-align: center;">Pelayanan Kesehatan
                                    {{ $indikator->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Card Landasan Hukum -->
            <div class="col-lg-4">
                <div class="bg-light rounded p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="mb-0" style="font-weight: bold">Landasan Hukum</h5>
                        <a href="{{ route('ldHukum') }}" style="text-decoration-line: underline">See All</a>
                    </div>
                    <!-- Modal Trigger -->
                    <a type="button" class="landasan-hukum-item" data-bs-toggle="modal" data-bs-target="#pdfModal"
                        data-bs-pdf="file/PermenkesNomor4Tahun2019.pdf">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('asset/img/garuda.png') }}" class="img-fluid me-3" alt="Logo Garuda"
                                style="width: 50px; height: 50px;">
                            <div>
                                <p class="mb-0" style="font-size: small; text-align: justify">Peraturan Menteri
                                    Kesehatan Nomor 4 Tahun 2019 Tentang Penerapan
                                    Standar Teknis Pemenuhan Mutu Pelayanan Dasar SPM Bidang Kesehatan</p>
                            </div>
                        </div>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe id="pdfIframe" src="" width="100%" height="500px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Puskesmas -->
                <div class="bg-light rounded p-4">
                    <h5 class="mb-3">Daftar Puskesmas</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Puskesmas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($puskesmasList as $index => $puskesmas)
                                <tr>
                                    <th scope="row">{{ $puskesmasList->firstItem() + $index }}</th>
                                    <td>{{ $puskesmas->Nama }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $puskesmasList->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .text-justify {
            text-align: justify;
        }

        .indikator-icon img {
            width: 100%;
            max-width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .landasan-hukum-item {
            text-decoration: none;
            color: inherit;
            padding: 10px;
            display: block;
            border: 1px solid transparent;
            border-radius: 5px;
            transition: border 0.3s ease;
        }

        .landasan-hukum-item:hover {
            border: 1px solid #4d4d4d;
            color: black;
        }

        .landasan-hukum-item img {
            width: 50px;
            height: 50px;
        }

        .landasan-hukum-item p {
            margin-bottom: 0;
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
        }

        .page-item {
            margin: 0 0.25rem;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }
    </style>
    <script>
        var pdfModal = document.getElementById('pdfModal');
        pdfModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var pdfSrc = button.getAttribute('data-bs-pdf');
            var iframe = pdfModal.querySelector('#pdfIframe');
            iframe.src = pdfSrc;
        });
    </script>
@endsection
