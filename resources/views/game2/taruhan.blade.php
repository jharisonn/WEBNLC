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
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-find" onclick="button()">Pilih</button>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-find">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titlemodal"></h4>
      </div>
      <div class="modal-body" id="form">
        <p id="message"></p>
        <form action="{{url('game2/taruhan/')}}" method="post" id="forminput">
          {{ csrf_field() }}
          Kode Team : <input type="text" class="form-control" name="kode_team" id="modalkode" readonly/>
          Point sekarang : <input type="text" class="form-control" name="point" id="pointskrg" readonly/>
          Point berubah : <input type="number" class="form-control" name="taruhan" id="pointganti" />
          Kondisi : <select class="form-control form-group" name="kondisi">
            <option value="1">Tambah</option>
            <option value="0">Kurang</option>
          </select>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default pull-left" id="sub" form="forminput">Taruhan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
  <script>
  $('#form').hide();
  function button(){
    var text = $('#kode').val();
    $.ajax({
      url : '{{url('game2/getTeam')}}',
      type : 'GET',
      dataType : 'json',
      data : {
        team : text
      },
      success : function(data){
          $('#titlemodal').html(data.team.kode_team);
          $('#modalkode').val(data.team.kode_team);
          $('#pointskrg').val(data.team.score);

          $('#form').show();
        },
      error : $('#titlemodal').html("Salah kode team")
    });
  }
  </script>
@endsection
