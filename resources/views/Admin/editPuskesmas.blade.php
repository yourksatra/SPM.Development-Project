@extends('layout.main')
@section('content')
    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="row gt-4 align-items-center justify-content-center mx-0">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Data Puskesmas</h6>
                    <form action="{{ route('puskesmas.update', $puskesmas->IdPuskesmas) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="NamaPuskesmas" class="form-label">Nama Puskesmas</label>
                            <input type="text" class="form-control" name="Nama" value="{{ $puskesmas->Nama }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                value="{{ $puskesmas->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="Kecamatan" class="form-label">Kecamatan</label>
                            <select class="form-control" name="Kecamatan" required>
                                @foreach ($kecamatan as $kec)
                                    <option value="{{ $kec }}"
                                        {{ $puskesmas->Kecamatan == $kec ? 'selected' : '' }}>{{ $kec }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat Lengkap</label>
                            <input type="text" class="form-control" name="Alamat" value="{{ $puskesmas->Alamat }}"
                                required>
                        </div>
                        <div>
                            <a href="{{ route("admin.puskesmas.index") }}" class="btn btn-secondary"><i class="fa-solid fa-ban"></i>
                                Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
