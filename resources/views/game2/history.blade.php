@extends('game2.layouts')

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">History</h3>
      </div>
      <div class="box-body">
        <table id="grouptable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Team 1</th>
              <th>Kode Team 2</th>
              <th>Score terhadap Team 1</th>
              <th>Score terhadap Team 2</th>
              <th>Table</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($history as $key => $value)
              <tr>
                <th>{{$key+1}}</th>
                <th>{{$value->id_player1}}</th>
                <th>{{$value->id_player2}}</th>
                <th>{{$value->score_1}}</th>
                <th>{{$value->score_2}}</th>
                <th>{{$value->table}}</th>
                <th>{{$value->created}}</th>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('js')
@endsection
