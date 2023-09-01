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
        $treatment=DB::select("select DISTINCT doctor_name from medical");
        return view ('Medical.treatment',['member' => $member,'rec_no' => $rec_no,'treatment'=>$treatment]);
    }
    public function view_treatment()
    {
        $member=DB::select("SELECT m.sr_no,m.date,m.doctor_name,m.amount,m.payment_mode,M.m_name,M.city,M.phone_no,M.p_id FROM medical As m join add_members As M where m.p_id=M.p_id order by m.sr_no desc");
        $member_data=DB::select("SELECT * FROM add_members");
        return view('Medical.View_Treatment',['member' => $member,'member_data' => $member_data]);
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
       return redirect()->route('view_treatment')->with('message', 'Form submitted successfully!')->with(['member' => $member,'member_data' => $member_data,'rec_no' => $rec_no]);
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
    public function checkdate()
    {
        /* $global_user_id = 5;
        $find_query = $db->prepare("SELECT date_available FROM user_dates WHERE user_id = :user_id");
        $find_query->bindParam(':user_id', $global_user_id);
        $find_query->execute();
        $result_find = $find_query->fetchAll(PDO::FETCH_ASSOC);
        $dates = []; // init the array
        if(count($result_find) > 0) {
        foreach($result_find as $row) $dates[]=$row['date_available'];
        }
        echo json_encode($dates)*/ 
        /*$id=16;
        $data=DB::select("SELECT DISTINCT date FROM `medical`");
        $date=[];
        if($data)
        {
            foreach($data as $row) 
            {
                $date[]=$row['date'];
            }
        }
        echo json_encode($date);*/
        return view('Medical.temp');
    }
}
