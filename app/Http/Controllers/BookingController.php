<?php
namespace App\Http\Controllers;
use App\Models\personal_details;
use App\Models\room_details;
use App\Models\add_members;
use App\Models\member_details;
use App\Models\add_room;
use App\Models\checkout;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $p_details=personal_details::with('member')->get();
        $m_data=add_members::all();
        $p_id=room_details::get()->last()->r_id;
        $ar_list= DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        $acroom = DB::select("SELECT * FROM add_room WHERE room_facility = 'A.C. Room'");
        $depositeno = room_details::get()->last()->deposite_no;
        return view ('Booking.room-booking',['p_details'=>$p_details,'m_data'=>$m_data,'p_id'=>$p_id,'a_list'=>$ar_list,'acroom'=>$acroom,'depositeno'=>$depositeno]);
       
    }

    public function RoomBooking(Request $req)
    {
        $m_name =(personal_details::get()->last()->m_name);
        $p_details=personal_details::with('member')->get();
        $data = personal_details::find($req->p_id);
        $m_data = add_members::all();
        $depositeno = room_details::get()->last()->deposite_no;
        $p_id=room_details::get()->last()->r_id;

        $ar_list = DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        $acroom = DB::select("SELECT * FROM add_room WHERE room_facility = 'A.C. Room'");
        //$acroomlist= DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        $pdetails = DB::select("SELECT * from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id join add_members on add_members.p_id = personal_details.member_id WHERE add_room.status = 1");
       
        /*Insert Personal deatil*/
        $details = new personal_details(); 
        $personal_details_id=(personal_details::get()->last()->p_id)+1;
        $details->age = $req->age;
        $details->address = $req->collapsibleaddress;
        $details->community = $req->community;
        $details->subcommunity = strtoupper($req->subcommunity);
        $details->gender = $req->inlineRadioOptions;
        $details->member_id=$req->name;
        $details->id_proof=$req->id_proof;
        $details->occupation=$req->occupation;
        $details->reason=$req->reason;
        $details->save();
        
        /*Insert Member deatil*/
   
    //     $file = $req->file('id_proof');

    // if (!$file) {
    //     echo  "Please select a valid file";
    // }
    //     $path = $req->file('id_proof')->store('id_proof');

        /*Insert Room Booking deatil*/
        $booking = new room_details();
        $booking->no_of_person = $req->no_of_person;
        $booking->check_in_date = date("Y-m-d H:i",strtotime($req->check_in_date));
        $acRoomList = implode(',', $req->input('select2Multiple1', []));
        $nonAcRoomList = implode(',', $req->input('select2Multiple2', []));
        $doorMetricRoomList = implode(',', $req->input('select2Multiple3', []));
        
        $booking->room_list = "$acRoomList,$nonAcRoomList,$doorMetricRoomList";
        // $acroomlist = ($roomListArray['ac_room']);
        // $nonacroomlist = ($roomListArray['non_ac_room']);
        // $doormtnonacroomlist = ($roomListArray['door_metric_ac_non_ac_room']);
        //dd($booking->room_list);
        $booking->ac_amount = $req->ac_amount;
        $booking->non_ac_amount = $req->non_ac_amount;
        $booking->door_mt_amount = $req->door_mt_amount;
        $booking->deposite_rs = $req->deposite_rs;
        $booking->rs_word = $req->rs_word;
        $booking->no_of_days = $req->no_of_days;
        $booking->member_id=$personal_details_id;
        //dd($booking);
        $booking->save();
        
//         $roomNumbersToUpdate = [];

// $acRoomNumbers = explode(',', $roomListArray['ac_room']);
// $nonAcRoomNumbers = explode(',', $roomListArray['non_ac_room']);
// $doorMetricRoomNumbers = explode(',', $roomListArray['door_metric_ac_non_ac_room']);

// $allRoomNumbers = array_merge($acRoomNumbers, $nonAcRoomNumbers, $doorMetricRoomNumbers);

// // Filter out any duplicates and empty room numbers
// $roomNumbersToUpdate = array_filter(array_unique($allRoomNumbers));

// // Update room status
// $roomsToUpdate = add_room::whereIn('room_no', $roomNumbersToUpdate)->get();

// foreach ($roomsToUpdate as $room) {
//     $room->status = 1;
//     $room->save();
// }
      
      /*temp hide
        $m_details = new member_details();
        $m_details->full_name =$req->full_name;
        $m_details->age=$req->m_age;
        $m_details->gender = $req->input('gender' . $i);
        $m_details->relation=$req->relation;*/
        $total_member = $req->no_of_person;
        for ($i =0; $i < $total_member; $i++){
            $m_details = new member_details();
            $m_details->full_name = strtoupper($req->full_name[$i]);
            $m_details->age=$req->m_age[$i];
            $m_details->gender=$req->inlineRadioOptions[$i];
            $m_details->relation=$req->relation[$i];
            $m_details->personal_detail_id=$personal_details_id;
            $m_details->room_id=$req->deposit_no;
            $m_details->save();
        }
        $ar_list = DB::select("SELECT add_room.*, room_details.check_in_date, room_details.* FROM add_room LEFT JOIN room_details ON add_room.room_no = room_details.r_id WHERE add_room.status = 1");
        return view ('Booking.room-booking',['pdetails'=>$pdetails,'m_data'=>$m_data,'data'=>$data,'p_details'=>$p_details,'m_name'=>$m_name,'a_list'=>$ar_list,'acroom'=>$acroom,'depositeno'=>$depositeno,'p_id'=>$p_id]);

    }

    public function add_member(Request $req){
        
        $p_details=personal_details::with('member')->get();
        $member = new add_members();
        $depositeno = room_details::get()->last()->deposite_no;
        $member->m_name = $req->m_name;
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = $req->city;
       
        $member->save();
        $m_data=add_members::all();
        $ar_list= DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        //dd($ar_list);
        $r_list = DB::select("SELECT add_room.*, room_details.check_in_date, room_details.* FROM add_room LEFT JOIN room_details ON add_room.room_no = room_details.r_id WHERE add_room.status = 1");
   
        return view('Booking.room-booking',['a_list'=>$ar_list,'member'=>$member,'m_data'=>$m_data,'p_details'=>$p_details,'r_list'=>$r_list,'depositeno'=>$depositeno]);
    }
    
   
    // RoomList

    public function get_room_list(){
        $list =$data=DB::select("SELECT * , add_room.room_no as id from add_room");
        $get_list = DB::select("SELECT * from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id WHERE add_room.status = 1");
        $room_book = DB::select ("SELECT * , room_details.r_id as id from room_details ");
        $availablelist = DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        $current_date = Carbon::now();
        $formatted_date = $current_date->format('Y-m-d');
        $room_ids = room_details::where('check_in_date', $formatted_date)->pluck('room_list')->toArray();

        foreach ($room_ids as $r_list) {
            $roomNumbers = explode(',', $r_list);
        DB::enableQueryLog();
            //dd($r_list);
            add_room::whereIn('room_no', $roomNumbers)->update(['status' => 1]);
        //dd(DB::getQueryLog());

        }
         //dd($r_list);
        //DB::enableQueryLog();
        
        //dd(DB::getQueryLog());
        //dd($roomsToUpdate->toArray());
        return view('Booking.room-list',['list'=>$list,'room_book'=>$room_book,'availablelist'=>$availablelist,'get_list' => $get_list,'current_date'=> $current_date]);
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

    public function checkout(){
        $checkout= DB::select("SELECT * from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE add_room.status =1");
        $rec_no=checkout::get()->last()->rec_no;
        if(!$rec_no)
        {$rec_no=1;}
        $member=add_members::all();
        return view('Booking.checkout',['checkout'=>$checkout,'member'=>$member,'rec_no'=>$rec_no]);
    }
    public function add_checkout(Request $req)
    {
        $checkout= DB::select("SELECT * from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE add_room.status =1");
        $member=add_members::all();
        $data=new checkout();
        $data->room_booking_id=$req->bookingId;
        $data->member_id=$req->name;
        $data->check_out_date=Date("Y-m-d H:i",strtotime($req->check_out_date));
        $data->deluxe_room_total=$req->dlx_room_total;
        $data->deluxe_room_extra=$req->dlx_room_Excharge;
        $data->ac_room_total=$req->ac_room_total;
        $data->ac_room_extra=$req->ac_room_Excharge;
        $data->non_ac_room_total=$req->non_ac_room_total;
        $data->non_ac_room_extra=$req->non_ac_room_Excharge;
        $data->ac_dmt_total=$req->dmt_ac_room_total;
        $data->ac_dmt_extra=$req->dmt_ac_room_Excharge;
        $data->non_ac_dmt_total=$req->non_dmt_ac_room_total;
        $data->non_ac_dmt_extra=$req->non_dmt_ac_room_Excharge;
        $data->total=$req->total;
        $data->amount_in_words="one one one";
        $data->payment_mode=$req->payment;
        $data->payable_amount=$req->net_amount;
        $data->remark=$req->remark;
        $data->save();
        if($data) { 

            return redirect() -> route('checkout') -> with ('message', 'checkout submitted successfully!') -> with 
            (['checkout'=>$checkout,'member'=>$member]);

        }
        else{

            return redirect() -> route('checkout') -> with ('message', 'checkout not submitted successfully!') -> with 
            (['checkout'=>$checkout,'member'=>$member]);
        }
    }
    public function get_booking_data($id) {
        $data=DB::SELECT("SELECT *,add_members.p_id as m_id from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE r_id='$id'");
        return $data;
    }
    public function view_room_booking(){
        $checkout= DB::select("SELECT * from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE add_room.status =1");
        $member=add_members::all();
        return view('Booking.view-room-booking',['checkout'=>$checkout,'member'=>$member]);
    }
    public function cancel_room_booking($id)
    {
    
    }
}