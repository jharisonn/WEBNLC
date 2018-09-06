<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Model\Group;
use App\Model\History;
use App\Model\Soal;
use App\Model\Team;
use App\Model\User;

class AdminController extends Controller
{
    public function landing(){
      if(Auth::user()){
        return redirect('/dashboard');
      }
      return view('welcome');
    } //done

    public function indexDashboard(){ //done
      return view('dashboard');
    }

    public function score($group){
      $data_group = Group::where('name_group',$group)->first();
      if($data_group || $group=='a' || $group == 'b' || $group == 'c' || $group == 'd'){
        $data['groups'] = Team::where('name_group',$group)
                         ->join('group','team.id_group','=','group.id_group')
                         ->orderBy('team.score','desc')
                         ->orderBy('team.name_team','asc')
                         ->get();
        $data['groupname'] = $group;
        return view('score',$data);
      }
      return redirect('/dashboard')->with('error','Wrong page');
    } //done

    public function history(){
      $data['histories'] = History::select('name_team','team.kode_team','kode_soal','username','history.condition','history.score_team','history.time','history.score_soal')
                           ->join('team','history.id_team','=','team.id_team')
                           ->join('soal','soal.id_soal','=','history.id_soal')
                           ->join('users','users.id','=','history.id')
                           ->orderBy('history.time','desc')
                           ->get();
      //cond : 1 (benar, team score ditambah )
      //cond : 2 (salah, score soal ditambah)
      return view('history',$data);
    }

    public function ambilSoal($id,Request $request){
      if($request->kode_team == NULL){
        return back()->with('error','ISI KODE TEAM');
      }
      try {
        $check = Team::where('kode_team',$request->kode_team)->first();
        if($check == NULL){
          return back()->with('error','KODE TEAM SALAH');
        }
        if($check->score - 10 < 0){
          return back()->with('error','Neleci tidak mencukupi');
        }
        else{
          $minus_neleci = Team::where('kode_team',$request->kode_team)
                          ->update(['score' => $check->score - 10]);
        }
        if($check->id_group != Auth::user()->id_group){
          return back()->with('error','Anda salah pos!');
        }
        $check_soal = Soal::where('kode_soal',$id)->first();
        $check_history = History::where('id_soal',$check_soal->id_soal)
                         ->where('id_team',$check->id_team)
                         ->where('condition','3')
                         ->first();
        if($check_history!=NULL){
          return back()->with('error','Kode team '.$check->kode_team.' sudah pernah mengambil soal '.$id);
        }
        $history = new History();
        $history->id_team = $check->id_team;
        $history->id_soal = $check_soal->id_soal;
        $history->id = Auth::user()->id;
        $history->condition = 3;
        $history->score_team = "-10";
        $history->score_soal = "+0";
        $history->save();
      } catch (\Exception $e) {
        return json_encode([
          'status' => 500,
          'error' => $e
        ]);
      }
      return back()->with('success','Team '.$request->kode_team.' berhasil mengambil soal '.$request->kode_soal);

    }

