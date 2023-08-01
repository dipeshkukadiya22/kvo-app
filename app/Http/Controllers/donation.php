<?php

namespace App\Http\Controllers;

use App\Models\community_donation;
use Illuminate\Support\Facades\DB;
use App\Models\GeneralDonation;
use App\Models\add_members;
use App\Models\religious_donation;

use Carbon\Carbon;

use Illuminate\Http\Request;

class donation extends Controller
{
    // Religious Donation
    public function index1(){

        $m_name =(religious_donation::get()->last()->m_name);
        $p_details=religious_donation::with('member')->get();
        $m_data = add_members::all();
        $religious_donation_id = religious_donation::get() -> last() ->religious_donation_id;
        
        
        return view ('Donation.Religious_Donation',['m_name' => $m_name, 'p_details' => $p_details, 'religious_donation_id' => $religious_donation_id, 'm_data' => $m_data]);

        // return view ('Donation.Religious_Donation');
    }
    public function view_donation(){
      
    }
    public function Religious_Donation(Request $req){


        $m_name =(religious_donation::get()->last()->m_name);
        $p_details=religious_donation::with('member')->get();
        $m_data = add_members::all();
        $data = religious_donation::find($req -> religious_donation_id);

        $religious_donation_id = religious_donation::get() -> last() -> religious_donation_id;

        $religious_donation = new religious_donation();
        
        //Personal Details
        $religious_donation -> name = $req -> name;
        $religious_donation -> haste = $req -> haste;
        $religious_donation -> r_date = Carbon::now();
        $religious_donation -> phone_no = $req -> phone_no;
        $religious_donation -> city = $req -> city;
        $religious_donation -> community = $req -> community;
        //Donation Details
        $religious_donation -> sarv_sadharan = $req -> sarv_sadharan;
        $religious_donation -> jiv_daya = $req -> jiv_daya;
        //dd($req->jiv_daya);
        $religious_donation -> shadhu_shdhvi = $req -> shadhu_shdhvi;
        $religious_donation -> sadharmik = $req -> sadharmik;
        $religious_donation -> chaturmas = $req -> chaturmas;
        $religious_donation -> kayami_tithi = $req -> kayami_tithi;
        $religious_donation -> devdravya = $req -> devdravya;
        $religious_donation -> kesar_sukhad = $req -> kesar_sukhad;
        $religious_donation -> dhoop_deep = $req -> dhoop_deep;
        $religious_donation -> snatra_puja = $req -> snatra_puja;
        $religious_donation -> agani_pooja = $req -> agani_pooja;
        $religious_donation -> moti_pooja = $req -> moti_pooja;
        $religious_donation -> drut_boli = $req -> drut_boli;
        $religious_donation -> other_account_name = $req -> other_account_name;
        $religious_donation -> other_account_amount = $req -> other_account_amount;
        $religious_donation -> remarks = $req -> remarks;
        $religious_donation -> total = $req -> total;
        $religious_donation -> total_in_word = $req -> total_in_word;
        $religious_donation -> payment_mode = $req -> basic_default_radio;
        $religious_donation -> save();

        // return view ('Donation.Religious_Donation');
        if($religious_donation) { 

            return redirect() -> route('Religious_Donation') -> with ('message', 'Form submitted successfully!') -> with 
            (['p_details'=>$p_details,'m_name'=>$m_name,'m_data'=>$m_data, 'data'=>$data, 'religious_donation_id' => $religious_donation_id ]);

        }
        else{

            return redirect() -> route('Religious_Donation') -> with ('message', 'your data not submit') -> with 
            (['p_details'=>$p_details,'m_name'=>$m_name,'m_data'=>$m_data, 'data'=>$data, 'religious_donation_id' => $religious_donation_id ]);

        }
    }


    // Community Donation
    public function index(){

        $m_name =(community_donation::get()->last()->m_name);
        $p_details=community_donation::with('member')->get();
        $m_data = add_members::all();
        $donation_id = community_donation::get()->last()->donation_id;
        
        return view ('Donation.Community_Donation',['m_name' => $m_name, 'p_details' => $p_details, 'donation_id' => $donation_id, 'm_data' => $m_data]);
    }
    
    public function Community_Donation(Request $req){


        $m_name =(community_donation::get()->last()->m_name);
        $p_details=community_donation::with('member')->get();
        $m_data = add_members::all();
        $data = community_donation::find($req->donation_id);

        $donation_id = community_donation::get()->last()->donation_id;

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

        if($community_donation) { 

            return redirect() -> route('Community_Donation') -> with ('message', 'Form submitted successfully!') -> with 
            (['p_details'=>$p_details,'m_name'=>$m_name,'m_data'=>$m_data, 'data'=>$data, 'donation_id' => $donation_id ]);

        }
        else{

            return redirect() -> route('Community_Donation') -> with ('message', 'your data not submit') -> with 
            (['p_details'=>$p_details,'m_name'=>$m_name,'m_data'=>$m_data, 'data'=>$data, 'donation_id' => $donation_id ]);

        }


        //$m_data= DB::select("select * from member_details ORDER BY add_members.p_id DESC");
        //return view ('Donation.Community_Donation',['p_details'=>$p_details,'m_name'=>$m_name,'m_data'=>$m_data, 'data'=>$data ]);

        

        //return view ('Donation.Community_Donation');
    }
    public function view_comm_donation(){
        $donation=community_donation::all();
        return view('Donation.View_Community_Donation',['donation'=> $donation]);
    }
    public function get($id){
        $data=community_donation::find($id);
        //dd($data);
        
        return $data;
    }
    public function delete($id)
    {
        $donation=community_donation::find($id);
        $donation->delete();
        //return back()->with("Delete Community Donation");
    }
    public function update_community_donation(Request $req)
    {
        $community_donation=community_donation::find($req->donation_id);
        $community_donation -> medical_checkup = $req -> medical_checkup;
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
        $community_donation->save();
        return back()->with("Update Community Donation");
    }
    public function General_Donation(){
    
        return view ('Donation.General_Donation');

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
