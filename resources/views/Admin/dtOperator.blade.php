@extends('layout.main')
@section('content')
    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">
                            <a href="{{ route('admin.operator.create') }}" class="clr-icon" type="button">
                                Tambah Operator <i class="fa-regular fa-square-plus"></i>
                            </a>
                        </h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Nama Puskesmas</th>
                                        <th scope="col">Index</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operators as $key => $operator)
                                        <tr align="center">
                                            <th>{{ $key + 1 }}</th>
                                            <td>{{ $operator->username }}</td>
                                            <td>
                                                <span
                                                    class="status-dot {{ $operator->Status ? 'bg-success' : 'bg-danger' }}"></span>
                                                {{ $operator->Status ? 'User Aktif' : 'User Nonaktif' }}
                                            </td>
                                            <td>{{ $operator->NamaPuskesmas }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Horizontal button group">
                                                    <div class="btn-group-item">
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#operatorDetail{{ $operator->IdUser }}">
                                                            <i class="fa-regular fa-id-card"></i>
                                                        </button>
                                                        <div class="btn-label">Detail User</div>
                                                    </div>
                                                    <div class="btn-group-item">
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#operatorEdit{{ $operator->IdUser }}">
                                                            <i class="fa-solid fa-user-pen"></i>
                                                        </button>
                                                        <div class="btn-label">Edit User</div>
                                                    </div>
                                                    <div class="btn-group-item">
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#operatorStatus{{ $operator->IdUser }}">
                                                            <i
                                                                class="fa-solid {{ $operator->Status ? 'fa-user-xmark' : 'fa-user-check' }}"></i>
                                                        </button>
                                                        <div class="btn-label">
                                                            {{ $operator->Status ? 'Nonaktifkan User' : 'Aktifkan User' }}
                                                        </div>
                                                    </div>
                                                    <div class="btn-group-item">
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#operatorResetPassword{{ $operator->IdUser }}">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </button>
                                                        <div class="btn-label">Reset Password</div>
                                                    </div>
                                                </div>

                                                <!-- Modal Detail User -->
                                                <div class="modal fade" id="operatorDetail{{ $operator->IdUser }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail Operator</h5>
                                                            </div>
                                                            <div class="modal-body" align="left">
                                                                <p><strong>Nama:</strong> {{ $operator->Nama }}</p>
                                                                <p><strong>Alamat:</strong> {{ $operator->Alamat }}</p>
                                                                <p><strong>No. Telepon:</strong> {{ $operator->NoTelpon }}
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Edit User -->
                                                <div class="modal fade" id="operatorEdit{{ $operator->IdUser }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Operator</h5>
                                                            </div>
                                                            <div class="modal-body" align="left">
                                                                <form
                                                                    action="{{ route('admin.operator.update', $operator->IdUser) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="username"
                                                                            class="form-label">Username</label>
                                                                        <input type="text" class="form-control"
                                                                            name="username"
                                                                            value="{{ $operator->username }}" readonly
                                                                            required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Nama"
                                                                            class="form-label">Nama</label>
                                                                        <input type="text" class="form-control"
                                                                            name="Nama" value="{{ $operator->Nama }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Alamat"
                                                                            class="form-label">Alamat</label>
                                                                        <input type="text" class="form-control"
                                                                            name="Alamat" value="{{ $operator->Alamat }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="NoTelpon" class="form-label">No.
                                                                            Telepon</label>
                                                                        <input type="text" class="form-control"
                                                                            name="NoTelpon"
                                                                            value="{{ $operator->NoTelpon }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="IdPuskesmas" class="form-label">Nama
                                                                            Puskesmas</label>
                                                                        <select class="form-control" name="IdPuskesmas"
                                                                            required>
                                                                            @foreach ($puskesmas as $p)
                                                                                <option value="{{ $p->IdPuskesmas }}"
                                                                                    {{ $operator->IdPuskesmas == $p->IdPuskesmas ? 'selected' : '' }}>
                                                                                    {{ $p->Nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fa-solid fa-ban"></i> Batal
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa-regular fa-floppy-disk"></i> Simpan
                                                                </button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Ubah Status -->
                                                <div class="modal fade" id="operatorStatus{{ $operator->IdUser }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Status Operator</h5>
                                                            </div>
                                                            <div class="modal-body" align="left">
                                                                <form
                                                                    action="{{ route('admin.operator.updateStatus', $operator->IdUser) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <p>Apakah Anda yakin ingin mengubah status operator ini?
                                                                    </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fa-solid fa-ban"></i> Batal
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i
                                                                        class="fa-solid {{ $operator->Status ? 'fa-user-xmark' : 'fa-user-check' }}"></i>
                                                                    Ubah Status
                                                                </button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Reset Password -->
                                                <div class="modal fade" id="operatorResetPassword{{ $operator->IdUser }}"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="resetPasswordLabel{{ $operator->IdUser }}">Reset
                                                                    Password Operator {{ $operator->username }}</h5>
                                                            </div>
                                                            <div class="modal-body" align="left">
                                                                <form id="resetPasswordForm{{ $operator->IdUser }}"
                                                                    action="{{ route('admin.operator.resetPassword', $operator->IdUser) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="newPassword{{ $operator->IdUser }}"
                                                                            class="form-label">Password Baru</label>
                                                                        <div class="input-group">
                                                                            <input type="password"
                                                                                id="newPassword{{ $operator->IdUser }}"
                                                                                class="form-control" name="newPassword"
                                                                                readonly required>
                                                                            <span class="input-group-text"
                                                                                onclick="togglePassword('newPassword{{ $operator->IdUser }}')"
                                                                                type="button">
                                                                                <i class="fa fa-eye"></i>
                                                                            </span>
                                                                            <span class="input-group-text"
                                                                                onclick="generatePassword('newPassword{{ $operator->IdUser }}')">
                                                                                <i class="fa fa-solid fa-dice"></i>
                                                                            </span>
                                                                        </div>
                                                                        <p style="font-size: 12px; margin-top: 5px">Klik
                                                                            Tombol Dadu untuk membuat password.<br>Klik
                                                                            Tombol Mata untuk melihat Password,<br>Klik
                                                                            kembali
                                                                            Tombol Dadu untuk mengacak kombinasi password
                                                                            lainnya.</p>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="confirmPassword{{ $operator->IdUser }}"
                                                                            class="form-label">Konfirmasi Password</label>
                                                                        <div class="input-group">
                                                                            <input type="password" class="form-control"
                                                                                name="confirmPassword"
                                                                                id="confirmPassword{{ $operator->IdUser }}"
                                                                                required>
                                                                            <span class="input-group-text"
                                                                                onclick="togglePassword('confirmPassword{{ $operator->IdUser }}')"
                                                                                type="button">
                                                                                <i class="fa fa-eye"></i>
                                                                            </span>
                                                                        </div>
                                                                        <p style="font-size: 12px; margin-top: 5px">
                                                                            Masukkan Password Baru untuk Konfirmasi<br>Klik
                                                                            Tombol Mata untuk melihat Password <br><span
                                                                                style="font-weight: bold">Catat/Simpan
                                                                                Password
                                                                            </span>Sebelum Melanjutnya
                                                                            Proses</p>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fa-solid fa-ban"></i> Batal
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa-solid fa-pen"></i> Reset Password
                                                                </button>
                                                            </div>
                                                            </form>
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
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function togglePassword(fieldId) {
                var passwordField = document.getElementById(fieldId);
                var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
            }

            function generatePassword(passwordFieldId, confirmPasswordFieldId) {
                var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var passwordLength = 7;
                var password = "";
                for (var i = 0; i < passwordLength; i++) {
                    var randomNumber = Math.floor(Math.random() * chars.length);
                    password += chars.substring(randomNumber, randomNumber + 1);
                }
                document.getElementById(passwordFieldId).value = password;
                document.getElementById(confirmPasswordFieldId).value = password;
            }

            window.togglePassword = togglePassword;
            window.generatePassword = generatePassword;
        });
    </script>
@endsection
