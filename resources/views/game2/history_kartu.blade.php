@extends('game2.layouts')

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">History Kartu</h3>
      </div>
      <div class="box-body">
        <table id="grouptable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Team</th>
              <th>Admin</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kartu as $key => $value)
              <tr>
                <th>{{$key+1}}</th>
                <th>{{$value->pembeli}}</th>
                <th>{{$value->admin}}</th>
                <th>{{$value->time}}</th>
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
$('#grouptable').DataTable({
  'paging'   : true,
  'lengthChange' : false,
  'pageLength' : 30,
  'searching' : true,
  'ordering' : true
});
});</script>
@endsection
