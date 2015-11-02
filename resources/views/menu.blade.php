<header class="main-header">
  <a href="{{url('/')}}" class="logo">
    <span class="logo-mini"><b>P</b>X</span>
    <span class="logo-lg"><b>Project</b>X</span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="{{url('logout')}}" style="font-size: 18px;" class="dropdown-toggle">
            <span class="hidden-xxs"><i class="fa fa-sign-out"></i> Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{url('images/'.Auth::user()->foto)}}" class="img-circle" alt="User Image" style="max-height: 50px;">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        @if(Auth::user()->role == "")
          -
        @else
        <small>{{ Auth::user()->role }}</small>
        @endif
      </div>
    </div>
    <script>
    $(function() {
      if( location.pathname.split("/")[1] == ''){

      }
      else{
        $('ul.sidebar li a[href^="http://localhost:8000/' + location.pathname.split("/")[1] + '"]').parent().addClass('active');
      }
    });
    </script>
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder-open"></i> <span>Projects</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('project')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('project/show')}}"><i class="fa fa-list"></i> Project Tables</a></li>
        </ul>
      </li>
      <li>
        <a href="{{url('user')}}">
          <i class="fa fa-user"></i> <span>Users</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gear"></i> <span>Account</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          @if(Auth::user()->gender == "Male")
            <li><a href="{{url('user/profile/'.Auth::user()->id)}}"><i class="fa fa-male"></i> {{ Auth::user()->name }}</a></li>
          @elseif(Auth::user()->gender == "Female")
            <li><a href="{{url('user/profile/'.Auth::user()->id)}}"><i class="fa fa-female"></i> {{ Auth::user()->name }}</a></li>
          @endif
          <li><a href="{{url('auth/logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>
