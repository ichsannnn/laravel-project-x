<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" type="image/png" href="{{url('pms.png')}}"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in | ProjectX</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/iCheck/square/blue.css')}}">
    <style>
      .background-image {
          background: url('{{url('dist/img/photo4.jpg')}}') no-repeat center center fixed ;
          filter: blur(1px);
          -webkit-filter: blur(5px);
          height: 800px;
          left: 0;
          top: 0;
          position: fixed;
          right: 0;
          z-index: 1;
        }
        .login {
          background: rgba(255, 255, 255, 0.35);
          border-radius: 3px;
          box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
          font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
          padding: 0 20px;
        }
    </style>
    <script>

        /*
        * Do not use this is a google analytics fro Metro UI CSS
        * */
        if (window.location.hostname !== 'localhost') {

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-58849249-3', 'auto');
            ga('send', 'pageview');

        }


        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
  </head>
  <body class="hold-transition">
    <div class="background-image"></div>
    <div class="login-box login animated bounceIn" id="animation_box">
      <div class="login-logo">
        <a href="{{url('home')}}"><span class="fa fa-sign-in"></span> <b>Project</b>X</a>
      </div>
      <div class="">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{url('auth/login')}}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>
        @if(count($errors) > 0)
        <div class="callout callout-danger">
          <h4>Sorry, there's an <b>error</b> with your login</h4>
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
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

      $(document).ready(function() {
            $('.animation_select').click( function(){
                $('#animation_box').removeAttr('class').attr('class', '');
                var animation = $(this).attr("data-animation");
                $('#animation_box').addClass('animated');
                $('#animation_box').addClass(animation);
                return false;
            });

            var graph2 = new Rickshaw.Graph( {
                element: document.querySelector("#rickshaw_multi"),
                renderer: 'area',
                stroke: true,
                series: [ {
                    data: [ { x: 0, y: 2 }, { x: 1, y: 5 }, { x: 2, y: 8 }, { x: 3, y: 4 }, { x: 4, y: 8 } ],
                    color: '#1ab394',
                    stroke: '#17997f'
                }, {
                    data: [ { x: 0, y: 13 }, { x: 1, y: 15 }, { x: 2, y: 17 }, { x: 3, y: 12 }, { x: 4, y: 10 } ],
                    color: '#eeeeee',
                    stroke: '#d7d7d7'
                } ]
            } );
            graph2.renderer.unstack = true;
            graph2.render();
        });
    </script>
  </body>
</html>
