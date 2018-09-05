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
      $data['histories'] = History::select('name_team','kode_soal','username','history.condition','history.score_team','history.time','history.score_soal')
                           ->join('team','history.id_team','=','team.id_team')
                           ->join('soal','soal.id_soal','=','history.id_soal')
                           ->join('users','users.id','=','history.id')
                           ->orderBy('history.time','desc')
                           ->get();
      //cond : 1 (benar, team score ditambah )
      //cond : 2 (salah, score soal ditambah)
      return view('history',$data);
    }

    public function soal($id){ //done
      if($id=='Easy' || $id=='Medium' || $id=='Hard'){
        if($id=='Easy'){
          $data['soals'] = Soal::where('difficulty','E')->get();
        }
        else if($id=='Medium'){
          $data['soals'] = Soal::where('difficulty','M')->get();
        }
        else{
          $data['soals'] = Soal::where('difficulty','H')->get();
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
        return view('team',$data);
      }
      return redirect('/dashboard')->with('error','Salah group');
    }

    public function leaderboard(){ //done backend
      $data['soals'] = Soal::orderBy('score_soal','desc')->get();
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