    public function accSoal($id,Request $request){
      if($request->kode_team == NULL){
        return back()->with('error','ISI KODE TEAM');
      }
      $check_team = Team::where('kode_team',$request->kode_team)->first();
      if($check_team == NULL){
        return back()->with('error','SALAH KODE TEAM');
      }
      if($check_team->id_group != Auth::user()->id_group){
        return back()->with('error','Anda salah pos!');
      }
      $check_soal = Soal::where('kode_soal',$id)->first();
      $check_history = History::where('id_team',$check_team->id_team)
                      ->where('id_soal',$check_soal->id_soal)
                      ->first();
      if($check_history==NULL){
        return back()->with('error','Team '.$request->kode_team.' belum pernah mengambil soal '.$id);
      }
      else{
        if($check_history->condition == 1 || $check_history->condition == 2){
          return back()->with('error','Team '.$request->kode_team.' sudah pernah mengambil soal '.$id);
        }
        else{
          $update_team = Team::where('kode_team',$request->kode_team)
                        ->update([
                          'score' => (int)$check_team->score + (int)$check_soal->score_soal
                        ]);
          if($check_soal->difficulty == 'E'){
            if($check_soal->score_soal > 50){
              $tes = (int)$check_soal->score_soal - (int)$check_soal->awal_score;
              $update = Soal::where('kode_soal',$id)
                        ->update([
                          'score_soal' => (int)$check_soal->awal_score
                        ]);
            }
            else if((int)$check_soal->score_soal-1 < 15){
              $tes = (int)$check_soal->score_soal - (int)15;
              $update = Soal::where('kode_soal',$id)
                        ->update([
                          'score_soal' => 15
                        ]);
            }
            else{
              $tes = 1;
            }
          }
          else if($check_soal->difficulty == 'M'){
            if($check_soal->score_soal > 90){
              $tes = (int)$check_soal->score_soal - (int)$check_soal->awal_score;
              $update = Soal::where('kode_soal',$id)
                        ->update([
                          'score_soal' => (int)$check_soal->awal_score
                        ]);
            }
            else if((int)$check_soal->score_soal-2 < 15){
              $tes = (int)$check_soal->score_soal - (int)15;
              $update = Soal::where('kode_soal',$id)
                        ->update([
                          'score_soal' => 15
                        ]);
            }
            else{
              $tes = 2;
            }
          }
          else if($check_soal->difficulty == 'H'){
            if($check_soal->score_soal > 140){
              $tes = (int)$check_soal->score_soal - (int)$check_soal->awal_score;
              $update = Soal::where('kode_soal',$id)
                        ->update([
                          'score_soal' => (int)$check_soal->awal_score
                        ]);
            }
            else if((int)$check_soal->score_soal-4 < 15){
              $tes = (int)$check_soal->score_soal - (int)15;
              $update = Soal::where('kode_soal',$id)
                        ->update([
                          'score_soal' => 15
                        ]);
            }
            else {
              $tes = 4;
            }
          }
          $update = Soal::where('kode_soal',$id)
                    ->update([
                      'score_soal' => (int)$check_soal->score_soal - $tes
                    ]);
          try {
            $history = new History();
            $history->id_team = $check_team->id_team;
            $history->id_soal = $check_soal->id_soal;
            $history->id = Auth::user()->id;
            $history->condition = 1;
            $history->score_team = "+".$check_soal->score_soal;
            $history->score_soal = "-".$tes;
            $history->save();
          } catch (\Exception $e) {
            return json_encode([
              'status' => 500,
              'error' => $e
            ]);
          }
          return back()->with('success','Team '.$request->kode_team.' berhasil menjawab soal '.$id.' dengan benar');

        }
      }
    }

    public function wrongSoal($id,Request $request){
      if($request->kode_team == NULL){
        return back()->with('error','ISI KODE TEAM');
      }
      $check_team = Team::where('kode_team',$request->kode_team)->first();
      if($check_team == NULL){
        return back()->with('error','SALAH KODE TEAM');
      }
      if($check_team->id_group != Auth::user()->id_group){
        return back()->with('error','Salah pos');
      }
      $check_soal = Soal::where('kode_soal',$id)->first();
      $check_history = History::where('id_team',$check_team->id_team)
                       ->where('id_soal',$check_soal->id_soal)
                       ->first();
      if($check_history == NULL){
        return back()->with('error','Team '.$request->kode_team.' belum pernah mengambil soal '.$id);
      }
      else{
        if($check_history->condition == 1 || $check_history->condition == 2){
          return back()->with('error','Team '.$request->kode_team.' sudah pernah mengambil soal '.$id);
        }
        else{
          if($check_soal->difficulty == 'E'){
            $tes = 1;
          }
          else if($check_soal->difficulty == 'M'){
            $tes = 2;
          }
          else if($check_soal->difficulty == 'H'){
            $tes = 4;
          }
          $update = Soal::where('kode_soal',$id)
                    ->update([
                      'score_soal' => (int)$check_soal->score_soal + $tes
                    ]);
        }
        try {
          $history = new History();
          $history->id_team = $check_team->id_team;
          $history->id_soal = $check_soal->id_soal;
          $history->id = Auth::user()->id;
          $history->condition = 2;
          $history->score_team = "+0";
          $history->score_soal = "+".$tes;
          $history->save();
        } catch (\Exception $e) {
          return json_encode([
            'status' => 500,
            'error' => $e
          ]);
        }
        return back()->with('success','Team '.$request->kode_team.' telah salah menjawab jawaban soal '.$id);
      }
    }

