@extends('game2.layouts')

@section('content')
<section class="content">
  <div class="row">
    @foreach ($team as $key => $value)
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{url('game2/match/'.$value->no_table)}}"><span class="info-box-icon bg-yellow"><i class="fa fa-flag-o"></i></span></a>
          <div class="info-box-content">
            <span class="info-box-text">Pos {{$value->no_table}}</span>
            <span class="info-box-number">{{$value->id_player1}}</span>
            <span class="info-box-number">VS</span>
            <span class="info-box-number">{{$value->id_player2}}</span>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection

@section('js')
  <script>
  window.onload = start();
  var hey;
  function start(){
    hey = setInterval('window.location.reload()',3000);
  }
  </script>
@endsection
