<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
   public  function login(){
       return view('auth.login');
   }
   public function handelLogin(Request $request){
       $data=$request->only('username','password');
       if (\Auth::attempt($data)){
           //return "is Logned in Teacher";
           return redirect()->intended('home');
       }
       else if (\Auth::guard('student')->attempt($data)){
           return redirect()->intended('my');
           return View('auth.Student.home');
       }
       return back()->withInput();
   }
}
