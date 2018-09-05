@foreach ($histories as $history)
{{$history->name_team}} <br />
{{$history->kode_soal}} <br />
{{$history->username}}
@if ($history->condition == '1')
  <p style="color:green">Benar</p>
@else
<p style="color:red">Salah</p>
@endif
{{$history->score_team}} <br />
{{$history->score_soal}}<br />
{{$history->time}}<br />
@endforeach
