<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AdminController@landing')->name('landing'); //done
Route::post('/login','AdminController@login')->name('login'); //done
Route::prefix('game1')->group(function(){
  Route::middleware(['logon'])->group(function(){
    Route::get('/dashboard','AdminController@indexDashboard')->name('dashboard'); //done 90% butuh feedback
    Route::get('/score/{group}','AdminController@score'); //done need feedback
    Route::get('/history','AdminController@history'); //done butuh feedback
    Route::get('/leaderboard','AdminController@leaderboard'); //done butuh feedback
    Route::get('/soal/{id}','AdminController@soal'); //done butuh feedback
    Route::get('/team/{group}','AdminController@team'); //done
    Route::post('/edit/team/{id}','AdminController@editTeam'); //done
    Route::post('/editNel/team/{id}','AdminController@editNelTeam');
    Route::post('/buy/team/{id}','AdminController@buyTeam'); //done
    Route::post('/ambil/{id}','AdminController@ambilSoal'); //done
    Route::post('/acc/{id}','AdminController@accSoal'); //done
    Route::post('/wrong/{id}','AdminController@wrongSoal');//done
  });
});
Route::prefix('game2')->group(function(){
  Route::middleware(['logon'])->group(function(){
    Route::get('/dashboard','GameController@indexDashboard'); //done minus content
    Route::get('/taruhan','GameController@indexTaruhan');
    Route::post('/taruhan','GameController@taruhan');
    Route::get('/getTeam','GameController@getteam');
    Route::get('/leaderboard','GameController@leaderboard');
    Route::get('/matchmaking','GameController@matchmaking');
    Route::get('/getmatch','GameController@getMatch');
    Route::get('/match','GameController@match');
    Route::get('/match/{id}','GameController@matchID');
    Route::post('/match/{id}','GameController@postmatchID');
    Route::get('/getPos/{id}','GameController@getPost');
    Route::get('/history','GameController@history');
    Route::get('/history_taruhan','GameController@historyTaruhan');
    Route::get('/history_kartu','GameController@historyKartu');
    Route::get('/kartu','GameController@kartu');
    Route::post('/buykartu','GameController@buykartu');
  });
});
Route::get('/logout','AdminController@logout'); //done masbro
