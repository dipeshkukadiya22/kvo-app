<?php

namespace App\Http\Controllers;
use App\Models\personal_details;
use App\Models\room_details;
use App\Models\add_members;
use App\Models\member_details;
use App\Models\add_room;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $p_details=personal_details::with('member')->get();
        $m_data=add_members::all();
        $p_id=add_members::get()->last()->p_id;
        return view ('Booking.room-booking',['p_details'=>$p_details,'m_data'=>$m_data,'p_id'=>$p_id]);
       
    }

    public function RoomBooking(Request $req)
    {
        //dd($req->toArray());
        $m_name =(personal_details::get()->last()->m_name);
        $p_details=personal_details::with('member')->get();
        $data = personal_details::find($req->p_id);
        $m_data = add_members::all();
        $details = new personal_details();
        $details->name = $req->name;
        $details-> email = $req->email;
        $details-> phone_no = $req->phone_no;
        $details-> age = $req->age;
        $details-> address = $req->collapsibleaddress;
        // blade ma 
        //dd($req->collapsibleaddress);
        $details-> community=$req->community;
        $details-> city=$req->city;
        $details-> gender=$req->inlineRadioOptions;
        $details->save(); 
    
        $booking = new room_details();
        $booking->no_of_person = $req->no_of_person;
        $booking->check_in_date = Carbon::now();
        $booking->room_list = $req->TagifyCustomListSuggestion;
        $booking->room_facility = $req->room_list;
        $booking->amount = $req->amount;
        $booking->id_proof = $req->id_proof;
        $booking->deposite_no = $req->deposit_no;
        $booking->deposite_rs = $req->deposite_rs;
        $booking->rs_word = $req->rs_word;
        $booking->save();

    
        $m_details = new member_details();
        $m_details->full_name = $req->full_name;
        
        $m_details->age=$req->m_age;
        $m_details->gender=$req->inlineRadioOptions;
        $m_details->relation=$req->relation;
        //dd($req->m_age);
        $m_details->save();
        //$member_data = member_details::all();
        //$m_data= DB::select("select * from member_details ORDER BY add_members.p_id DESC");
        return view ('Booking.room-booking',['m_data'=>$m_data,'data'=>$data,'p_details'=>$p_details,'m_name'=>$m_name,'m_data'=>$m_data]);

    }

    public function add_member(Request $req){
        
        $p_details=personal_details::with('member')->get();
        $member = new add_members();
        $member->m_name = strtoupper($req->m_name);
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = $req->city;
        $member->address = strtoupper($req->collapsible_address);
        $member->save();
        $m_data=add_members::all();
        return view('Booking.room-booking',['member'=>$member,'m_data'=>$m_data,'p_details'=>$p_details]);
    }
    
   

    

    

    // RoomList
    public function ADDROOM(){
        $list =$data=DB::select("SELECT * , add_room.room_no as id from add_room");
        return view('Booking.room-list',['list'=>$list]);

    }
    public function RoomList(Request $req){
        $room = new add_room();
        $room->room_name = $req->input('room_name');
        $room->room_type = $req->input('room_type');
        $room->room_facility = $req->input('room_facility');
        $room->save();
        $list = DB::select("SELECT * , add_room.room_no as id from add_room ");
        dd($list->toArray());
        return view('Booking.room-list', ['list' => $list]);
    }
}
