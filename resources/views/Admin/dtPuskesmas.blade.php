@extends('layout.main')
@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row gt-4 align-items-center justify-content-center mx-0">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><a href="#" class="clr-icon" type="button" data-bs-toggle="modal"
                        data-bs-target="#forminput">Tambah Puskesmas <i class="fa-regular fa-square-plus"></i></a></h6>
                <div class="modal fade" id="forminput" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Tambah Data Puskesmas Baru</h1>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('puskesmas.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="NamaPuskesmas" class="form-label">Nama Puskesmas</label>
                                        <input type="text" class="form-control" name="Nama" value="PUSKESMAS " required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Kecamatan" class="form-label">Kecamatan</label>
                                        <select class="form-control" name="Kecamatan" required>
                                            @foreach ($kecamatan as $kec)
                                            <option value="{{ $kec }}">{{ $kec }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="NamaPuskesmas" class="form-label">Alamat Lengkap</label>
                                        <input type="text" class="form-control" name="Alamat" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="fa-solid fa-ban"></i> Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Puskesmas</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($row as $index => $item)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <th>{{ $item->Nama }}</th>
                            <td>{{ $item->Alamat }}</td>
                            <td>{{ $item->Kecamatan }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <span class="icon-wrapper">
                                    <a href="{{ route('puskesmas.edit', $item->IdPuskesmas) }}" class="clr-icon"
                                        type="button"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#" class="clr-icon" type="button" data-bs-toggle="modal"
                                        data-bs-target="#detail{{ $item->IdPuskesmas }}"><i
                                            class="fa-regular fa-trash-can"></i></a>
                                </span>
                                <div class="modal fade" id="detail{{ $item->IdPuskesmas }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">HAPUS DATA {{ $item->Nama }}</h1>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda Yakin Menghapus Data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                    aria-label="Close">Batal</button>
                                                <form action="{{ route('puskesmas.delete', $item->IdPuskesmas) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Blank End -->


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