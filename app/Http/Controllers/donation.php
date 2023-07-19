<?php

namespace App\Http\Controllers;

use App\Models\community_donation;
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

        $m_name =(community_donation::get()->last()->m_name);
        $p_details=community_donation::with('member')->get();
        $m_data = add_members::all();
        $donation_id=add_members::get()->last()->donation_id;

        return view ('Donation.Community_Donation',['m_name' => $m_name, 'p_details' => $p_details, 'donation_id' => $donation_id, 'm_data' => $m_data]);
    }
    
    public function Community_Donation(Request $req){

        $m_name =(community_donation::get()->last()->m_name);
        $p_details=community_donation::with('member')->get();
        $m_data = add_members::all();
        $data = community_donation::find($req->donation_id);

        $community_donation = new community_donation();
        
        //Personal Details
        $community_donation -> name = $req -> name;
        //dd($req);
        $community_donation -> phone_no = $req -> phone_no;
        $community_donation -> city = $req -> city;
        
        $community_donation->d_date = Carbon::now();
        
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


        //$m_data= DB::select("select * from member_details ORDER BY add_members.p_id DESC");
        return view ('Donation.Community_Donation',['p_details'=>$p_details,'m_name'=>$m_name,'m_data'=>$m_data, 'data'=>$data ]);



        //return view ('Donation.Community_Donation');
    }

    public function General_Donation(){
        return view ('Donation.General_Donation');
    }

    public function General_Donation_Report(){
        return view ('Donation.General_Donation_Report');
    }
}
