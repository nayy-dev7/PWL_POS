<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Pengguna</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/adminlte/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/adminlte/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/adminlte/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('dist/adminlte/css/adminlte.min.css') }}">

</head>
<body class="hold-transition register-page">

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ url('/') }}" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Buat akun baru</p>

      <form action="{{ route('postregister') }}" method="POST" id="form-register">
        @csrf

        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
          <small class="text-danger">{{ $errors->first('username') }}</small>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-id-card"></span></div>
          </div>
          <small class="text-danger">{{ $errors->first('nama') }}</small>
        </div>

        <div class="input-group mb-3">
          <select name="level_id" class="form-control">
            <option value="">-- Pilih Level User --</option>
            @foreach($levels as $l)
              <option value="{{ $l->level_id }}">{{ $l->level_nama }}</option>
            @endforeach
          </select>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-users"></span></div>
          </div>
          <small class="text-danger">{{ $errors->first('level_id') }}</small>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
          <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-key"></span></div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
        </div>
      </form>
      <br>

      <a href="{{ url('/login') }}" class="text-center">Sudah punya akun? Login</a>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/adminlte/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/adminlte/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/adminlte/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/adminlte/js/adminlte.min.js') }}"></script>

@if(session('success'))
<script>
  Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '{{ session("success") }}',
  });
</script>
@endif

</body>
</html>
