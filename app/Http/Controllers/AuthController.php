<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Login Controller
    public function LoginUser(){
        return view('Auth.login');
    }
}
