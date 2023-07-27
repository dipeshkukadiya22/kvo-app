<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\add_member;
use App\Models\medical;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function show(){
        $rec_no=medical::get()->last()->sr_no;
        $member=DB::select("SELECT * FROM add_members");
        return view ('Medical.treatment',['member' => $member,'rec_no' => $rec_no]);
    }
    public function add(Request $req)
    {
        $data=new medical();
        $data->p_id=$req->name;
        $data->date=Date("Y-m-d",strtotime($req->date));
        $data->doctor_name=strtoupper($req->doctor_name);
        $data->amount=$req->amount;
        $data->remark=ucfirst($req->remark);
        $data->payment_mode=$req->payment;
        $data->save();
        return back()->with("Add Treatment");

    }
    public function get($id){
        $data=add_member::find($id);
        return $data;
    }
}
