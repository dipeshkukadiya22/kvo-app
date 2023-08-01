<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_members;
use DB;

class MembersController extends Controller
{
    // View Members
    public function ViewMembers(){
        $data= DB::select("select * from add_members ORDER BY add_members.p_id DESC");
        return view('Booking.view-members',compact('data'));
    }

    public function edit_members($id){
      
        $data=add_members::find($id);
        return response()->json($data);

      
      
   

    }
    public function update_members(Request $req)
     {
        $data=add_members::find($req->p_id);
        $p_details=personal_details::with('member')->get();
        $member = new add_members();
        $member->m_name = strtoupper($req->m_name);
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = $req->city;
        $member->address = strtoupper($req->collapsible_address);
        $member->save();
        return redirect()->route('view-members')->with("update");
     }

    public function delete_members($id){
      
        $data=add_members::find($id);
        $data->delete();
      
        return redirect()->route('view-members');

    }
}