    public function createIndex(){
      return view('create_soal');
    }

    public function createSoal(Request $request){
      if($request->teks_soal == NULL){
        return redirect('/create/soal')->with('error','Isi Soal!');
      }
      $check = Soal::where('difficulty',$request->difficulty)->orderBy('kode_soal','DESC')->first();
      $num = filter_var($check->kode_soal,FILTER_SANITIZE_NUMBER_INT);
      if($request->difficulty == 'E'){
        $score = 30;
      }
      else if($request->difficulty == 'M'){
        $score = 50;
      }
      else if($request->difficulty == 'H'){
        $score = 90;
      }
      $test = (int)$num;
      $test++;
      try {
        $soal = new Soal();
        $soal->kode_soal = $request->difficulty.'0'.$test;
        $soal->score_soal = $score;
        $soal->awal_score = $score;
        $soal->difficulty = $request->difficulty;
        $soal->teks_soal = $request->teks_soal;
        $soal->save();
      } catch (\Exception $e) {
        return json_encode([
          'status' => 500,
          'error' => $e
        ]);
      }
      return redirect('/dashboard')->with('success','Soal berhasil ditambahkan');

    }

    public function soal($id){ //done
      if($id=='Easy' || $id=='Medium' || $id=='Hard'){
        if($id=='Easy'){
          $data['soals'] = Soal::where('difficulty','E')->get();
          $data['diff'] = 'Easy';
        }
        else if($id=='Medium'){
          $data['soals'] = Soal::where('difficulty','M')->get();
          $data['diff'] = 'Medium';
        }
        else{
          $data['soals'] = Soal::where('difficulty','H')->get();
          $data['diff'] = 'Hard';
        }
        return view('soal',$data);
      }
      return redirect('dashboard')->with('error','Salah page');
    }

    public function team($group){
      $data_group = Group::where('name_group',$group)->first();
      if($data_group || $group=='a' || $group == 'b' || $group == 'c' || $group == 'd'){
        $data['teams'] =  Team::where('name_group',$group)
                          ->join('group','team.id_group','=','group.id_group')
                          ->get();
        $data['groupname'] = $group;
        return view('team',$data);
      }
      return redirect('/dashboard')->with('error','Salah group');
    }

    public function editTeam($id,Request $request){
      $check_team = Team::where('kode_team',$id)->first();
      if($check_team == NULL){
        return back()->with('error','Salah kode team');
      }
      if($request->edit_score < $check_team->score){
        $tanda = "-";
        $change= $check_team->score - $request->edit_score;
      }
      else{
        $tanda = "+";
        $change = $request->edit_score - $check_team->score;
      }
      $update_team = Team::where('kode_team',$id)
                ->update([
                  'score' => $request->edit_score
                ]);
      $history = new History();
      $history->id_team = $check_team->id_team;
      $history->id_soal = '100';
      $history->id = Auth::user()->id;
      $history->condition = 4;
      $history->score_team = $tanda.(string)$change;
      $history->score_soal = "+0";
      $history->save();
      return back()->with('success','Tim '.$check_team->kode_team.' berhasil diubah scorenya menjadi '.$request->edit_score);
    }

    public function leaderboard(){ //done backend
      $data['easiest'] = Soal::where('difficulty','E')->orderBy('score_soal','desc')->get();
      $data['mediums'] = Soal::where('difficulty','M')->orderBy('score_soal','desc')->get();
      $data['harder'] = Soal::where('difficulty','H')->orderBy('score_soal','desc')->get();
      return view('leaderboard',$data);
    }

    public function login(Request $request){
      $rules = [
        'username' => 'required',
        'password' => 'required',
      ];
      $messages = [
        'username.required' => 'Username field is empty',
        'password.required' => 'Password field is empty',
      ];
      $validator = Validator::make($request->all(),$rules,$messages);
      if($validator->fails()){
        return redirect('/')->withErrors($validator)->withInput();
      }
      if(Auth::attempt(['username' => $request->input('username'),
      'password' => $request->input('password')])){
        return redirect('/dashboard'); //redirect to dashboard
      }
      return redirect('/')->with('error','Username atau password salah'); //redirect false credentials
    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
