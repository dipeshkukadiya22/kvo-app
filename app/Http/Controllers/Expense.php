<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahajan_Expense;
use App\Models\add_members;

use Carbon\Carbon;

class Expense extends Controller
{

    public function index(){

        $m_name =(Mahajan_Expense::get()->last()->m_name);
        $p_details=Mahajan_Expense::with('member')->get();
        $m_data = add_members::all();
        //$id=add_members::get()->last()->id;
        $depo_id = Mahajan_Expense::get()->last()->depo_id;
        //dd($depo_id);
        

        return view ('Expense.Mahajan_Expense',['m_name' => $m_name, 'p_details' => $p_details, 'm_data' => $m_data,'depo_id'=>$depo_id ]);
    }


    public function Mahajan_Expense(Request $req){

        $m_name =(Mahajan_Expense::get()->last()->m_name);
       
        $p_details=Mahajan_Expense::with('member')->get();
        $m_data = add_members::all();
        $data = Mahajan_Expense::find($req->depo_id);
        $depo_id = Mahajan_Expense::get()->last()->depo_id;
        $Mahajan_Expense = new Mahajan_Expense();
        //Personal Details
        $Mahajan_Expense -> depo_id  = $req -> depo_id;
        $Mahajan_Expense-> date = Carbon::now();
        $Mahajan_Expense -> name = $req -> name;
        $Mahajan_Expense -> details = $req -> collapsible_details;
        $Mahajan_Expense -> amount = $req -> amount;
        $Mahajan_Expense -> inword = $req -> inword;
        $Mahajan_Expense -> save();
       
       

        //$m_data= DB::select("select * from member_details ORDER BY add_members.p_id DESC");
        return redirect()->route('Mahajan_Expense');

        // return view ('Donation.Mahajan_Expense');
    }

    public function Sangh_Expense(){
        return view ('Expense.Sangh_Expense');
    }

    public function add_member(Request $req){
        
        $p_details= Mahajan_Expense::with('member')->get();
        $member = new add_members();
        $member->m_name = strtoupper($req->m_name);
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = $req->city;
        $member->address = strtoupper($req->address);
        $member->save();
        $m_data=add_members::all();
        $depo_id = Mahajan_Expense::get()->last()->depo_id;
        return view('Expense.Mahajan_Expense',['member'=>$member,'m_data'=>$m_data,'p_details'=>$p_details,'depo_id' => $depo_id]);
    }
}
