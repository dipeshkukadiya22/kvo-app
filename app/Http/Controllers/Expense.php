<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mahajan_Expense;
use App\Models\Sangh_Expense;
use App\Models\add_members;

use Carbon\Carbon;

class Expense extends Controller
{
    public function Mahajan_Expense()
    {
        $m_name =(Mahajan_Expense::get()->last()->m_name);
        $p_details=Mahajan_Expense::with('member')->get();
        $m_data = add_members::all();
        $depo_id = Mahajan_Expense::get()->last()->depo_id;
        return view ('Expense.Mahajan_Expense',['m_name' => $m_name, 'p_details' => $p_details, 'm_data' => $m_data,'depo_id'=>$depo_id ]);
    }

    public function add_mahajan_expense(Request $req)
    {
        $Mahajan_Expense = new Mahajan_Expense();
        $Mahajan_Expense-> date = Date('Y-m-d',strtotime($req->date));
        $Mahajan_Expense -> member_id = $req -> name;
        $Mahajan_Expense -> details =ucfirst($req -> details);
        $Mahajan_Expense -> amount = $req -> amount;
        $Mahajan_Expense -> inword = $req -> inword;
        $Mahajan_Expense -> save();
        return back()->with("Add Mahajan Expense");
    }
    
    public function view_mahajan_expense()
    {
        $expense=DB::SELECT("SELECT * FROM `Mahajan_Expense` join add_members WHERE Mahajan_Expense.member_id=add_members.p_id");
        $member=add_members::get()->all();
        return view('Expense.View_Mahajan_Expense',['expense' => $expense,'member' => $member]);
    }

    public function get_mahajan_expense($id)
    {
        $expense=DB::SELECT("SELECT * FROM `Mahajan_Expense` join add_members WHERE Mahajan_Expense.member_id=add_members.p_id and depo_id='$id'");
        return $expense;
    }
    public function update_mahajan_expense(Request $req)
    {
        $Mahajan_Expense = Mahajan_Expense::find($req->depo_id);
        $Mahajan_Expense-> date = Date('Y-m-d',strtotime($req->date));
        $Mahajan_Expense -> member_id = $req -> name;
        $Mahajan_Expense -> details =ucfirst($req -> details);
        $Mahajan_Expense -> amount = $req -> amount;
        $Mahajan_Expense -> inword = $req -> total_in_word;
        $Mahajan_Expense->save();
        return back()->with("Update Mahajan Expense");
    }
    public function delete_mahajan_expense($id)
    {
        $Mahajan_Expense=Mahajan_Expense::find($id);
        $Mahajan_Expense->delete();
        return back()->with("Delete Mahajan Expense");
    }
   public function Sangh_Expense()
   {
        $Expense=Sangh_Expense::all();
        $member=add_members::all();
        $depo_id=Sangh_Expense::get()->last()->depo_id;
        return view('Expense.Sangh_Expense',['expense'=>$Expense,'member'=>$member,'depo_id'=>$depo_id]);
   }
   public function add_sangh_expense(Request $req)
   {
       $sangh_Expense = new Sangh_Expense();
       $sangh_Expense-> date = Date('Y-m-d',strtotime($req->date));
       $sangh_Expense -> member_id = $req -> name;
       $sangh_Expense -> details =ucfirst($req->details);
       $sangh_Expense -> amount = $req->amount;
       $sangh_Expense -> inword = $req->ankers;
       $sangh_Expense -> save();
       return back()->with("Add Sangh Expense");
   }
   public function view_sangh_expense()
    {
        $expense=DB::SELECT("SELECT * FROM `Sangh_Expense` join add_members WHERE Sangh_Expense.member_id=add_members.p_id");
        $member=add_members::get()->all();
        return view('Expense.View_Sangh_Expense',['expense' => $expense,'member' => $member]);
    }

    public function get_sangh_expense($id)
    {
        $expense=DB::SELECT("SELECT * FROM `Sangh_Expense` join add_members WHERE Sangh_Expense.member_id=add_members.p_id and depo_id='$id'");
        return $expense;
    }
    public function update_sangh_expense(Request $req)
    {
        $Mahajan_Expense = Sangh_Expense::find($req->depo_id);
        $Mahajan_Expense-> date = Date('Y-m-d',strtotime($req->date));
        $Mahajan_Expense -> member_id = $req -> name;
        $Mahajan_Expense -> details =ucfirst($req -> details);
        $Mahajan_Expense -> amount = $req -> amount;
        $Mahajan_Expense -> inword = $req -> total_in_word;
        $Mahajan_Expense->save();
        return back()->with("Update Sangh Expense");
    }
    public function delete_sangh_expense($id)
    {
        $Mahajan_Expense=Sangh_Expense::find($id);
        $Mahajan_Expense->delete();
        return back()->with("Delete Sangh Expense");
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
