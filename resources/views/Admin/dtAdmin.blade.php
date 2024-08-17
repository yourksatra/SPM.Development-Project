@extends('layout.main')
@section('content')
    <div class="content">
        <div class="container-fluid pt-4 px-4">
            <div class="row gt-4 align-items-center justify-content-center mx-0">
                <div class="bg-light rounded h-100 p-4">
                    <h5>Ganti Username</h5>
                    <form id="usernameForm" action="{{ route('admin.username') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="usernamelama" class="form-label">Username Saat Ini</label>
                            <input type="text" class="form-control" id="oldusername" value="{{ session('username') }}"
                                readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username Baru</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ old('username') }}" required>
                        </div>
                        <button type="button" class="btn btn-warning" onclick="resetForm('usernameForm')">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row gt-4 bg-light rounded align-items-center justify-content-center mx-0 mt-4">
                <div class="bg-light rounded h-100 p-4">
                    <h5>Ganti Password</h5>
                    <form id="passwordForm" action="{{ route('admin.password') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" name="newPassword"
                                    value="{{ old('newPassword') }}" required>
                                <span class="input-group-text" onclick="togglePassword('newPassword')" type="button">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword_confirmation" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword_confirmation"
                                    name="newPassword_confirmation" value="{{ old('newPassword_confirmation') }}" required>
                                <span class="input-group-text" onclick="togglePassword('newPassword_confirmation')"
                                    type="button">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning" onclick="resetForm('passwordForm')">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <script>
        function resetForm(formId) {
            const form = document.getElementById(formId);
            const inputs = form.querySelectorAll('input:not([readonly])');
            inputs.forEach(input => {
                input.value = '';
            });
        }

        function togglePassword(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
        }

        function logout() {
            document.getElementById('logoutForm').submit();
        }

        @if (session('notifikasi'))
            setTimeout(logout, 2000); // Logout otomatis setelah 2 detik
        @endif
    </script>
@endsection
