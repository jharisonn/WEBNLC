<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NLC 2018</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="{{asset('img/logo.png')}}" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/PNotifyBrightTheme.css')}}">
  <link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap.min.css')}}" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('css/skins/skin-yellow.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{asset('/js/PNotify.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
  			window.centerModalStack = {
  				'dir1': 'down',
  				'firstpos1': 25,
  				'modal': true,
  				'overlayClose': true
  			};
  			PNotify.defaults.width = '400px';
  		</script>
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Score</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('game1/score/A')}}"><i class="fa fa-circle-o"></i> Group A</a></li>
            <li><a href="{{url('game1/score/B')}}"><i class="fa fa-circle-o"></i> Group B</a></li>
            <li><a href="{{url('game1/score/C')}}"><i class="fa fa-circle-o"></i> Group C</a></li>
            <li><a href="{{url('game1/score/D')}}"><i class="fa fa-circle-o"></i> Group D</a></li>
          </ul>
        </li>
        <li class="active">
          <a href="{{url('game1/history')}}">
            <i class="fa fa-sticky-note-o"></i>
            <span>History</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open-o"></i>
            <span>Soal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('game1/leaderboard')}}"><i class="fa fa-circle-o"></i> Leaderboard</a></li>
            <li><a href="{{url('game1/soal/Easy')}}"><i class="fa fa-circle-o"></i> Easy</a></li>
            <li><a href="{{url('game1/soal/Medium')}}"><i class="fa fa-circle-o"></i> Medium</a></li>
            <li><a href="{{url('game1/soal/Hard')}}"><i class="fa fa-circle-o"></i> Hard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bell-o"></i>
            <span>Team view</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('game1/team/A')}}"><i class="fa fa-circle-o"></i> Group A</a></li>
            <li><a href="{{url('game1/team/B')}}"><i class="fa fa-circle-o"></i> Group B</a></li>
            <li><a href="{{url('game1/team/C')}}"><i class="fa fa-circle-o"></i> Group C</a></li>
            <li><a href="{{url('game1/team/D')}}"><i class="fa fa-circle-o"></i> Group D</a></li>
          </ul>
        </li>
        <li>
          <a href="{{url('/logout')}}">
            <i class="glyphicon glyphicon-lock"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">History</h3>
        </div>
        <div class="box-body">
          <table id="historytable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Team</th>
                <th>Nama Team</th>
                <th>Kode Soal</th>
                <th>ID Admin</th>
                <th>Kondisi</th>
                <th>Score terhadap team</th>
                <th>Score terhadap soal</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($histories as $key => $history)
                <tr>
                  <th>{{$key+1}}</th>
                  <th>{{$history->kode_team}}</th>
                  <th>{{$history->name_team}}</th>
                  <th>{{$history->kode_soal}}</th>
                  <th>{{$history->username}}</th>
                  @if ($history->condition == 1)
                    <th><small class="label label-success">BENAR</small></th>
                  @elseif ($history->condition == 2)
                    <th><small class="label label-danger">SALAH</small></th>
                  @elseif ($history->condition == 3)
                    <th><small class="label label-info">AMBIL</small></th>
                  @elseif ($history->condition == 4)
                    <th><small class="label label-info">EDIT</small></th>
                  @elseif ($history->condition == 5)
                    <th><small class="label label-info">EDIT Neleci</small></th>
                  @endif
                  <th>{{$history->score_team}}</th>
                  <th>{{$history->score_soal}}</th>
                  <th>{{$history->time}}</th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>NLC 2018</b>
    </div>
  </footer>
  </div>
  <!-- ./wrapper -->
  <!-- jQuery 3 -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button);
  </script>

  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('js/adminlte.min.js')}}"></script>
  <script>
  $(function(){
  $('#historytable').DataTable({
    'paging'   : true,
    'lengthChange' : false,
    'pageLength' : 30,
    'searching' : true,
    'ordering' : true
  });
  });

  </script>
  </body>
  </html>
