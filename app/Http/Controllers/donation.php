<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class donation extends Controller
{
    // Donation Controller 
    public function Religious_Donation(){
        return view ('Donation.Religious_Donation');
    }
    
    public function Community_Donation(){
        return view ('Donation.Community_Donation');
    }

    public function Donation_Receipt(){
        return view ('Donation.Donation_Receipt');
    }
}
