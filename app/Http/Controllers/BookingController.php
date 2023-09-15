<?php
namespace App\Http\Controllers;
use App\Models\personal_details;
use App\Models\room_details;
use App\Models\add_members;
use App\Models\member_details;
use App\Models\add_room;
use App\Models\checkout;
use Carbon\Carbon;
use Image;
use DB;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\InvalidRouteActionSolutionProvider;

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
       // $fileName = basename($_FILES[$req->id_proof[0]]["name"]);
        //dd($req->id_proof[0]);
        /*if(count($req->id_proof)==1){ $details->id_proof=$req->id_proof[0]; }

        else{$details->id_proof=$req->id_proof[0];$details->id_proof1=$req->id_proof[1];}*/
        
        $details->occupation=$req->occupation;
        $details->reason=$req->reason;
     
    

        /*Insert Room Booking deatil*/
        $booking = new room_details();
        $booking->no_of_person = $req->no_of_person;
        $booking->check_in_date = date("Y-m-d H:i",strtotime($req->check_in_date));
    
        $acRoomList = array_filter($req->input('select2Multiple1', []));
        $nonAcRoomList = array_filter($req->input('select2Multiple2', []));
        $doorMetricRoomList = array_filter($req->input('select2Multiple3', []));
        
        $combinedList = array_merge($acRoomList, $nonAcRoomList, $doorMetricRoomList);
        $filteredCombinedList = array_filter($combinedList);
        
        $booking->room_list = implode(',', $filteredCombinedList);
        $booking->ac_amount = $req->ac_amount;
        $booking->non_ac_amount = $req->non_ac_amount;
        $booking->door_mt_amount = $req->door_mt_amount;
        $booking->deposite_rs = $req->deposite_rs;
        $booking->rs_word = $req->rs_word;
        $booking->no_of_days = $req->no_of_days;
        $booking->member_id=$personal_details_id;
        if(date("Y-m-d",strtotime($req->check_in_date)) == date("Y-m-d")) {
            $booking->status="BOOKED";
            $booking->booking_type="REGULAR";}
        else{
            
            $booking->advance_date= date("Y-m-d H:i",strtotime($req->check_in_date));
            $booking->status="ADVANCE";
            $booking->booking_type="ADVANCE";}
       
       
       
        $status=$details->save();
        if($status)
        {
            $booking_status=$booking->save();
            if($booking_status)
            {
                if(!empty($req->select2Multiple1)){
                    foreach($req->select2Multiple1 as $room)
                    {
                        $data=DB::UPDATE("UPDATE add_room SET STATUS='1',room_detail_id='$req->deposit_no' where room_no='$room'");
                    }}
                    if(!empty($req->select2Multiple2)){
                    foreach($req->select2Multiple2 as $room)
                    {
                        $data=DB::UPDATE("UPDATE add_room SET STATUS='1',room_detail_id='$req->deposit_no' where room_no='$room'");
                    }}
                    if(!empty($req->select2Multiple3)){
                    foreach($req->select2Multiple3 as $room)
                    {
                        $data=DB::UPDATE("UPDATE add_room SET STATUS='1',room_detail_id='$req->deposit_no' where room_no='$room'");
                    }}
                   //dd($req->toArray());
                   $total_member = $req->no_of_person;
                    for ($i = 0; $i < $total_member; $i++) {
                        //dd( $req->toArray());
                        $m_details = new member_details();
                        $m_details->full_name = $req->input('full_name'.$i);
                        $m_details->age= $req->input('m_age'.$i);
                        $m_details->gender = $req->input('gender'.$i);
                        $m_details->relation=$req->input('relation' .$i);
                        $m_details->personal_detail_id=$booking->member_id;
                     
                        $m_details->room_id=$req->deposit_no;
                        $m_details->save();
                    }
                    
                  

                    // $m_details = new member_details();
                    // $m_details->full_name = $req->full_name;
                    // $m_details->age= $req->m_age;
                    // $m_details->gender=$req->gender;
                    // $m_details->relation=$req->relation;
                    // $m_details->save();  

            }
        }
      
      
        $ar_list = DB::select("SELECT add_room.*, room_details.check_in_date, room_details.* FROM add_room LEFT JOIN room_details ON add_room.room_no = room_details.r_id WHERE add_room.status = 1");
        return back();
    }

    public function add_member(Request $req){
        $p_details=personal_details::with('member')->get();
        $member = new add_members();
        $depositeno = room_details::get()->last()->deposite_no;
        $member->m_name = strtoupper($req->m_name);
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = strtoupper($req->city);
        $member->save();
        if($member)
        {
            return back()->with('new_member',1);
        }
        else{
            return back()>with('new_member',0);
        }
    }

    public function get_member()
    {
        $data=add_members::get()->last();
        return $data;
    }
    public function check_num($num)
    {
        $phone_no=DB::SELECT("SELECT * from add_members where phone_no='$num'");
        if($phone_no)
        {return 1;}
        else{return 0;}
    }
    public function get_room_list(){
        $list =$data=DB::select("SELECT * , add_room.room_no as id from add_room");
        $get_list = DB::select("SELECT * from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id WHERE add_room.status = 1");
        $room_book = DB::select ("SELECT * , room_details.r_id as id from room_details ");
        $availablelist = DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        $current_date = Carbon::now();
        $formatted_date = $current_date->format('Y-m-d H:i'); 
        $room_ids = room_details::where('check_in_date', $formatted_date)->pluck('room_list')->toArray();
        
        foreach ($room_ids as $r_list) {
            $roomNumbers = explode(',', $r_list);
            DB::enableQueryLog();
            add_room::whereIn('room_no', $roomNumbers)->update(['status' => 1]);
           
        }

        
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
        $bookedRoom= DB::select("SELECT * FROM room_details JOIN ( SELECT add_room.room_detail_id, MAX(add_room.room_no) AS room_no, MAX(add_room.status) AS room_status FROM add_room WHERE add_room.status = 1 GROUP BY add_room.room_detail_id ) AS filtered_rooms ON room_details.r_id = filtered_rooms.room_detail_id JOIN personal_details ON personal_details.p_id = room_details.member_id JOIN add_members ON personal_details.member_id = add_members.p_id where room_details.status='BOOKED'");
        $checkout=DB::select("SELECT * FROM checkout join `room_details`on checkout.room_booking_id=room_details.r_id join personal_details on room_details.member_id=personal_details.p_id join add_members on add_members.p_id=personal_details.member_id WHERE room_details.status='CHECKOUT' order by r_id DESC");
        $rec_no=checkout::get()->last()->rec_no;
        if(!$rec_no)
        {$rec_no=1;}
        $member=add_members::all();
        $current_date = Carbon::now();
        $formatted_date = $current_date->format('Y-m-d'); 
        $room_ids = checkout::where('check_out_date', $formatted_date)->pluck('room_booking_id')->toArray();
        
        foreach ($room_ids as $r_list) {
            $roomNumbers = explode(',', $r_list);
            $queries = DB::getQueryLog();
            add_room::whereIn('room_no', $roomNumbers)->update(['status' => 0 , 'room_detail_id' => 0]);
        }
        return view('Booking.checkout',['bookedRoom'=>$bookedRoom,'member'=>$member,'rec_no'=>$rec_no,'current_date'=> $current_date,'checkout'=>$checkout]);
    }
    public function add_checkout(Request $req)
    {
        //$checkout= DB::select("SELECT * from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE add_room.status =1");
        $checkout= DB::select("SELECT * FROM `room_details` join personal_details on room_details.member_id=personal_details.p_id join add_members on add_members.p_id=personal_details.member_id WHERE r_id='$req->bookingId'");
        $member=add_members::all();
           
            $data=new checkout();
            $data->room_booking_id=$req->bookingId;
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
            $data->amount_in_words=$req->rs_word;
            $data->payment_mode=$req->payment;
            $data->payable_amount=$req->net_amount;
            $data->remark=$req->remark;
            $data->save();
            $a=DB::UPDATE("UPDATE room_details SET status='CHECKOUT' where r_id='$req->bookingId'");

        if($data) { 
            $room=DB::SELECT("SELECT room_list FROM `room_details` where r_id='$req->bookingId'");
            foreach ($room as $r) {
            $r_list = $r->room_list; 
            $roomNumbers = explode(',', $r_list);
            add_room::whereIn('room_no', $roomNumbers)->update(['status' => 0 , 'room_detail_id' => 0]);
            }
           
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
       
        $data=DB::SELECT("SELECT * FROM `room_details` join personal_details on room_details.member_id=personal_details.p_id join add_members on add_members.p_id=personal_details.member_id WHERE r_id='$id'");
    
        return $data;
    }
    public function get_data($id)
    {
        $data=DB::SELECT("SELECT *,add_members.p_id as m_id,room_details.member_id as person_id from room_details join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE r_id='$id'");
        return $data;   
    }
    public function get_roomdata($id)
    {
        $data=DB::SELECT("SELECT * FROM `add_room` WHERE room_no='$id'");
        return $data;   
    }
    public function update_roomdata(Request $req) 
    {
        $room=add_room::find($req->room_no);
        $room->room_name=$req->room_name;
        $room->room_type=$req->room_type;
        $room->room_facility=$req->room_facility;
        $room->save();
        return back();
    }
    public function get_memberdata($id)
    {
        $data=DB::SELECT("SELECT * FROM `member_details` WHERE personal_detail_id='$id'");
        return response()->json($data);   
    }
    public function view_room_booking(){
        $checkout= DB::select("SELECT * FROM room_details join personal_details on personal_details.p_id=room_details.member_id join add_members on add_members.p_id=personal_details.member_id where room_details.status='BOOKED' order by r_id desc");
        $member = add_members::all();
        $ar_list= DB::select("SELECT *, add_room.room_no as id FROM add_room WHERE add_room.status = 0");
        return view('Booking.view-room-booking',['checkout'=>$checkout,'member'=>$member,'a_list'=>$ar_list]);
    }
    public function update_room_booking(Request $req) 
    {
        $booking=room_details::find($req->booking_id);
        $old_no_of_person=$booking->no_of_person;
        $booking->no_of_person = $req->no_of_person_id;
        $booking->check_in_date = date("Y-m-d H:i",strtotime($req->check_in_date));
        $acRoomList = array_filter($req->input('select2Multiple1', []));
        $nonAcRoomList = array_filter($req->input('select2Multiple2', []));
        $doorMetricRoomList = array_filter($req->input('select2Multiple3', []));
        $oldRoomList=$booking->room_list;
        $oldRoomList=explode(',',$oldRoomList);
        //dd($oldRoomList);
        $combinedList = array_merge($acRoomList, $nonAcRoomList, $doorMetricRoomList);
        //dd($combinedList);
        $filteredCombinedList = array_filter($combinedList);
         //dd($filteredCombinedList);
        $remove_room=array_diff($oldRoomList,$combinedList);
        foreach($remove_room as $room)
        {
            $data=DB::UPDATE("UPDATE add_room SET STATUS='0',room_detail_id='0' where room_no='$room'");
        }
        $booking->room_list = implode(',', $filteredCombinedList);
        $booking->ac_amount = $req->ac_amount;
        $booking->non_ac_amount = $req->non_ac_amount;
        $booking->door_mt_amount = $req->dmt_amount;
        $booking->deposite_rs = $req->deposite_rs;
        $booking->rs_word = $req->rs_word;
        $booking->no_of_days = $req->no_of_days;
        $booking->save();
    
        $details=personal_details::find($booking->member_id);
        $details->age = $req->age;
        $details->address = $req->member_address;
        $details->community = $req->community;
        $details->subcommunity = strtoupper($req->subcommunity);
        $details->gender = $req->inlineRadioOptions;
       
        //$details->id_proof=$req->id_proof;
        $details->occupation=$req->occupation;
        $details->reason=$req->reason;
        $details->save();

        if(!empty($req->select2Multiple1)){
            foreach($req->select2Multiple1 as $room)
            {
                $data=DB::UPDATE("UPDATE add_room SET STATUS='1',room_detail_id='$req->booking_id' where room_no='$room'");
            }}
            if(!empty($req->select2Multiple2)){
            foreach($req->select2Multiple2 as $room)
            {
                $data=DB::UPDATE("UPDATE add_room SET STATUS='1',room_detail_id='$req->booking_id' where room_no='$room'");
            }}
            if(!empty($req->select2Multiple3)){
            foreach($req->select2Multiple3 as $room)
            {
                $data=DB::UPDATE("UPDATE add_room SET STATUS='1',room_detail_id='$req->booking_id' where room_no='$room'");
            }}
            $total_member = $req->no_of_person_id;
            if($old_no_of_person < $total_member)
           {
                for($i=$old_no_of_person;$i<$total_member;$i++)
                {
                $m_details = new member_details();
                $m_details->full_name = $req->full_name[$i];
                $m_details->age=$req->m_age[$i];
                $m_details->gender=$req->gender;
                $m_details->relation=$req->relation[$i];
                $m_details->personal_detail_id=$booking->member_id;
                $m_details->room_id=$req->booking_id;
                $m_details->save();  
                }
           }
           if($old_no_of_person == $total_member)
           {
            for ($i =1; $i < $total_member; $i++){
                $m_details =member_details::find($req->m_id[$i]);
                $m_details->full_name = strtoupper($req->full_name[$i]);
                $m_details->age=$req->m_age[$i];
                //$m_details->gender=$req->gender;
                $m_details->relation=$req->relation[$i];       
                $m_details->save();
                }
           }   
            $ar_list = DB::select("SELECT add_room.*, room_details.check_in_date, room_details.* FROM add_room LEFT JOIN room_details ON add_room.room_no = room_details.r_id WHERE add_room.status = 1");

   
    return back();
    }

    /*public function cancel_room($id) {
        $room = add_room::find($id);
        if (!$room) {
            return redirect() -> route('room-list') ;
        }
        $room->status = 0;
        $room->room_detail_id = 0;
        $room->save();
        return back();
    }*/
    public function cancel_booking($id) {
        $data=DB::SELECT("SELECT room_list as list from room_details where r_id='$id'");
        $roomlist=explode(',', $data[0]->list);
        foreach($roomlist as $room)
        {
            $update=DB::UPDATE("UPDATE add_room SET STATUS='0',room_detail_id='0' where room_no='$room'");
        }
        $changestatus=DB::UPDATE("UPDATE room_details SET status='CANCEL' where r_id='$id'");
        return back();
    }
    public function AdvanceRoomBooking()    
    {
        $m_data = add_members::all();
        $p_id=room_details::get()->last()->r_id;
        $ac_list=array();
        $non_ac_list=array();
        $dmt_list=array();
        $single=array();
      
        $adv_booked_room=room_details::select("room_list")
                            ->where('booking_type','=','ADVANCE')
                            ->where('advance_date','=','2023-08-30')
                            ->get();
          // dd($adv_booked_room->toArray())  
        foreach($adv_booked_room as $item)
        {
            $single = array_merge($single, explode(',', $item->room_list));
        }
 
        //dd($single);
        $room_no=add_room::pluck('room_no')->toArray(); 
        $available_roomlist = array_diff($room_no, $single);
          // dd($available_roomlist);
            foreach($available_roomlist as $list)
            {
                if($list ==301 || $list ==302 ||$list ==303 || $list ==304 ||
                    $list ==305 || $list ==306 ||$list ==401 || $list==402 || $list ==403 )
                {
                    $ac_list[]=$list;
                }
                if($list ==201 || $list ==202 ||$list ==203 || $list ==204 ||
                $list ==205 || $list ==206 ||$list ==404 || $list==405 || $list ==406 )
                {
                    $non_ac_list[]=$list;
                }
                if($list ==1 || $list ==2 ||$list ==3 || $list ==4 || $list ==5 || $list ==6 ||$list ==7 || $list==8 || $list ==9 ||$list==10||
                    $list ==11 || $list ==12 ||$list ==13 || $list ==14 || $list ==15 || $list ==16 ||$list ==17 || $list==18 || $list ==19|| $list==20)
                {
                    $dmt_list[]=$list;
                }

            }
        return view('Booking.AdvanceRoomBooking',['m_data'=>$m_data,'ac_list'=>$ac_list,'non_ac_list'=>$non_ac_list,'dmt_list'=>$dmt_list,'p_id'=>$p_id]);
    }
    
}