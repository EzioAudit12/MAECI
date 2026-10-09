<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
       public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function verify(){
        return view('verify-code');
    }
}
