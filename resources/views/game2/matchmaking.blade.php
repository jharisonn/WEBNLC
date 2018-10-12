@extends('game2.layouts')

@section('content')
  <div class="col-md-6 col-md-offset-3">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Taruhan</h3>
      </div>
      <div class="login-box-body text-center">
        <p class="login-box-msg">
          Masukkan kode team
        </p>
        <div class="form-group">
          <input type="text" name="kode_team" class="form-control" placeholder="Kode Team" id="kode"/>
        </div>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-match" onclick="button()">Find table</button>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-match">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="titlemodal"></h4>
        </div>
        <div class="modal-body" id="form">
          <p id="message" style="font-size:25px;">Menuju ke table <span id="tablespan"></span></p>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
  function button(){
    var text = $('#kode').val();
    $.ajax({
      url : '{{url('game2/getmatch')}}',
      type : 'GET',
      dataType : 'json',
      data : {
        team : text
      },
      success : function(data){
        if(data == "ERROR1" || data == "ERROR2"){
          $('#titlemodal').html("Selesaikan permainan anda");
        }
        if(data.error){
          console.log("heeh");
          $('#titlemodal').html("Meja masih penuh");
          $('#message').show();
        }
        if(data == "ERROR"){
          $('#titlemodal').html("SALAH KODE TEAM");
          $('#message').hide();
        }
        else{
          $('#titlemodal').html(data.kode_team);
          $('#tablespan').html(data.table);
          $('#message').show();
         }
        },
      error : $('#message').hide()
    });
  }
  </script>
@endsection
