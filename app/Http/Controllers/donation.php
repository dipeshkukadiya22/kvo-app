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

        $religious_donation->member_id = $req->name;
        $religious_donation -> haste = strtoupper($req -> haste);
        $religious_donation -> r_date = Carbon::now();
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
        $religious_donation -> other_account_name = ucfirst($req -> other_account_name);
        $religious_donation -> other_account_amount = $req -> other_account_amount;
        $religious_donation -> remarks =ucfirst($req -> remarks);
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
    public function View_Religious_Donation()
    {
        $donation=DB::SELECT("SELECT * FROM `religious_donation` join add_members where religious_donation.member_id=add_members.p_id ORDER by religious_donation_id desc");
        $member=add_members::get();
        return view('Donation.View_Religious_Donation',['donation' => $donation,'member' =>$member]);
    }
    public function get_religious_donation($id)
    {
        $donation=DB::SELECT("SELECT * FROM `religious_donation` join add_members where religious_donation.member_id=add_members.p_id and religious_donation.religious_donation_id='$id'");
        return $donation;
    }
    public function update_religious_donation(Request $req)
    { 
        $donation=religious_donation::find($req->religious_donation_id);
        $donation->haste=strtoupper($req->haste);
        $donation->remarks=ucfirst($req->remarks);
        $donation->member_id=$req->name;
        $donation->community=$req->community;
        $donation->sarv_sadharan=$req->sarva_sadharan;  
        $donation->jiv_daya=$req->jiv_daya;
        $donation->shadhu_shdhvi=$req->sadhu_sadhvi;  
        $donation->sadharmik=$req->sadhrmik; 
        $donation->chaturmas=$req->chaaturmash;  
        $donation->kayami_tithi=$req->kayami_tithi;  
        $donation->devdravya=$req->dev_dravya;  
        $donation->kesar_sukhad=$req->kesar_sukhad;  
        $donation->dhoop_deep=$req->dhoop_deep; 
        $donation->snatra_puja=$req->snatra_pooja;  
        $donation->moti_pooja=$req->moti_pooja;  
        $donation->agani_pooja=$req->aangi_pooja;  
        $donation->drut_boli=$req->dhrut_boli;  
        $donation->other_account_amount=$req->other;  
        $donation->total=$req->total;  
        $donation->total_in_word=$req->total_in_word;  
        $donation->payment_mode=$req->payment;  
        $donation->remarks=$req->remarks;  
        $donation->save();
        return back()->with("Update Religious Donation");
    }
    public function delete_religious_donation($id)
    {
        $donation=religious_donation::find($id);
        $donation->delete();
        return back()->with("Delete Religious Donation");
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
        
     
        $community_donation -> member_id = $req -> name;
   
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
    public function View_Community_Donation(){
        $donation=DB::SELECT("SELECT * FROM `community_donation` join add_members where add_members.p_id=community_donation.member_id ORDER by donation_id desc");
        $member=add_members::all();
        return view('Donation.View_Community_Donation',['donation'=> $donation,'member' => $member]);
    }
    public function get_community_donation($id){
        
        $data=DB::SELECT("SELECT * FROM `community_donation` join add_members where add_members.p_id=community_donation.member_id and donation_id='$id'");
     
        return $data;
    }
    public function delete($id)
    {
        $donation=community_donation::find($id);
        $donation->delete();
    return back()->with("Delete Community Donation");
    }
    public function update_community_donation(Request $req)
    {
        $community_donation=community_donation::find($req->donation_id);
        $community_donation -> d_date = $req -> date;
        $community_donation -> medical_checkup = $req -> medical_checkup;
        $community_donation -> mahajan = $req -> mahajan;
        $community_donation -> bhojanshala = $req -> bhojanshala;
        $community_donation -> shaikshanik = $req -> shaikshanik;
        $community_donation -> lavajam = $req -> lavajam;
        $community_donation -> oxygen = $req -> oxygen;
        $community_donation -> ambulance = $req -> ambulance;
        $community_donation -> other = $req -> other;
        $community_donation -> remarks =ucfirst( $req -> remarks);
        $community_donation -> total = $req -> total;
        $community_donation -> total_in_word = $req -> total_in_word;
        $community_donation -> payment_mode = $req -> payment;
        $community_donation->save();
        return back()->with("Update Community Donation");
    }
    public function General_Donation(){
        $member = DB::SELECT("select * from add_members");
        $depo_id=GeneralDonation::get()->last()->depo_id;
        return view ('Donation.General_Donation',['member'=>$member,'depo_id' => $depo_id]);
    }
    public function add_general_donation(Request $req)
    {
        $donation=new GeneralDonation();
        $donation->date=Date(('Y-m-d'),strtotime($req->date));
        $donation->haste=strtoupper($req->haste);
        $donation -> community = $req -> community;
        $donation->details=strtoupper($req->details);
        $donation->member_id=$req->name;
        $donation->save();
        return back()->with("Add General Donation");
    }
    public function view_general_donation()
    {
        $donation=DB::SELECT("SELECT * FROM `GeneralDonation` join add_members WHERE GeneralDonation.member_id=add_members.p_id order by depo_id desc");
        $member = DB::SELECT("select * from add_members");
        return view('Donation.View_General_Donation',['donation'=>$donation,'member' => $member]);
    }
    public function get_general_donation($id)
    {
        $donation=DB::SELECT("SELECT * FROM `GeneralDonation` join add_members WHERE GeneralDonation.member_id=add_members.p_id and depo_id='$id'");
        return $donation;
    }
    public function update_general_donation(Request $req)
    {
        $donation=GeneralDonation::find($req->depo_id);
        $donation->date=Date(('Y-m-d'),strtotime($req->date));
        $donation->haste=strtoupper($req->haste);
        $donation->community=$req->community;
        
        $donation->details=strtoupper($req->details);
        $donation->member_id=$req->name;
        $donation->save();
        return back()->with("Update General Donation");
    }
    public function delete_general_donation($id)
    {
        $donation=GeneralDonation::find($id);
        $donation->delete();
        return back()->with("Delete General Donation");
    }
    public function General_Donation_Report(){
        return view ('Donation.General_Donation_Report');
    }

    public function add_member(Request $req){
        $member = new add_members();
        $member->m_name = strtoupper($req->m_name);
        $member->email = $req->email;
        $member->phone_no = $req->phone_no;
        $member->city = strtoupper( $req->city);
        $member->save();
        $m_data=add_members::all();
        $depo_id = GeneralDonation::get()->last()->depo_id;
        return view('Donation.General_Donation',['member'=>$member,'m_data'=>$m_data,'depo_id' => $depo_id]);
    }
}
