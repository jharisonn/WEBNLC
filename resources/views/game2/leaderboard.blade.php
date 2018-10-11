@extends('game2.layouts')

@section('content')
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Leaderboard</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered" id="leaderboard">
              <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Kode Team</th>
                <th>Nama Team</th>
                <th>Score</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($team as $key => $value)
                <tr>
                  <th>{{$key+1}}</th>
                  <th>{{$value->kode_team}}</th>
                  <th>{{$value->name_team}}</th>
                  <th>{{$value->score}}</th>
                </tr>
              @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>

@endsection

@section('js')
<script>
$(function(){
  $('#leaderboard').DataTable({
    'paging'   : true,
    'lengthChange' : false,
    'searching' : true,
    'ordering' : false,
    'pageLength' : 15
  });
});</script>
@endsection
