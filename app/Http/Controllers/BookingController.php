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
        $details-> community=$req->community;
        $details-> city=$req->city;
        $details-> gender=$req->inlineRadioOptions;
        $details->save(); 
        $total_member = $req->no_of_person +1;
        for ($i =0; $i < $total_member; $i++){
            $m_details = new member_details();
            $m_details->full_name = $req->full_name[$i];
            $m_details->age=$req->m_age[$i];
            $m_details->gender=$req->inlineRadioOptions[$i];
            $m_details->relation=$req->relation[$i];
            $m_details->save();
        }
        $booking = new room_details();
        $booking->no_of_person = $req->no_of_person;
        $booking->check_in_date = Carbon::now();
        $roomListArray = array(
            'ac_room' => $req->TagifyCustomListSuggestion,
            'non_ac_room' => $req->TagifyCustomListSuggestion1,
            'door_metric_ac_non_ac_room' => $req->TagifyCustomListSuggestion2
        );
        $booking->room_list = json_encode($roomListArray);
        //dd($roomListArray);
        $booking->ac_amount = $req->ac_amount;
        $booking->non_ac_amount = $req->non_ac_amount;
        $booking->door_mt_amount = $req->door_mt_amount;
        $booking->id_proof = $req->id_proof;
        $booking->deposite_no = $req->deposit_no;
        $booking->deposite_rs = $req->deposite_rs;
        $booking->rs_word = $req->rs_word;
        $updateroom = add_room::where('room_name',$req->room_list)->get();
        $updateroom->status=1;
        $booking->save();
      
     


    
        $m_details = new member_details();
        $m_details->full_name = $req->full_name;
        $m_details->age=$req->m_age;
        $m_details->gender=$req->inlineRadioOptions;
        $m_details->relation=$req->relation;
        //$m_details->save();
        
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
        $room_book = DB::select ("SELECT * , room_details.r_id as id from room_details ");
//dd($room_book);
       //$room_list = substr($room_book['room_list'], 0, 6);
        return view('Booking.room-list',['list'=>$list,'room_book'=>$room_book,]);

    }
    public function RoomList(Request $req){
        $room = new add_room();
        $room->room_name = $req->input('room_name');
        $room->room_type = $req->input('room_type');
        $room->room_facility = $req->input('room_facility');
        $room->save();
        $list = DB::select("SELECT * , add_room.room_no as id from add_room ");
        $room_book = DB::select("SELECT * , room_details.r_id as id from room_details");
      //$room_list = substr($room_book['room_list'], 0, 6);
        dd($room_list);
        return view('Booking.room-list', ['list' => $list,'room_book'=>$room_book]);
    }

}
