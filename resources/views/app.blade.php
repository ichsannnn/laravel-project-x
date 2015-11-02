<!DOCTYPE html>
<html>
        @if(Auth::user()->activated == "Y")
        <head>
          <link rel="shortcut icon" type="image/png" href="{{url('pms.png')}}"/>
          <title>ProjectX</title>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
          <link rel="stylesheet" href="{{url('bootstrap/css/font-awesome.min.css')}}">
          <link rel="stylesheet" href="{{url('bootstrap/css/ionicons.min.css')}}">
          <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
          <link rel="stylesheet" href="{{url('plugins/iCheck/flat/green.css')}}">
          <link rel="stylesheet" href="{{url('plugins/morris/morris.css')}}">
          <link rel="stylesheet" href="{{url('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
          <link rel="stylesheet" href="{{url('plugins/datepicker/datepicker3.css')}}">
          <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker-bs3.css')}}">
          <link rel="stylesheet" href="{{url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
          <link rel="stylesheet" href="{{url('plugins/select2/select2.min.css')}}">
          <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
          <link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
          <link rel="stylesheet" href="{{url('plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
          <link rel="stylesheet" href="{{url('plugins/timepicker/bootstrap-timepicker.min.css')}}">
        </head>

        <body class="hold-transition skin-green fixed sidebar-mini">
          <div class="wrapper">
            <div class="content-wrapper">
          @include('menu')
          @yield('content')
            </div>
            <footer class="main-footer">
              <div class="container">
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> | Redesigned by <strong><a href="https://facebook.com/ichsantrueblue" target="_blank">Ichsan Firdaus</a></strong> All rights reserved.
              </div>
            </footer>
          </div>

          <script src="{{url('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
          <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
          <script src="{{url('plugins/select2/select2.full.min.js')}}"></script>
          <script src="{{url('plugins/input-mask/jquery.inputmask.js')}}"></script>
          <script src="{{url('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
          <script src="{{url('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
          <script src="{{url('dist/js/moment.min.js')}}"></script>
          <script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
          <script src="{{url('plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
          <script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
          <script src="{{url('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
          <script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
          <script src="{{url('plugins/fastclick/fastclick.min.js')}}"></script>
          <script src="{{url('dist/js/app.min.js')}}"></script>
          <script src="{{url('dist/js/demo.js')}}"></script>
          <script>
            $(function () {
              $(".select2").select2();

              $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
              $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
              $("[data-mask]").inputmask();

              $('#reservation').daterangepicker();
              $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
              $('#daterange-btn').daterangepicker(
                  {
                    ranges: {
                      'Today': [moment(), moment()],
                      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                      'This Month': [moment().startOf('month'), moment().endOf('month')],
                      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                  },
              function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
              }
              );

              $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
              });
              $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
              });
              $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
              });

              $(".my-colorpicker1").colorpicker();
              $(".my-colorpicker2").colorpicker();

              $(".timepicker").timepicker({
                showInputs: false
              });

              alert($(location.pathname).parent('li'));
              $('ul li a[href^="http://localhost:8000' + location.pathname + '"]').parent('li').addClass('active');

            });
          </script>
        </body>
        @elseif(Auth::user()->activated == "N")
        <head>
          <link rel="shortcut icon" type="image/png" href="{{url('pms.png')}}"/>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Not Activated</title>
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
          <link rel="stylesheet" href="{{url('bootstrap/css/font-awesome.min.css')}}">
          <link rel="stylesheet" href="{{url('bootstrap/css/ionicons.min.css')}}">
          <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
          <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
        </head>
        <body class="hold-transition skin-blue layout-top-nav">
          <div class="wrapper">

            <header class="main-header">

            </header>
            <div class="content-wrapper">
              <div class="container">
                <section class="content-header">
                  <h1>
                    Not Activated
                  </h1>

                <section class="content">
                  <div class="callout callout-danger">
                    <h4>Not Activated</h4>
                    <p>Your account is not activated. Please contact the Admin</p>
                  </div>
                  <a href="{{url('auth/logout')}}"><button type="button" class="btn btn-block btn-flat btn-primary" name="button">Logout</button></a>
                </section>
              </div>
            </div>
            <footer class="main-footer">
              <div class="container">
                <div class="pull-right hidden-xs">
                  <b>Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> | Redesigned by <strong><a href="https://facebook.com/ichsantrueblue" target="_blank">Ichsan Firdaus</a></strong> All rights reserved.
              </div>
            </footer>
          </div>

          <script src="{{url('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
          <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
          <script src="{{url('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
          <script src="{{url('plugins/fastclick/fastclick.min.js')}}"></script>
          <script src="{{url('dist/js/app.min.js')}}"></script>
          <script src="{{url('dist/js/demo.js')}}"></script>
          <script>
              function pushMessage(t){
                  var mes = 'Info|Implement independently';
                  $.Notify({
                      caption: mes.split("|")[0],
                      content: mes.split("|")[1],
                      type: t
                  });
              }

              $(function(){
                $('.sidebar').on('click', 'li', function(){
                      if (!$(this).hasClass('active')) {
                          $('.sidebar li').removeClass('active');
                          $(this).addClass('active');
                      }
                  })
              })
          </script>
        </body>
        @endif
</html>
