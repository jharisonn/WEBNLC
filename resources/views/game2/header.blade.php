<header class="main-header">
  <!-- Logo -->
  <a href="{{route('dashboard')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>NLC</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>NLC</b>2018</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="messages-menu">
          <a href="#">
            Username:
          </a>
        </li>
        <li class="user user-menu">
          <a href="#">
            <span class="hidden-xs">{{Auth::user()->username}}</span>
          </a>
        </li>
        <li class="messages-menu">
          <a href="#">
            NLC2018
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>
