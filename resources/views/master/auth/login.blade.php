<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buy and sell| Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('master/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('master/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('master/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('master/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="master/index2.html"><b>buy and sell</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">LOGIN</p>

        <div class="input-group mb-3">
          <input  type="email" class="form-control"  placeholder="email" id="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder=" password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" onclick="login()" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>


      <div class="social-auth-links text-center mb-3">
        {{-- <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a> --}}
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('master/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('master/dist/js/adminlte.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{asset('master/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('master/js/crud.js')}}"></script>

<script>
  function login() {
    //var guard = '{{request('guard')}}';
    let guard = '{{request('guard')}}';
    axios.post('/master/'+guard+'/login', {
      email: document.getElementById('email').value,
      password: document.getElementById('password').value,
      remember: document.getElementById('remember').checked,
      guard: guard
    })
        .then(function (response) {
        window.location.href = '/master/admin'
    })
        .catch(function (error) {
            if (error.response.data.errors !== undefined) {
              showErrorMessages(error.response.data.errors);

            } else {
                showMessage(error.response.data);
            }
        });
  }
  </script>

</body>
</html>
