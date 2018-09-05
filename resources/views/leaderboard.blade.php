@foreach ($soals as $soal)
{{$soal->kode_soal}} <br />
{{$soal->score_soal}} <br />
{{$soal->difficulty}} <br /> <br />

@endforeach
