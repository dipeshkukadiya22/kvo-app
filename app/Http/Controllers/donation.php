<?php

namespace App\Http\Controllers;

use App\Models\community_donation;
use App\Models\GeneralDonation;
use App\Models\add_members;


use Carbon\Carbon;

use Illuminate\Http\Request;

class donation extends Controller
{
    // Donation Controller 
    public function Religious_Donation(){
        return view ('Donation.Religious_Donation');
    }
    public function index(){
        return view ('Donation.Community_Donation');
    }
    
    public function Community_Donation(Request $req){
        

        $community_donation = new community_donation();

        //Personal Details
        $community_donation -> name = $req -> name;
        $community_donation -> phone_no = $req -> phone_no;
        $community_donation -> city = $req -> city;
        //$community_donation -> d_date = $req -> d_date;

        $community_donation->d_date = Carbon::now();
        //$community_donation -> donation_id  = $req -> donation_id ;

        //Donation Details
        $community_donation -> medical_checkup = $req -> medical_checkup;
        //dd($req -> name);
        $community_donation -> mahajan = $req -> mahajan;
        $community_donation -> bhojanshala = $req -> bhojanshala;
        $community_donation -> shaikshanik = $req -> shaikshanik;
        $community_donation -> lavajam = $req -> lavajam;
        $community_donation -> oxygen = $req -> oxygen;
        $community_donation -> ambulance = $req -> ambulance;
        $community_donation -> other = $req -> other;
        $community_donation -> remarks = $req -> remarks;
        $community_donation -> total = $req -> total;
        $community_donation -> total_in_word = $req -> total_in_word;
        $community_donation -> payment_mode = $req -> basic_default_radio;

        $community_donation -> save();

        return view ('Donation.Community_Donation');
    }

    public function index1(){

        $m_name =(GeneralDonation::get()->last()->m_name);
        $p_details=GeneralDonation::with('member')->get();
        $m_data = add_members::all();
       // $depo_id=add_members::get()->last()->depo_id;
        $depo_id = GeneralDonation::get()->last()->depo_id;
        //dd($depo_id);
        

        return view ('Donation.General_Donation',['m_name' => $m_name, 'p_details' => $p_details, 'm_data' => $m_data,'depo_id'=>$depo_id ]);
    }

    public function General_Donation(Request $req){

        $m_name =(GeneralDonation::get()->last()->m_name);
        $p_details=GeneralDonation::with('member')->get();
        $data = GeneralDonation::find($req->depo_id);
        $m_data = add_members::all();
        $data = GeneralDonation::find($req->depo_id);
        $depo_id = GeneralDonation::get()->last()->depo_id;
        $General_Donation = new GeneralDonation();
        //Personal Details
        $General_Donation -> depo_id  = $req -> depo_id;
        $General_Donation-> date = Carbon::now();
        $General_Donation -> city = $req -> city;
        $General_Donation -> name = $req -> name;
        $General_Donation -> haste = $req -> haste;
        $General_Donation -> phone_no = $req -> phone_no;
        $General_Donation -> details = $req -> details;
       
        $General_Donation -> save();
        return redirect()->route('General_Donation');

       
    }

    public function General_Donation_Report(){
        return view ('Donation.General_Donation_Report');
    }

    public function add_member(Request $req){
        
        //$p_details=personal_details::with('member')->get();
        $member = new add_members();
        $member->m_name = strtoupper($req->m_name);
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = $req->city;
        $member->address = strtoupper($req->collapsible_address);
        $member->save();
        $m_data=add_members::all();
        $depo_id = GeneralDonation::get()->last()->depo_id;
        return view('Donation.General_Donation',['member'=>$member,'m_data'=>$m_data,'depo_id' => $depo_id]);
    }
}
