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
Route::middleware(['logon'])->group(function(){
  Route::get('/dashboard','AdminController@indexDashboard')->name('dashboard'); //done 90% butuh feedback
  Route::get('/score/{group}','AdminController@score'); //done need feedback
  Route::get('/history','AdminController@history'); //done butuh feedback
  Route::get('/leaderboard','AdminController@leaderboard'); //done butuh feedback
  Route::get('/soal/{id}','AdminController@soal'); //done butuh feedback
  Route::get('/team/{group}','AdminController@team'); //done
  Route::post('/edit/team/{id}','AdminController@editTeam'); //done
  Route::post('/ambil/{id}','AdminController@ambilSoal'); //done
  Route::post('/acc/{id}','AdminController@accSoal'); //done
  Route::post('/wrong/{id}','AdminController@wrongSoal');//done
  Route::get('/worldmap','AdminController@worldmap'); //WIP!
  Route::get('/logout','AdminController@logout'); //done masbro
});
