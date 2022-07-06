<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Login_adminController extends Controller
{
    public function login_admin(){
        return view('login_admin');
    }
    public function postlogin_admin(){
        
    }
    public function logout_admin(){
        Auth::logout();
        return redirect()->route('login_admin');
    }
}
