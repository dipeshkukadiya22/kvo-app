<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class medical extends Controller
{
    public function treatment(){
        return view ('Medical.treatment');
    }
}
