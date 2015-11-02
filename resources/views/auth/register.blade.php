<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" type="image/png" href="{{url('pms.png')}}"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register | PMSystem</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/iCheck/square/blue.css')}}">
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="{{url('home')}}"><span class="fa fa-user-plus"></span> <b>PM</b>System</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="{{url('auth/register')}}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="foto" value="user.png">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full name" name="name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input id="agree" type="checkbox" name="agree"> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <button onclick="if(!this.form.agree.checked){alert('You must agree the Terms');return false}" type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
          </div>
        </form>
				@if(count($errors) > 0)
        <hr>
            Sorry, there's an <b>error</b> with your login
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        @endif
      </div>
    </div>

    <script src="{{url('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%'
        });
      });
    </script>
  </body>
</html>
