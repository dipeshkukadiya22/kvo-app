<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    // Religious Donation
    public function religious_donation_report(){
        return view('Reports.religious_donation_report');
    }
}
