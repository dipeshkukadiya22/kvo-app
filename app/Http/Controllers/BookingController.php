<?php

namespace App\Http\Controllers;
use App\Models\personal_details;
use App\Models\room_details;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        return view ('Booking.room-booking');
    }

    public function RoomBooking(Request $req)
    {
        $details = new personal_details();
        $details->name = $req->name;
        $details-> email = $req->email;
        $details-> phone_no = $req->phone_no;
        $details-> age = $req->age;
        $details-> address=$req->address;
        $details-> dob=$req->dob;
        $details-> community=$req->community;
        $details-> city=$req->city;
        $details-> gender=$req->gender;
        $details->save(); 

        $booking = new room_details();
        $booking->no_of_person=$req->no_of_person;
        $booking->check_in_date=$req->check_in_date;
        $booking->room_list=$req->room_list;
        $booking->room_facility=$req->room_facility;
        $booking->amount=$req->amount;
        $booking->id_proof=$req->id_proof;
        $booking->deposite_no=$req->deposite_no;
        $booking->door_mt_no= $req->door_mt_no;
        $booking->deposite_rs=$req->deposite_rs;
        $booking->rs_word=$req->rs_word;
        $booking->save();

        $m_details = new member_details();
        $m_details->full_name=$req->full_name;
        $m_details->age=$req->age;
        $m_details->gender=$req->gender;
        $m_details->relation=$req->relation;
        $m_details->save();
        return view ('Booking.room-booking');

    }

    public function add_member(Request $req){
        $member = new add_members();
        $member->name = $req->name;
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = $req->city;
        $member->address = $req->address;
        $member->save();
        return view('room-booking');
    }
    

    

    

    // RoomList
    public function RoomList(){
        return view ('Booking.room-list');
    }
}
