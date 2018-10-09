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
        <li class="treeview active menu-open">
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
          <h3 class="box-title">Group {{$groupname}}</h3>
        </div>
        <div class="box-body">
          <table id="grouptable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Team</th>
                <th>Kode Team</th>
                <th>Neleci</th>
                <th>Score</th>
                <th>Edit Score</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teams as $key => $group)
                <tr>
                  <th>{{$key+1}}</th>
                  <th>{{$group->name_team}}</th>
                  <th>{{$group->kode_team}}</th>
                  <th>{{$group->neleci}}</th>
                  <th>{{$group->score}}</th>
                  <th><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-{{$group->id_team}}">Edit</small>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#buy-{{$group->id_team}}" style="margin-left:5px;">Buy</small></th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @foreach ($teams as $key => $group)
    <div class="modal fade" id="edit-{{$group->id_team}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit score team {{$group->kode_team}}</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('game1/edit/team/'.$group->kode_team)}}" method="post">
              {{ csrf_field() }}
              Score awal: <input type="text" class="form-control" name="score_awal" value="{{$group->score}}" disabled />
              Score yang diganti : <input type="text" class="form-control" name="edit_score" />
              <div class="modal-footer">
                <button type="submit" class="btn btn-default pull-left">Ganti!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  @foreach ($teams as $key => $group)
    <div class="modal fade" id="buy-{{$group->id_team}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Beli pasukan untuk {{$group->kode_team}}</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('game1/buy/team/'.$group->kode_team)}}" method="post">
              {{ csrf_field() }}
              Score awal: <input type="text" class="form-control" name="score_awal" value="{{$group->score}}" disabled />


                <select name="buy" class="form-control" style="margin-top:10px;">
                  <option value="pas1">Level 1</option>
                  <option value="pas2">Level 2</option>
                  <option value="pas3">Level 3</option>
                </select>

              <div class="modal-footer">
                <button type="submit" class="btn btn-default pull-left">Ganti!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
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
  $('#grouptable').DataTable({
    'paging'   : false,
    'lengthChange' : false,
    'searching' : true,
    'ordering' : false
  });
});

</script>
</body>
</html>
