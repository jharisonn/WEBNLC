@extends('game2.layouts')

@section('content')
  <section class="content">
    <div class="row">
      @foreach ($kartu as $key => $value)
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-flag-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{$value->nama_kartu}}</span>
              <span class="info-box-number">Stock : {{$value->stock_kartu}}</span>
            </div>
            <div class="input-group-btn" style="margin-top:10px;">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ambil-{{$key}}">Ambil</button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
  @foreach ($kartu as $key => $value)
    <div class="modal fade" id="ambil-{{$key}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="startTimer()">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ambil {{$value->nama_kartu}}</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('game2/buykartu/')}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" value="{{$value->id_kartu}}" name="id_kartu"/>
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

@endsection

@section('js')

@endsection
