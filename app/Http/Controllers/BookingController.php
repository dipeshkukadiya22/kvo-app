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
        
        $r_list= DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        $acroom = DB::select("SELECT * FROM add_room WHERE room_facility = 'A.C. Room'");
        $depositeno = room_details::get()->last()->deposite_no;
        return view ('Booking.room-booking',['p_details'=>$p_details,'m_data'=>$m_data,'p_id'=>$p_id,'r_list'=>$r_list,'acroom'=>$acroom,'depositeno'=>$depositeno]);
       
    }

    public function RoomBooking(Request $req)
    {
        //dd($req->toArray());
        $m_name =(personal_details::get()->last()->m_name);
        $p_details=personal_details::with('member')->get();
        $data = personal_details::find($req->p_id);
        $m_data = add_members::all();
        $depositeno = room_details::get()->last()->deposite_no;
       
        $r_list = DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        $acroom = DB::select("SELECT * FROM add_room WHERE room_facility = 'A.C. Room'");
        $acroomlist= DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
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
        $file = $req->file('id_proof');

    if (!$file) {
        return redirect()->back()->with('error', 'Please select a valid file.');
    }
        $path = $req->file('id_proof')->store('id_proof');
        $booking = new room_details();
        $booking->no_of_person = $req->no_of_person;
        $booking->check_in_date = Carbon::now();
        $roomListArray = array(
            'ac_room' => $req->select2Multiple1,
            'non_ac_room' => $req->select2Multiple2,
            'door_metric_ac_non_ac_room' => $req->select2Multiple3
        );
        $booking->room_list = json_encode($roomListArray);
    
        $acroomlist=($roomListArray['ac_room']);
        $nonacroomlist=($roomListArray['non_ac_room']);
        $doormtnonacroomlist=($roomListArray['door_metric_ac_non_ac_room']);
        
        $booking->ac_amount = $req->ac_amount;
        $booking->non_ac_amount = $req->non_ac_amount;
        $booking->door_mt_amount = $req->door_mt_amount;
        $booking->id_proof = $path;
        $booking->deposite_no = $req->deposit_no;
        $booking->deposite_rs = $req->deposite_rs;
        $booking->rs_word = $req->rs_word;
        $booking->save();
        $updateroom = add_room::whereIn('room_facility', ['A.C. Room', 'NON A.C ROOM', 'DOOR MATRY NON A.C ROOM'])
        ->when(!empty($acroomlist), function ($query) use ($acroomlist) {
            $query->whereIn('room_no', $acroomlist);
        })
        ->when(!empty($nonacroomlist), function ($query) use ($nonacroomlist) {
            $query->orWhereIn('room_no', $nonacroomlist);
        })
        ->when(!empty($doormtnonacroomlist), function ($query) use ($doormtnonacroomlist) {
            $query->orWhereIn('room_no', $doormtnonacroomlist);
        });
     foreach ($updateroom as $room) {
             $room->status = 1;
           $room->save();
       }

      
        $m_details = new member_details();
        $m_details->full_name = $req->full_name;
        $m_details->age=$req->m_age;
        $m_details->gender = $req->input('gender' . $i);
        $m_details->relation=$req->relation;
        $r_list = DB::select("SELECT add_room.*, room_details.check_in_date, room_details.* FROM add_room LEFT JOIN room_details ON add_room.room_no = room_details.r_id WHERE add_room.status = 1");
        return view ('Booking.room-list',['m_data'=>$m_data,'data'=>$data,'p_details'=>$p_details,'m_name'=>$m_name,'m_data'=>$m_data,'r_list'=>$r_list,'acroom'=>$acroom,'depositeno'=>$depositeno,'path'=>$path]);

    }

    public function add_member(Request $req){
        
        $p_details=personal_details::with('member')->get();
        $member = new add_members();
        $member->m_name = strtoupper($req->m_name);
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = $req->city;
       
        $member->save();
        $m_data=add_members::all();
        $r_list = DB::select("SELECT add_room.*, room_details.check_in_date, room_details.* FROM add_room LEFT JOIN room_details ON add_room.room_no = room_details.r_id WHERE add_room.status = 1");
   
        return view('Booking.room-booking',['member'=>$member,'m_data'=>$m_data,'p_details'=>$p_details,'r_list'=>$r_list]);
    }
    
   
    // RoomList

     public function get_room_list(){
        $list =$data=DB::select("SELECT * , add_room.room_no as id from add_room");
        $get_list = DB::select("SELECT add_room.*, room_details.check_in_date, room_details.* FROM add_room LEFT JOIN room_details ON add_room.room_no = room_details.r_id WHERE add_room.status = 1");
        $room_book = DB::select ("SELECT * , room_details.r_id as id from room_details ");
        $availablelist = DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
     
      
        return view('Booking.room-list',['list'=>$list,'room_book'=>$room_book,'availablelist'=>$availablelist,'get_list' => $get_list]);

    }
    public function RoomList(Request $req){
        $room = new add_room();
        $room->room_name = strtoupper($req->input('room_name'));
        $room->room_type = $req->input('room_type');
        $room->room_facility = $req->input('room_facility');
        $room->save();
        $list =$data=DB::select("SELECT * , add_room.room_no as id from add_room");
        $availablelist = DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        $room_book = DB::select("SELECT *, room_details.r_id as id, room_details.check_in_date FROM room_details");
        return back();
    }

    
}