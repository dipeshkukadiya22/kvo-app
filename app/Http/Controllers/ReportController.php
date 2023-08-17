<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    public function religious_donation_report(){
        $daterange=Date("m-01-Y")."-".Date("m-31-Y");
        $donation=DB::SELECT("SELECT * FROM `religious_donation` join add_members on add_members.p_id=religious_donation.member_id");
        return view('Reports.religious_donation_report',['daterange'=>$daterange,'donation'=>$donation]);
    }
    public function show_religious_donation_report(Request $req){
        $daterange=$req->daterange;
        $trust=$req->trust;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $donation=DB::SELECT("SELECT * FROM `religious_donation` join add_members on add_members.p_id=religious_donation.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        return view('Reports.religious_donation_report',['daterange'=>$daterange,'donation'=>$donation]);
    }
    public function religious_category_donation_report(){
        $daterange=Date("m-01-Y")."-".Date("m-31-Y");
        $trust="VIJAYNAGAR";
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $category="sarv_sadharan";
        $donation=DB::SELECT("SELECT add_members.m_name,r." . $category ." as amount,r.r_date,r.haste,r.payment_mode FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        return view('Reports.religious_category_donation_report',['daterange'=>$daterange,'donation'=>$donation]);
    }
    public function show_religious_category_donation_report(Request $req){
        $daterange=$req->daterange;
        $trust=$req->trust;
        $category=$req->category;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $donation=DB::SELECT("SELECT add_members.m_name,r." . $category ." as amount,r.r_date,r.haste,r.payment_mode FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        return view('Reports.religious_category_donation_report',['daterange'=>$daterange,'donation'=>$donation]);
    }
}
