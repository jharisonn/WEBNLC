<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    public function landing(){
      if(Auth::user()){
        return redirect('/dashboard');
      }
      return view('welcome');
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
