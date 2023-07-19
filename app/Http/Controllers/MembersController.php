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
      
        return redirect()->route('edit_members');

    }
}
