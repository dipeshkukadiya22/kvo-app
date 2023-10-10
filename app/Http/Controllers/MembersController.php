<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_members;
use DB;

class MembersController extends Controller
{
    // View Members
    public function ViewMembers(){
        $data = DB::select("SELECT * FROM add_members ORDER BY p_id DESC");
        return view('Booking.view-members',compact('data'));
    }

    public function edit_members($id) {
        $data =DB::SELECT("SELECT * from add_members where p_id='$id'");
        return $data;
    }
    
    public function update_members(Request $request) 
    {
      
        $member = add_members::find($request->p_id);
        $member->m_name = strtoupper($request->m_name1);
        $member->email = $request->email1;
        $member->phone_no = $request->phone_no1;
        $member->city = strtoupper($request->city1);
        $member->save();
        if($member) {
            return redirect() -> route('ViewMembers') -> with ('updatemessage', 'Details Changed Successfully!') ;
        }
        else{
            return redirect() -> route('ViewMembers') -> with ('updatemessage', 'Details Not Changed Successfully!') ;
        }
    }
    public function delete_members($id){
      
        $data=add_members::find($id);
        $data->delete();
        return back();

    }
}
