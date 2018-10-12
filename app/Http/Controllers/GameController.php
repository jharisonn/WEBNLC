<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Game2\Team2;
use App\Model\Game2\History_Taruhan;
use App\Model\Game2\History;
use App\Model\Game2\Table;
use App\Model\Game2\History_Table;
use App\Model\Game2\History_Kartu;
use App\Model\Game2\Kartu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function indexDashboard(){
      return view('game2.dashboard');
    }

    public function indexTaruhan(){
      return view('game2.taruhan');
    }

    public function historyKartu(){
      $data['kartu'] = History_Kartu::get();
      return view('game2.history_kartu',$data);
    }

    public function kartu(){
      $data['kartu'] = Kartu::get();
      return view('game2.kartu',$data);
    }

    public function buykartu(Request $request){
      // dd($request->input());
      $checkteam = Team2::where('kode_team',$request->kode_team)->first();
      if(!$checkteam){
        return back()->with('error','Kode team salah');
      }
      $checkstock = Kartu::where('id_kartu',$request->id_kartu)->first();
      // dd($checkstock);
      if($checkstock->stock_kartu == 0){
        return back()->with('error','Stock sudah habis');
      }
      else{
        $checkstock->stock_kartu = $checkstock->stock_kartu - 1;
        $checkstock->save();
        $newHistory = new History_Kartu();
        $newHistory->pembeli = $request->kode_team;
        $newHistory->admin = Auth::user()->username;
        $newHistory->save();
        return back()->with('success', "Tim ".$request->kode_team.' berhasil membeli kartu '.$checkstock->nama_kartu);
      }
    }

    public function taruhan(Request $request){
      // dd($request->input());
      $skrg = $request->point;
      $ganti = $request->taruhan;
      $history = new History_Taruhan();
      $update = Team2::where('kode_team',$request->kode_team)->first();
      if($request->kondisi == 1){
        $update->score = $update->score + $ganti;
        $update->save();
        $history->kode_team = $request->kode_team;
        $history->kondisi = 1;
        $history->score = "+".$ganti;
        $history->admin = Auth::user()->username;
        $history->save();
        return back()->with('success','Tim '.$request->kode_team.' bertambah '.$ganti.' point');
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

    public function match(){
      $data['team'] = Table::get();
      return view('game2.matchpos',$data);
    }

    public function getMatch(Request $request){
      $check = Team2::where('kode_team',$request->team)->first();
      if($check){
        $data['kode_team'] = $request->team;
      }
      else{
        return json_encode($data['0']['error'] = 'ERROR0');
      }
      $checktable = Table::where('id_player1',$request->team)->first();
      $checktable1 = Table::where('id_player2',$request->team)->first();
      if($checktable){
        return json_encode($data['1']['error'] = 'ERROR1');
      }
      if($checktable1){
        return json_encode($data['2']['error'] = 'ERROR2');
      }
      $flag=0;
      $counttable = Table::whereNull('id_player1')->orWhere('id_player1','=','')
                    ->orWhereNull('id_player2')
                    ->orWhere('id_player2','=','')
                    ->where('status','0')->get();
      // dd($counttable);
      $coba = History_Table::where('kode_team',$request->team)->get();
      $flag=0;
      if(count($coba)==0){
        $flagteam1 = 0;
        foreach ($counttable as $key => $value) {
          if($value->id_player1 == NULL || $value->id_player1 == ''){
            $value->id_player1 = $request->team;
            $value->save();
            $flagteam1 = 1;
            $newHistory = new History_Table();
            $newHistory->kode_team = $request->team;
            $newHistory->no_table = $value->no_table;
            $newHistory->save();
            $data['table'] = $value->no_table;
            return json_encode($data);
          }
          else if($value->id_player1 != NULL || $value->id_player1!= ''){
            $value->id_player2 = $request->team;
            $value->status = 2;
            $value->save();
            $flagteam1 = 1;
            $newHistory = new History_Table();
            $newHistory->kode_team = $request->team;
            $newHistory->lawan_team = $value->id_player1;
            $newHistory->no_table = $value->no_table;
            $newHistory->save();
            $newHistory2 = History_Table::where('kode_team',$value->id_player1)->where('no_table',$value->no_table)->first();
            $newHistory2->lawan_team = $request->team;
            $newHistory2->save();
            $data['table'] = $value->no_table;
            return json_encode($data);
          }
        }
        if(!$flagteam1){
          foreach ($counttable as $key => $value) {
            if($value->id_player2== NULL || $value->id_player2 == ''){
              $value->id_player2 = $request->team;
              $value->status = 2;
              $value->save();
              $newHistory = History_Table::where('kode_team',$value->id_player1)->where('no_table',$value->no_table)->first();
              $newHistory->lawan_team = $request->team;
              $newHistory->save();
              $newHistory2 = new History_Table();
              $newHistory2->kode_team = $request->team;
              $newHistory2->lawan_team = $value->id_player1;
              $newHistory2->no_table = $value->no_table;
              $newHistory2->save();
              $data['table'] = $value->no_table;
              return json_encode($data);
            }
          }
        }
      }
      else{
        $flagteam2 = 0;
        $check = DB::connection('game2')
        ->select(DB::raw('SELECT * FROM `table` WHERE `status`="0" and `table`.`no_table` not in(SELECT `history_table`.`no_table` from `history_table` where `history_table`.`kode_team` = "'.$request->team.'") '));
        $coba = Table::hydrate($check);
        // dd($coba);
        foreach ($coba as $key => $value) {
          // dd($value->id_player1);
          if($value->id_player1 == NULL || $value->id_player1 == ''){
            $value->id_player1 = $request->team;
            $value->save();
            $newHistory = new History_Table();
            $newHistory->kode_team = $request->team;
            $newHistory->no_table = $value->no_table;
            $newHistory->save();
            $data['table'] = $value->no_table;
            return json_encode($data);
          }
          else if($value->id_player1 != NULL || $value->id_player1 != ''){
            // dd('test');
            $check = DB::connection('game2')->select(DB::raw('SELECT * FROM `table` WHERE `status`="0" and `table`.`no_table` not in(SELECT `history_table`.`no_table` from `history_table` where `history_table`.`kode_team` = "'.$request->team.'") and `id_player1` NOT IN (SELECT `history_table`.`lawan_team` FROM `history_table` WHERE `history_table`.`kode_team` = "'.$request->team.'")'));
            $tambah = Table::hydrate($check);
            // dd(count($tambah));
            if(count($tambah)>0){
              foreach ($tambah as $keyj => $newv) {
                $newv->id_player2 = $request->team;
                $newv->status = 2;
                $newv->save();
                $newHistory1 = History_Table::where('kode_team',$newv->id_player1)->where('no_table',$newv->no_table)->first();
                $newHistory1->lawan_team = $request->team;
                $newHistory1->save();
                $newHistory2 = new History_Table();
                $newHistory2->kode_team = $request->team;
                $newHistory2->lawan_team = $newv->id_player1;
                $newHistory2->no_table = $newv->no_table;
                $newHistory2->save();
                $data['table'] = $newv->no_table;
                return json_encode($data);
              }
            }
            else if(count($tambah)==0){
              $check = DB::connection('game2')->select(DB::raw('SELECT * FROM `table` WHERE `status`="0" and `id_player1` NOT IN (SELECT `history_table`.`lawan_team` FROM `history_table` WHERE `history_table`.`kode_team` = "'.$request->team.'")'));
              $cuy = Table::hydrate($check);
              // dd($cuy);
              foreach ($cuy as $keyj => $newv) {
                $newv->id_player2 = $request->team;
                $newv->status = 2;
                $newv->save();
                $newHistory1 = History_Table::where('kode_team',$newv->id_player1)->where('no_table',$newv->no_table)->first();
                $newHistory1->lawan_team = $request->team;
                $newHistory1->save();
                $newHistory2 = new History_Table();
                $newHistory2->kode_team = $request->team;
                $newHistory2->lawan_team = $newv->id_player1;
                $newHistory2->no_table = $newv->no_table;
                $newHistory2->save();
                $data['table'] = $newv->no_table;
                return json_encode($data);
              }
            }
          }
        }
      }
      $data['error'] = "Silahkan tunggu 1 menit sampe 3 menit untuk mendapatkan table";
      return json_encode($data);
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

    public function matchID($id){
      $data['team'] = Table::where('no_table',$id)->first();
      return view('game2.match',$data);
    }

    public function getPost($id){
      $data['team'] = Table::where('no_table',$id)->first();
      return json_encode($data);
    }

    public function postmatchID(Request $request, $id){
      $new = Table::where('id_player1',$request->id_player1)->where('id_player2',$request->id_player2)->where('no_table',$id)->first();
      $new->id_player1 = NULL;
      $new->id_player2 = NULL;
      $new->status = 0;
      $new->save();

      $newHist = new History();
      $newHist->id_player1 = $request->id_player1;
      $newHist->id_player2 = $request->id_player2;
      $newHist->score_1 = "+".$request->score_1;
      $newHist->score_2 = "+".$request->score_2;
      $newHist->table = $id;
      $newHist->save();

      $newScore = Team2::where('kode_team',$request->id_player1)->first();
      $newScore->score = $newScore->score + $request->score_1;
      $newScore->save();

      $newScore1 = Team2::where('kode_team',$request->id_player2)->first();
      $newScore1->score = $newScore1->score + $request->score_2;
      $newScore1->save();

      return back()->with('success','Input angka sudah berhasil, silahkan memilih mengantri pos battle atau pos item atau pos taruhan');
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
