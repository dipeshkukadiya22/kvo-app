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

    public function edit_members($id) {
        $data = add_members::find($id);
        return $data;
    }
    
    public function update_members(Request $request) 
    {
      
        $member = add_members::find($request->p_id);

        $member->m_name = strtoupper($request->m_name1);
        $member->email = $request->email1;
        $member->phone_no = $request->phone_no1;
        $member->city = $request->city1;
        $member->save();
        return back();
    }
    
     
    
        
    
    

    public function delete_members($id){
      
        $data=add_members::find($id);
        $data->delete();
      
        return redirect()->route('view-members');

    }
}
