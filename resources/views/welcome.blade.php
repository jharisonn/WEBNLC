<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>NLC 2018</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="grey lighten-3">
  <header>

      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
          <div class="container-fluid">

              <!-- Brand -->
              <a class="navbar-brand waves-effect" href="{{route('landing')}}" target="_blank">
                  <strong class="blue-text">NLC 2018</strong>
              </a>

              

          </div>
      </nav>
      <!-- Navbar -->

      <!-- Sidebar -->
      <div class="sidebar-fixed position-fixed">

          <a class="logo-wrapper waves-effect">
              <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
          </a>

          <div class="list-group list-group-flush">
              <a href="#" class="list-group-item active waves-effect">
                  <i class="fa fa-pie-chart mr-3"></i>Dashboard
              </a>
              <a href="#" class="list-group-item list-group-item-action waves-effect">
                  <i class="fa fa-user mr-3"></i>Profile</a>
              <a href="#" class="list-group-item list-group-item-action waves-effect">
                  <i class="fa fa-table mr-3"></i>Tables</a>
              <a href="#" class="list-group-item list-group-item-action waves-effect">
                  <i class="fa fa-map mr-3"></i>Maps</a>
              <a href="#" class="list-group-item list-group-item-action waves-effect">
                  <i class="fa fa-money mr-3"></i>Orders</a>
          </div>

      </div>
      <!-- Sidebar -->

  </header>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
</body>
</html>
