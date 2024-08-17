<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" href="{{ asset('asset/img/sumbawa.png') }}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Costume File -->
    <link rel="stylesheet" href="{{ asset('asset/css/styleA.css') }}">
    <link href="{{ asset('asset/css/styleB.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<nav class="navbar bg-light" id="navbar-top">
    <div class="container-fluid">
        <span class="navbar-brand" href="#" align="center">
            <img src="{{ asset('asset/img/kemendagri.png') }}" alt="Logo" width="40"
                class="d-inline-block align-text-center">
            <img src="{{ asset('asset/img/sumbawa.png') }}" alt="Logo" width="40"
                class="d-inline-block align-text-center">
        </span>
        <span class="navbar-brand" href="#" align="center">
            PELAPORAN STANDAR PELAYANAN MINIMAL BIDANG KESEHATAN <br>
            DINAS KESEHATAN KABUPATEN SUMBAWA
        </span>
        <span class="navbar-brand" href="#" align="center">
            <img src="{{ asset('asset/img/GERMAS.png') }}" alt="Logo" height="50"
                class="d-inline-block align-text-center">
        </span>
    </div>
</nav>

<body>
    @if (session('notifikasi'))
        <script>
            Swal.fire({
                title: "<h5>{{ session('notifikasi') }}</h5>",
                icon: "success",
                showConfirmButton: false,
                timer: 2300
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                title: "{!! implode('<br>', $errors->all()) !!}",
                icon: "error"
            });
        </script>
    @endif
    <!-- Guests Navbar -->
    @if (!session('user_type'))
        <nav class="navbar navbar-expand-lg" style="padding-top:0;padding-bottom:0;" id="navbar-bottom">
            <div class="container-fluid">
                <div class="navbar-nav">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">
                        <h6>Beranda</h6>
                    </a>
                    <a class="nav-link {{ Route::is('ldHukum') ? 'active' : '' }}" href="{{ route('ldHukum') }}">
                        <h6>Landasan Hukum</h6>
                    </a>
                    <a class="nav-link" href="{{ route('login') }}">
                        <h6>Login</h6>
                    </a>
                </div>
            </div>
        </nav>
    @endif
    <!-- User Navbar -->
    @if (session('user_type') === 0)
        <nav class="navbar navbar-expand-lg" style="padding-top:0;padding-bottom:0;" id="navbar-bottom">
            <div class="container-fluid">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link {{ Route::is('user.dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('user.dashboard') }}">
                        <h6 style="padding-top:8px;">Dashboard</h6>
                    </a>
                    <a class="nav-link {{ Route::is('user.capaian.index') ? 'active' : '' }}" aria-current="page" href="{{ route('user.capaian.index') }}">
                        <h6 style="padding-top:8px;">Data Capaian</h6>
                    </a>
                    <a class="nav-link {{ Route::is('user.capaian.create') ? 'active' : '' }}" aria-current="page" href="{{ route('user.capaian.create') }}">
                        <h6 style="padding-top:8px;">Input Capaian</h6>
                    </a>
                    <a class="nav-link {{ Route::is('user.panduan') ? 'active' : '' }}" aria-current="page" href="{{ route('user.panduan') }}">
                        <h6 style="padding-top:8px;">Panduan</h6>
                    </a>
                </div>
                <div id="dropdown">
                    <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item {{ Route::is('ldHukum') ? 'active' : '' }}" href="{{ route('ldHukum') }}">Landasan Hukum</a></li>
                        <li>
                            <hr class="dropdown-divider border border-light">
                            </hr>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif
    <!-- Admin Navbar -->
    @if (session('user_type') === 1)
        <div class="container-xxl position-fixed d-flex p-0">
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar">
                    <div class="d-flex align-items-center ms-4 mb-4 profile">
                        <div class="position-relative">
                            <img class="rounded-circle" src="{{ asset('asset/img/user.jpg') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <div
                                class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                            </div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">{{ session('username') }}</h6>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-item nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}"><i
                                class="fa-solid fa-laptop-file"></i>Dashboard</a>
                        <a href="{{ route('admin.operator.index') }}"
                            class="nav-item nav-link {{ Route::is('admin.operator.index') ? 'active' : '' }}"><i
                                class="fa fa-regular fa-user "></i>Data Operator</a>
                        <a href="{{ route('admin.puskesmas.index') }}"
                            class="nav-item nav-link {{ Route::is('admin.puskesmas.index') ? 'active' : '' }}"><i
                                class="fa fa-house-medical "></i>Puskesmas</a>
                        <div class="nav-item dropdown">
                            <a href="#"
                                class="nav-link dropdown-toggle {{ Route::is('admin.dataSPM', 'admin.capaian') ? 'active' : '' }}"
                                data-bs-toggle="dropdown"><i class="fa-solid fa-file-lines"></i>Data SPM</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{ route('admin.dataSPM') }}"
                                    class="dropdown-item {{ Route::is('admin.dataSPM') ? 'active' : '' }}">SPM-BK</a>
                                <a href="{{ route('admin.capaian') }}"
                                    class="dropdown-item {{ Route::is('admin.capaian') ? 'active' : '' }}">Data
                                    Capain</a>
                            </div>
                        </div>
                        <a href="{{ route('admin.loginfo') }}"
                            class="nav-item nav-link {{ Route::is('admin.loginfo') ? 'active' : '' }}"><i
                                class="fa fa-solid fa-user-lock "></i>Administrator</a>
                        <a class="nav-item nav-link" href=""
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fas fa-sign-out-alt"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </nav>
            </div>
            <div class="content" id="navbar-bottom">
                <!-- Navbar Start -->
                <nav class="navbar navbar-expand px-4 py-0">
                    <a href="#" class="sidebar-toggler flex-shrink-0">
                        <i class="fa fa-bars"></i>
                    </a>
                    <span class="d-none d-md-flex ms-4">
                        <h5 style="padding-top:8px; color:white;"><?= $title ?></h5>
                    </span>
                </nav>
            </div>
        </div>
    @endif
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Template Javascript -->
<script src="{{ asset('asset/js/main.js') }}"></script>
@yield('content')
