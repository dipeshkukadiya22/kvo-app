<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\add_members;
use App\Models\medical;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function show(){
        $rec_no=medical::get()->last()->sr_no;
        $member=DB::select("SELECT * FROM add_members");
        return view ('Medical.treatment',['member' => $member,'rec_no' => $rec_no]);
    }
    public function view_treatment()
    {
        $member=DB::select("SELECT m.sr_no,m.date,m.doctor_name,m.amount,m.payment_mode,M.m_name,M.city,M.phone_no,M.p_id FROM medical As m join add_members As M where m.p_id=M.p_id");
        $member_data=DB::select("SELECT * FROM add_members");
        return view('Medical.View_Treatment',['member' => $member,'member_data' => $member_data]);
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
        $data->amount_in_words=$req->ankers;
        $data->save();
        return back()->with("Add Treatment");
    }
    public function get_member($id)
    {
        $member=DB::select("SELECT m.sr_no,m.date,m.doctor_name,m.amount,m.payment_mode,m.amount_in_words,m.remark,M.m_name,M.city,M.phone_no,M.p_id FROM medical As m join add_members As M where m.p_id=M.p_id and m.sr_no='$id'");
        return $member;
    }
    public function update(Request $req)
    {
        $data=medical::find($req->sr_no);
        $data->p_id=$req->name;
        $data->date=Date("Y-m-d",strtotime($req->date));
        $data->doctor_name=strtoupper($req->doctor_name);
        $data->amount=$req->amount;
        $data->remark=ucfirst($req->remark);
        $data->payment_mode=$req->payment;
        $data->save();
        return back()->with("Update Treatment");
    }
    public function get($id){
        dd("$id");
        $data=add_members::find($id);
        return $data;
    }
    public function delete_treatment($id)
    {
        $member=medical::find($id);
        $member->delete();
        return back()->with("Delete Treatment");
    }
}
