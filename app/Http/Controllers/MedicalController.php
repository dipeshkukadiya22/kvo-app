<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\add_members;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\medical;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function show(){
        $rec_no=medical::get()->last()->sr_no;
        $member=DB::select("SELECT * FROM add_members");
        $treatment=DB::select("select DISTINCT doctor_name from medical");
        return view ('Medical.treatment',['member' => $member,'rec_no' => $rec_no,'treatment'=>$treatment]);
    }
    public function view_treatment()
    {
        $member=DB::select("SELECT m.sr_no,m.date,m.doctor_name,m.amount,m.payment_mode,M.m_name,M.city,M.phone_no,M.p_id FROM medical As m join add_members As M where m.p_id=M.p_id order by m.sr_no desc");
        $member_data=DB::select("SELECT * FROM add_members");
        $treatment=DB::select("select DISTINCT doctor_name from medical");
        return view('Medical.View_Treatment',['member' => $member,'member_data' => $member_data,'treatment'=>$treatment]);
    }
    public function add(Request $req)
    {
        $member_data=DB::select("SELECT * FROM add_members");
        $member=DB::select("SELECT m.sr_no,m.date,m.doctor_name,m.amount,m.payment_mode,M.m_name,M.city,M.phone_no,M.p_id FROM medical As m join add_members As M where m.p_id=M.p_id order by m.sr_no desc");
        $rec_no=medical::get()->last()->sr_no;
     
        $data=new medical();
        $data->p_id=strtoupper($req->name);
        $data->date=Date("Y-m-d",strtotime($req->date));
        $data->doctor_name=strtoupper($req->doctor_name);
        $data->amount=$req->amount;
        $data->remark=ucfirst($req->remark);
        $data->payment_mode=strtoupper($req->payment);
        $data->amount_in_words=$req->ankers;
        $data->save();
   
        if($data)
         {      
            //return redirect()->route('view_treatment')->with('message', 'Form submitted successfully!')->with(['member' => $member,'member_data' => $member_data,'rec_no' => $rec_no]); 
            $medical=DB::select("SELECT * FROM medical join add_members where add_members.p_id=medical.p_id and sr_no='$data->sr_no'");
            $pdf = Pdf::loadView('pdf.pdf_Medical_Treatment',['medical' => $medical])->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
            return $pdf->stream();
           
        }else{
            return redirect()->route('view_treatment')->with('message', 'Form Not submitted successfully!')->with(['member' => $member,'member_data' => $member_data,'rec_no' => $rec_no]);
        }
       
     
    }
    public function get_treatment($id)
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
        $data->payment_mode=strtoupper($req->payment);
        $data->amount_in_words=$req->total_in_word;
        $data->save();
        return redirect()->route("view_treatment");
    }
    public function get($id){
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
