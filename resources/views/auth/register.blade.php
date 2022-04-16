<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>İşletme Yönetim | Kayıt Ekranı</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend/plugins/iCheck/square/blue.css')}}">

  <style type="text/css">
    .register-page {
        background: url('/images/register.jpg') no-repeat center center fixed;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -moz-background-size: cover;
    }

    body {
        overflow: hidden;
    }
</style>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div style="color: white" class="register-logo">
    <b>İşletme</b> Yönetim
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Üyelik bilgilerinizi doldurunuz.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
      <div class="form-group has-feedback">
        <input id="name" type="text" placeholder="Tam adınızı giriniz" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
       
      </div>
      <div class="form-group has-feedback">
        <input id="email" type="email" placeholder="Mail adresinizi giriniz." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
       
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" placeholder="Şifrenizi giriniz." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
       
      </div>
      <div class="form-group has-feedback">
        <input id="password-confirm" type="password" placeholder="Şifrenizi tekrar giriniz." class="form-control" name="password_confirmation" required autocomplete="new-password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Kayıt Ol</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<br>
    <a href="{{ route('login') }}" class="text-center">Üyeliğiniz var ise giriş yapabilirisiniz.</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="b{{asset('ackend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('backend/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

