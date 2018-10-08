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
        <li class="treeview active open-menu">
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
    <section class="content-header">
      <h1>{{$diff}}</h1>
      <ol class="breadcrumb">
        <li>
          Refresh in <span id="count">5</span>
        </li>

      </ol>
    </section>
    <section class="content">
      <div class="row">
          @foreach ($soals as $key => $soal)
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                @if($soal->difficulty == "E")
                <span class="info-box-icon bg-blue">
                @elseif($soal->difficulty == "M")
                <span class="info-box-icon bg-green">
                @elseif($soal->difficulty == "H")
                <span class="info-box-icon bg-yellow">
                @endif
                <i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">{{$soal->kode_soal}}</span>
                  <span class="info-box-number" id="load-{{$key+1}}">Score : {{$soal->score_soal}}</span>
                  <div class="input-group-btn" style="margin-top:10px;">
                    <button type="button" style="margin-right:15px;" class="btn btn-default" data-toggle="modal" data-target="#ambil-{{$soal->kode_soal}}" onclick="stopTimer()">Ambil</button>
                    <button type="button" style="margin-right:15px;" class="btn btn-success" data-toggle="modal" data-target="#benar-{{$soal->kode_soal}}" onclick="stopTimer()">Benar</button>
                    <button type="button" style="margin-right:15px;" class="btn btn-danger" data-toggle="modal" data-target="#salah-{{$soal->kode_soal}}" onclick="stopTimer()">Salah</button>
                  </div>

                </div>

            </div>
            </div>
          @endforeach
      </div>
    </section>
    </section>
  </div>
  @foreach ($soals as $soal)
    <div class="modal fade" id="ambil-{{$soal->kode_soal}}" onclick="startTimer()">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="startTimer()">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ambil {{$soal->kode_soal}}</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('game1/ambil/'.$soal->kode_soal)}}" method="post">
              {{ csrf_field() }}
              Kode Soal : <input type="text" class="form-control" name="kode_soal" value="{{$soal->kode_soal}}" disabled />
              Kode Team : <input type="text" class="form-control" name="kode_team"/>
              <div class="modal-footer">
                <button type="submit" class="btn btn-default pull-left">Ambil</button>
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  @foreach ($soals as $soal)
    <div class="modal fade" id="benar-{{$soal->kode_soal}}" onclick="startTimer()">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="startTimer()">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Benar {{$soal->kode_soal}}</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('game1/acc/'.$soal->kode_soal)}}" method="post">
              {{ csrf_field() }}
              Kode Soal : <input type="text" value="{{$soal->kode_soal}}" class="form-control" name="kode_soal" disabled />
              Kode Team : <input type="text" class="form-control" name="kode_team"/>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success pull-left">Benar</button>
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  @foreach ($soals as $soal)
    <div class="modal fade" id="salah-{{$soal->kode_soal}}" onclick="startTimer()">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="startTimer()">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Salah {{$soal->kode_soal}}</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('game1/wrong/'.$soal->kode_soal)}}" method="post">
              {{ csrf_field() }}
              Kode Soal : <input type="text" value="{{$soal->kode_soal}}" class="form-control" name="kode_soal" disabled />
              Kode Team : <input type="text" class="form-control" name="kode_team"/>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger pull-left">Salah</button>
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>NLC 2018</b>
    </div>
  </footer>
  </div>
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
  <script>
  window.onload = start();
  var refresh,countdown;
  function start(){
    refresh = setInterval('window.location.reload()',5000);
    var counter = 5;
    countdown = setInterval(function(){
      counter--;
      if(counter>=0){
        span = document.getElementById('count');
        span.innerHTML = counter;
      }
    }, 1000);
  }
  function stopTimer(){
    clearInterval(refresh);
    clearInterval(countdown);
  }
  function startTimer(){
    start();
  }
  </script>
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
  <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
  <script>
  $('.soals').slimScroll({
    height : '200px',
    railVisible : true,
    railColor : '#f39c12'
  });
  </script>
  </body>
  </html>
