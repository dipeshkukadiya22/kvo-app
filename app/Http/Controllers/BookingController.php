<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // RoomBooking Controller 
    public function RoomBooking(){
        return view ('Booking.room-booking');
    }
}
