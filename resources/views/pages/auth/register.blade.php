<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Factory 4.0 | Sign in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('templates/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('templates/dist/css/adminlte.min.css') }}">
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <a href="/"><h1><b>SMART</b>FACTORY 4.0</a></h1>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Daftar sebagai anggota baru</p>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="nip" class="form-control" placeholder="NIP" required value="{{ old('nip') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-id-badge"></span>
                    </div>
                </div>
            </div>
            @error('nip')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required value="{{ old('name') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Kata sandi" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan ulang kata sandi" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="row">
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
        </form>


        <!-- /.social-auth-links -->
        <div>
            <p class="mb-1">
            <a href="{{ route('login') }}">Saya telah menjadi anggota</a>
        </div>
    </div>
    <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('templates/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('templates/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('templates/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
