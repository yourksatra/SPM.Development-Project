<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="{{ asset('asset/img/sumbawa.png') }}">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Costume File -->
    <link rel="stylesheet" href="{{ asset('asset/css/log.css') }}">
</head>

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
                title: "<h5>{!! implode('<br>', $errors->all()) !!}</h5>",
                icon: "error"
            });
        </script>
    @endif
    <div class="body">
        <div class="container" id="container">
            <div class="form-container login-container">
                <a href="{{ route('home') }}"><i class='fa fa-solid fa-chevron-left icon'></i></a>
                <form method="POST" action="{{ route('authLogin') }}">
                    @csrf
                    <h1>Login</h1>
                    <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
                    <input type="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
                    <br>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
