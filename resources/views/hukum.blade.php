@extends('layout.main')
@section('content')
<body class="hukum">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table>
                    <tr>
                        <td rowspan="3"><img src="{{asset('asset/img/garuda.png')}}" alt="Image Description"></td>
                        <th>Nomor</th>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>2018</td>
                    </tr>
                    <tr>
                        <th>Tentang</th>
                        <td>Peraturan Pemerintah Nomor 2 Tahun 2018 Tentang Standar Pelayanan Minimal</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="file-card">
            <div class="header">
                FILE
            </div>
            <div class="body">
                <div class="file">
                    <div class="file-name">PP Nomor 2 Tahun 2018.pdf</div>
                    <div class="buttons">
                        <button class="preview" data-bs-toggle="modal" data-bs-target="#pdfModal" data-bs-pdf="file/PPNomor2Tahun2018.pdf"><i class="fas fa-eye"></i> Preview</button>
                        <button class="download" onclick="downloadFile('file/PPNomor2Tahun2018.pdf')"><i class="fas fa-download"></i> Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table>
                    <tr>
                        <td rowspan="3"><img src="{{asset('asset/img/garuda.png')}}" alt="Image Description"></td>
                        <th>Nomor</th>
                        <td>59</td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>2021</td>
                    </tr>
                    <tr>
                        <th>Tentang</th>
                        <td>Peraturan Menteri Dalam Negeri Nomor 59 Tahun 2021 Tentang Penerapan Standar Pelayanan Minimal</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="file-card">
            <div class="header">
                FILE
            </div>
            <div class="body">
                <div class="file">
                    <div class="file-name">Permendagri Nomor 59 Tahun 2021.pdf</div>
                    <div class="buttons">
                        <button class="preview" data-bs-toggle="modal" data-bs-target="#pdfModal" data-bs-pdf="file/PermendagriNomor59Tahun2021.pdf"><i class="fas fa-eye"></i> Preview</button>
                        <button class="download" onclick="downloadFile('file/PermendagriNomor59Tahun2021.pdf')"><i class="fas fa-download"></i> Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table>
                    <tr>
                        <td rowspan="3"><img src="{{asset('asset/img/garuda.png')}}" alt="Image Description"></td>
                        <th>Nomor</th>
                        <td>4</td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>2019</td>
                    </tr>
                    <tr>
                        <th>Tentang</th>
                        <td>Peraturan Menteri Kesehatan Nomor 4 Tahun 2019 Tentang Penerapan Standar Teknis Pemenuhan Mutu Pelayanan Dasar Pada Standar Pelayanan Minimal Bidang Kesehatan</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="file-card">
            <div class="header">
                FILE
            </div>
            <div class="body">
                <div class="file">
                    <div class="file-name">Permenkes Nomor 4 Tahun 2019.pdf</div>
                    <div class="buttons">
                        <button class="preview" data-bs-toggle="modal" data-bs-target="#pdfModal" data-bs-pdf="file/PermenkesNomor4Tahun2019.pdf"><i class="fas fa-eye"></i> Preview</button>
                        <button class="download" onclick="downloadFile('file/PermenkesNomor4Tahun2019.pdf')"><i class="fas fa-download"></i> Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfIframe" src="" width="100%" height="500px"></iframe>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var pdfModal = document.getElementById('pdfModal');
    pdfModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var pdfSrc = button.getAttribute('data-bs-pdf');
        var iframe = pdfModal.querySelector('#pdfIframe');
        iframe.src = pdfSrc;
    });

    function downloadFile(url) {
        var a = document.createElement('a');
        a.href = url;
        a.target = '_blank';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
</script>
@endsection