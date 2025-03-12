<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Factory 4.0 | Forgot Password</title>

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
        <p class="login-box-msg">Untuk bisa mengganti kata sandi</p>
            <div>Hubungi kontak IT<p>0812345678</p></div>
            <div class="row">
                <a href="{{ route('login')}}" class="btn btn-primary btn-block">Back</a>
                <!-- <button type="submit" class="btn btn-primary btn-block">Back</button> -->
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
