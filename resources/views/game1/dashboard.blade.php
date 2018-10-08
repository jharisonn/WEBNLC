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
        <li>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Score
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <p>Group A</p>
            </div>
            <a href="{{url('game1/score/A')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <p>Group B</p>
            </div>
            <a href="{{url('game1/score/B')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>Group C</p>
            </div>
            <a href="{{url('game1/score/C')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <p>Group D</p>
            </div>
            <a href="{{url('game1/score/D')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <h3>History</h3>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>History team</p>
            </div>
            <a href="{{url('game1/history')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
      <h3>Soal</h3>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="icon">
              <i class="fa fa-trophy"></i>
            </div>
            <div class="inner">
              <h3>Soal</h3>
              <p>Leaderboard</p>
            </div>
            <a href="{{url('game1/leaderboard')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <p>Easy</p>
            </div>
            <a href="{{url('game1/soal/Easy')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <p>Medium</p>
            </div>
            <a href="{{url('game1/soal/Medium')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>Hard</p>
            </div>
            <a href="{{url('game1/soal/Hard')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        {{-- harus tanya --}}
      </div>
      <h3>Team (Khusus untuk edit score)</h3>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <p>Group A</p>
            </div>
            <a href="{{url('game1/team/A')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <p>Group B</p>
            </div>
            <a href="{{url('game1/team/B')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>Group C</p>
            </div>
            <a href="{{url('game1/team/C')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <p>Group D</p>
            </div>
            <a href="{{url('game1/team/D')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
    @if($errors->any())
			<script type="text/javascript">
			@foreach($errors->all() as $error)
				PNotify.error({
					title: 'Error',
					text: '{{$error}}',
					delay:4000
				});
			@endforeach
			</script>
			@endif
		@if(session('error'))
			<script>
				PNotify.error({
					title:'Error',
					text : "{{session('error')}}",
					delay : 4000
				});
			</script>
		@endif
		@if(session('success'))
			<script>
				PNotify.success({
					title:'Success',
					text : "{{session('success')}}",
					delay : 4000
				});
			</script>
		@endif
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script> --}}
</body>
</html>
