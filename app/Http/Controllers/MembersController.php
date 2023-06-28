<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    // View Members
    public function ViewMembers(){
        return view('Booking.view-members');
    }
}
