@extends('layout.main')
@section('content')
    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="row gt-4 align-items-center justify-content-center mx-0">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Tambah Operator Baru</h6>
                    <form action="{{ route('admin.operator.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="Alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="NoTelpon" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" name="NoTelpon" required>
                        </div>
                        <div class="mb-3">
                            <label for="IdPuskesmas" class="form-label">Operator Puskesmas</label>
                            <select class="form-control" name="IdPuskesmas" required>
                                @foreach ($puskesmas as $p)
                                    <option value="{{ $p->IdPuskesmas }}">{{ $p->Nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username" id="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $newUsername }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" readonly
                                    required>
                                <span class="input-group-text" id="togglePassword" type="button">
                                    <i class="fa fa-eye" onclick="togglePassword()"></i>
                                </span>
                                <span class="input-group-text" id="generatePassword" type="button">
                                    <i class="fa fa-solid fa-dice" onclick="generatePassword()"></i>
                                </span>
                            </div>
                            <p style="font-size: 12px; margin-top: 5px">Klik
                                Tombol Mata untuk melihat Password,<br>Klik
                                Tombol Dadu untuk mengacak kombinasi password
                                lainnya.</p>
                            <p style="font-size: 12px; margin-top: 3px"><span style="font-weight: bold">Catat Password & Username
                                </span>Sebelum Melanjutnya
                                Proses Menambah Operator Baru</p>
                        </div>
                        <a href="{{ route('admin.operator.index') }}" class="btn btn-secondary"><i
                                class="fa-solid fa-ban"></i>
                            Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-regular fa-floppy-disk"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>

            <script>
                function generatePassword() {
                    const passwordField = document.getElementById('password');
                    const randomPassword = Math.random().toString(36).slice(-7);
                    passwordField.value = randomPassword;
                }

                function togglePassword() {
                    const passwordField = document.getElementById('password');
                    const eyeIcon = document.querySelector('#togglePassword i');
                    if (passwordField.type === 'password') {
                        passwordField.type = 'text';
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        passwordField.type = 'password';
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                }

                document.addEventListener('DOMContentLoaded', (event) => {
                    generatePassword(); // Generate password on page load
                });
            </script>
        @endsection
