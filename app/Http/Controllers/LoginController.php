<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function postlogin(){
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
