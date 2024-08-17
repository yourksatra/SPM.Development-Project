@extends('layout.main')
@section('content')
    <div class="content">
        <div class="container-fluid pt-1 px-4">
            <div class="row gt-4 my-3">
                {{-- Indikator --}}
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded p-4">
                        <h6 class="mb-2"><a href="#" class="clr-icon" type="button" data-bs-toggle="modal"
                                data-bs-target="#forminputIndex">Tambah Indikator <i
                                    class="fa-regular fa-square-plus"></i></a>
                        </h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Indikator</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($row as $index => $item)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <th>{{ $item->name }}</th>
                                        <td align="center">
                                            <span class="icon-wrapper">
                                                <a href="#" class="clr-icon" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#detailIndex{{ $item->IdIndikator }}"><i
                                                        class="fa fa-bars"></i></a>
                                                <a href="#" class="clr-icon" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editIndex{{ $item->IdIndikator }}"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="#" class="clr-icon" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $item->IdIndikator }}"><i
                                                        class="fa-regular fa-trash-can"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    {{-- Modal Detail --}}
                                    <div class="modal fade" id="detailIndex{{ $item->IdIndikator }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Informasi Indikator</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Pelayanan Kesehatan {{ $item->name }}</h5>
                                                    <textarea class="form-control" placeholder="Detail Kosong" style="height: 80px;" readonly>{{ $item->Detail }}</textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                        aria-label="Close"><i class="fa-regular fa-circle-xmark"></i>
                                                        Keluar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editIndex{{ $item->IdIndikator }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Edit Indikator</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.editIndex', $item->IdIndikator) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="NamaIndikator" class="form-label">Indikator</label>
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ $item->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="DetailIndikator" class="form-label">Detail</label>
                                                            <textarea class="form-control" placeholder="Detail Kosong" style="height: 100px;" name="Detail">{{ $item->Detail }}</textarea>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                        aria-label="Close"><i class="fa-solid fa-ban"></i> Batal</button>
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fa-regular fa-floppy-disk"></i>
                                                        Simpan</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Delete --}}
                                    <div class="modal fade" id="delete{{ $item->IdIndikator }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Hapus Indikator {{ $item->name }}</h1>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Menghapus Data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                                    <form action="{{ route('admin.deleteIndex', $item->IdIndikator) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Target Layanan --}}
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded p-4">
                        <h6 class="mb-2"><i class="fa-solid fa-table-list"></i> Target Layanan</h6>
                        <div class="d-flex align-items-center">
                            <h6 class="mb-2"><a href="{{ route('targetlayanan.create') }}"
                                    class="btn btn-primary clr-icon" style="padding: 5px;">Input Target Baru <i
                                        class="fa-regular fa-square-plus"></i></a></h6>
                            <form id="filterForm" action="{{ route('targetlayanan.index') }}" method="GET"
                                class="form-inline mx-2">
                                <div class="form-group mb-2">
                                    <label for="tahun" class="sr-only">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control"
                                        onchange="this.form.submit()">
                                        @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                                            <option value="{{ $i }}"
                                                {{ request('tahun') == $i ? 'selected' : '' }}>{{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Puskesmas</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($targetLayanan as $index => $target)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <th>{{ $target->NamaPuskesmas }}</th>
                                        <td>
                                            <a href="#" class="btn btn-primary clr-icon" type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $target->IdPuskesmas }}"
                                                style="font-size: small; padding: 3px;">Detail <i
                                                    class="fa-solid fa-circle-info"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($targetLayanan as $target)
            <!-- Modal Detail Target Puskesmas-->
            <div class="modal fade" id="detailModal{{ $target->IdPuskesmas }}" tabindex="-1"
                aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Target Layanan -
                                {{ $target->NamaPuskesmas }} - {{ $tahun }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Indikator</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">Anggaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $targets = App\Models\TargetSPM::join('indikator', 'targetlayanan.IdIndikator', '=', 'indikator.IdIndikator')
                                            ->where('targetlayanan.IdPuskesmas', $target->IdPuskesmas)
                                            ->where('targetlayanan.Tahun', $tahun)
                                            ->select('targetlayanan.*', 'indikator.name')
                                            ->get();
                                    @endphp
                                    @foreach ($targets as $index => $detail)
                                        <tr>
                                            <th>{{ $index + 1 }}</th>
                                            <td>{{ $detail->name }}</td>
                                            @if ($detail->KatLayanan=='A')                                       
                                                <td>({{$detail->KatLayanan}}) PELAYANAN DASAR</td>
                                            @else
                                                <td>({{$detail->KatLayanan}}) PENCAPAIAN MUTU MINIMAL</td>                                                
                                            @endif
                                            <td>{{ $detail->JmlhTargetTHN }}</td>
                                            <td>{{ $detail->Anggaran }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{ route('targetlayanan.edit', ['IdPuskesmas' => $target->IdPuskesmas, 'tahun' => $tahun]) }}" class="btn btn-primary crl-icon"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Modals Tambah Indikator --}}
        <div class="modal fade" id="forminputIndex" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Tambah Indikator Baru</h1>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.inputIndex') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="NamaIndikator" class="form-label">Indikator</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Indikator"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="DetailIndikator" class="form-label">Detail</label>
                                <textarea class="form-control" placeholder="Catat detail disini (Optional)" style="height: 100px;" name="Detail"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-solid fa-ban"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                            Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modals Tambah Target --}}
        <div class="modal fade" id="forminputTarget" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Target Layanan</h1>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="NamaIndikator" class="form-label">Indikator</label>
                                <input type="text" class="form-control" name="Nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="DetailIndikator" class="form-label">Detail</label>
                                <textarea class="form-control" placeholder="Catat detail disini (Optional)" style="height: 100px;" name="Detail"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-solid fa-ban"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                            Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}
@endsection
