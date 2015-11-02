<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProjectX</title>
    <link rel="shortcut icon" type="image/png" href="{{url('pms.png')}}"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
    <script src="{{url('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  </head>
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container" style="font-size: 16px;">
            <div class="navbar-header">
              <a href="{{url('/')}}" class="navbar-brand"><b>Project</b>X</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}"><span class="fa fa-home"></span> Home</a></li>
                <li><a href="{{url('client/project')}}"><span class="fa fa-folder-open"></span> Projects</a></li>
                <li><a href="{{url('client/user')}}"><span class="fa fa-user"></span> Users</a></li>
                <li><a href="{{url('client/about')}}"><span class="fa fa-info-circle"></span> About</a></li>
              </ul>
            </div>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <a href="{{url('client/addproject')}}" class="dropdown-toggle" style="font-size: 18px;">
                    <span class="fa fa-plus-circle"></span>
                    <span class="hidden-xs">Create Project</span>
                  </a>
                </li>
                <li class="dropdown user user-menu">
                  <a href="{{url('auth/login')}}" class="dropdown-toggle" style="font-size: 18px;">
                    <span class="fa fa-sign-in"></span>
                    <span class="hidden-xs">Sign In</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <div class="content-wrapper">
        <div class="container">
          @yield('client')
        </div>
      </div>
      <footer class="main-footer">
        <div class="container">
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved | Redesigned by <strong><a href="https://facebook.com/ichsantrueblue" target="_blank">Ichsan Firdaus</a></strong>
        </div>
      </footer>
    </div>

    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{url('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('plugins/fastclick/fastclick.min.js')}}"></script>
    <script src="{{url('dist/js/app.min.js')}}"></script>
    <script src="{{url('dist/js/demo.js')}}"></script>
    <script type="text/javascript">
      if(location.pathname.split("/")[1] == ""){
          $('ul li a[href="http://localhost:8000"]').parent('li').addClass('active');
      }
      else{
        $('ul li a[href^="http://localhost:8000' + location.pathname + '"]').parent('li').addClass('active');
      }
      $(function () {
        $(".select2").select2();
      });
    </script>
  </body>
</html>
