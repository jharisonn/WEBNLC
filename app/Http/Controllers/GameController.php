<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Game2\Team2;
use App\Model\Game2\History_Taruhan;
use App\Model\Game2\History;
use App\Model\Game2\Table;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function indexDashboard(){
      return view('game2.dashboard');
    }

    public function indexTaruhan(){
      return view('game2.taruhan');
    }

    public function taruhan(Request $request){
      // dd($request->input());
      $skrg = $request->point;
      $ganti = $request->taruhan;
      $history = new History_Taruhan();
      if($skrg < $ganti){
        return back()->with('error','Point tidak mencukupi');
      }
      $update = Team2::where('kode_team',$request->kode_team)->first();
      if($request->kondisi == 1){
        $update->score = $update->score + (2*$ganti);
        $update->save();
        $history->kode_team = $request->kode_team;
        $history->kondisi = 1;
        $history->score = "+".(2*$ganti);
        $history->admin = Auth::user()->username;
        $history->save();
        return back()->with('success','Tim '.$request->kode_team.' bertambah '.(2*$ganti).' point');
      }
      else if($request->kondisi == 0){
        $update->score = $update->score - $ganti;
        $update->save();
        $history->kode_team = $request->kode_team;
        $history->kondisi = 0;
        $history->score = "-".($ganti);
        $history->admin = Auth::user()->username;
        $history->save();
        return back()->with('success','Tim '.$request->kode_team.' berkurang '.($ganti).' point');
      }
      else {
        return back()->with('error','Salah input');
      }

    }

    public function getTeam(Request $request){
      $data['team'] = Team2::where('kode_team',$request->team)->first();
      return json_encode($data);
    }

    public function leaderboard(){
      $data['team'] = Team2::orderBy('score','desc')->get();
      return view('game2.leaderboard',$data);
    }

    public function matchmaking(){
      return view('game2.matchmaking');
    }

    public function match(){

    }

    public function history(){
      $data['history'] = History::orderBy('created','desc')->get();
      return view('game2.history',$data);
    }

    public function historyTaruhan(){
      $data['history'] = History_Taruhan::orderBy('created','desc')->get();
      return view('game2.history_taruhan',$data);
    }

}
