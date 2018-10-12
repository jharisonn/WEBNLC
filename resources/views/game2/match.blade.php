@extends('game2.layouts')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Player 1</h3>
          </div>
          <form method="post" action="{{url()->current()}}" id="postMatch">
            {{ csrf_field() }}
          <div class="box-body">

              <div class="form-group">
                Team 1:
                <input type="text" name="id_player1" class="form-control" id="id_player1" value="{{$team->id_player1}}" readonly />
                Score yang ditambahkan:
                <input type="number" name="score_1" class="form-control"/>
              </div>

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Player 2</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              Team 2:
              <input type="text" name="id_player2" id="id_player2" value="{{$team->id_player2}}" class="form-control" readonly />
              Score yang ditambahkan:
              <input type="number" name="score_2" class="form-control"/>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-success" form="postMatch">Submit!</button>
    </div>
  </section>
@endsection

@section('js')
<script>
window.onload = start();
var hey;
function start(){
  hey = setInterval(function(){
    if(!$('#id_player1').val() || !$('#id_player2').val()){
      $.ajax({
        url : '{{url('game2/getPos/'.$team->no_table)}}',
        dataType : 'json',
        type : 'GET',
        success : function(data){
          if(data.team.id_player1){
            $('#id_player1').val(data.team.id_player1);
          }
          if(data.team.id_player2){
            $('#id_player2').val(data.team.id_player2);
          }
        }
      });
      if($('#id_player1').val() && $('#id_player2').val()){
        clearInterval(hey);
      }
    }
  },3000);



}
</script>
@endsection
