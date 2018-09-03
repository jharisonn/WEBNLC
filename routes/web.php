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

Route::get('/', 'AdminController@landing')->name('landing');
Route::post('/login','AdminController@login')->name('login');
Route::middleware(['logon'])->group(function(){
  Route::get('/dashboard','AdminController@indexDashboard');
  Route::get('/score/{group}','AdminController@score');
  Route::get('/history','AdminController@history');
  Route::get('/soal/{id}','AdminController@soal');
  Route::get('/team','AdminController@team');
  Route::get('/logout','AdminController@logout');
});
