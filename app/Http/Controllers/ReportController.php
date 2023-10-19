<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    //religious_donation

    public function religious_donation_report(){
        $daterange=Date("m/01/Y")."-".Date("m/30/Y");
       // dd($daterange);
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        //dd($date1);
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
     
        $trust="VIJAYNAGAR";
        $total=DB::SELECT("SELECT sum(total) as amount FROM `religious_donation` join add_members on add_members.p_id=religious_donation.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        $donation=DB::SELECT("SELECT * FROM `religious_donation` join add_members on add_members.p_id=religious_donation.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        return view('Reports.religious_donation_report',['daterange'=>$daterange,'donation'=>$donation,"trust"=>$trust,'total'=>$total]);
    }
    public function show_religious_donation_report(Request $req){
        $daterange=$req->daterange;
        $trust=$req->trust;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
        $total=DB::SELECT("SELECT sum(total) as amount FROM `religious_donation` join add_members on add_members.p_id=religious_donation.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        $donation=DB::SELECT("SELECT * FROM `religious_donation` join add_members on add_members.p_id=religious_donation.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        return view('Reports.religious_donation_report',['daterange'=>$daterange,'donation'=>$donation,"trust"=>$trust,'total'=>$total]);
    }
    public function religious_category_donation_report(){
        $daterange=Date("01-m-Y")."-".Date("31-m-Y");
        $trust="VIJAYNAGAR";
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
        $category="sarv_sadharan";
        $total=DB::SELECT("SELECT sum(sarv_sadharan) as amount FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        $donation=DB::SELECT("SELECT add_members.m_name,r.sarv_sadharan as amount,r.r_date,r.haste,r.payment_mode FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        return view('Reports.religious_category_donation_report',['daterange'=>$daterange,'donation'=>$donation,"trust"=>$trust,'category'=>$category,'total'=>$total]);
    }
    public function show_religious_category_donation_report(Request $req){
        $daterange=$req->daterange;
        $trust=$req->trust;
        $category=$req->category;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
        $total=DB::SELECT("SELECT sum(r." . $category .") as amount FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        $donation=DB::SELECT("SELECT add_members.m_name,r." . $category ." as amount,r.r_date,r.haste,r.payment_mode FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust' and r." . $category ." IS NOT NULL ");
        return view('Reports.religious_category_donation_report',['daterange'=>$daterange,'donation'=>$donation,"trust"=>$trust,'category'=>$category,'total'=>$total]);
    }
    //general Donation

    public function general_donation_report(){
        $daterange=Date("01-m-Y")."-".Date("31-m-Y");
        $trust="VIJAYNAGAR";
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
        $donation=DB::SELECT("SELECT * FROM `GeneralDonation` join add_members on add_members.p_id=GeneralDonation.member_id where date BETWEEN '$date1' and '$date2' and community='$trust'");
        return view('Reports.general_donation_report',['donation'=>$donation,'daterange'=>$daterange,'trust'=>$trust]);
    }
    public function show_general_donation_report(Request $req){
        $daterange = ($req->input('daterange'));
        $trust=$req->trust;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $donation=DB::SELECT("SELECT * FROM `GeneralDonation` join add_members on add_members.p_id=GeneralDonation.member_id where date BETWEEN '$date1' and '$date2' and community='$trust'");
        return view('Reports.general_donation_report',['donation'=>$donation,'daterange'=>$daterange,'trust'=>$trust]);
    }
    
   /* public function general_category_donation_report(){
        $daterange=Date("01-m-Y")."-".Date("31-m-Y");
        $trust="VIJAYNAGAR";
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $total=DB::SELECT("SELECT sum(sarv_sadharan) as amount FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        $donation=DB::SELECT("SELECT add_members.m_name,r.sarv_sadharan as amount,r.r_date,r.haste,r.payment_mode FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2' and community='$trust'");
        return view('Reports.general_donation_report',['daterange'=>$daterange,'donation'=>$donation,"trust"=>$trust,'total'=>$total]);
    }*/
    // community_donation

    public function community_donation_report(){
        $daterange=Date("m/01/Y")."-".Date("m/30/Y");
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
        $total=DB::SELECT("SELECT sum(total) as amount FROM `community_donation` join add_members on community_donation.member_id=add_members.p_id where d_date BETWEEN  '$date1' and '$date2'");
        $donation=DB::SELECT("SELECT * FROM `community_donation` join add_members on community_donation.member_id=add_members.p_id where d_date BETWEEN  '$date1' and '$date2'");
        return view('Reports.community_donation_report',['daterange'=>$daterange,'donation'=>$donation,'total'=>$total]);
    }
    public function show_community_donation_report(Request $req){
        $daterange=$req->daterange;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
        $total=DB::SELECT("SELECT sum(total) as amount FROM `community_donation` join add_members on community_donation.member_id=add_members.p_id where d_date BETWEEN  '$date1' and '$date2'");
        $donation=DB::SELECT("SELECT * FROM `community_donation` join add_members on community_donation.member_id=add_members.p_id where d_date BETWEEN  '$date1' and '$date2'");
        return view('Reports.community_donation_report',['daterange'=>$daterange,'donation'=>$donation,'total'=>$total]);
    }
    public function community_category_donation_report(){
        $daterange=Date("m/01/Y")."-".Date("m/30/Y");
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
       //dd($date1);
        $category="medical_checkup";
        $total=DB::SELECT("SELECT sum(sarv_sadharan) as amount FROM `religious_donation` as r join add_members on add_members.p_id=r.member_id where r_date BETWEEN  '$date1' and '$date2'");
        //SELECT add_members.m_name,cd.d_date,cd.medical_checkup as amount,cd.payment_mode from `community_donation` as cd join add_members on cd.member_id=add_members.p_id where d_date BETWEEN '$date1' and '$date1'
        $donation=DB::SELECT(" SELECT add_members.m_name,cd.d_date,cd. medical_checkup as amount,cd.payment_mode from `community_donation` as cd join add_members on cd.member_id=add_members.p_id where d_date BETWEEN '$date1' and '$date1'");
        return view('Reports.community_category_donation_report',['daterange'=>$daterange,'donation'=>$donation,'category'=>$category,'total'=>$total]);
    }
    public function show_community_category_donation_report(Request $req){
        $daterange=$req->daterange;
        $category=$req->category;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,12)));
        $total=DB::SELECT("SELECT sum(cd." . $category ." ) as amount from `community_donation` as cd join add_members on cd.member_id=add_members.p_id where d_date BETWEEN '$date1' and '$date2' ");
        $donation=DB::SELECT(" SELECT add_members.m_name,cd.d_date,cd." . $category ." as amount,cd.payment_mode from `community_donation` as cd join add_members on cd.member_id=add_members.p_id where d_date BETWEEN '$date1' and '$date2' and cd." . $category ." IS NOT NULL");
        return view('Reports.community_category_donation_report',['daterange'=>$daterange,'donation'=>$donation,'category'=>$category,'total'=>$total]);
    }
    public function expense_report(){
        $daterange=Date("01-m-Y")."-".Date("31-m-Y");
        $trust="SANGH";
        
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $total=DB::SELECT("SELECT SUM(amount) AS amount FROM ( SELECT amount, member_id, date FROM Sangh_Expense UNION ALL SELECT amount, member_id, date FROM Mahajan_Expense ) AS combined_expenses INNER JOIN add_members ON add_members.p_id = combined_expenses.member_id WHERE combined_expenses.date BETWEEN '$date1' AND '$date2'");
        $expense=DB::SELECT("SELECT * FROM `Sangh_Expense` join add_members on add_members.p_id=Sangh_Expense.member_id where date BETWEEN '$date1' and '$date2'");
        return view('Reports.expense_report',['expense'=>$expense,'daterange'=>$daterange,'trust' => $trust,'total'=>$total]);
    }
    public function show_expense_report(Request $req){
        $daterange=$req->daterange;
        $trust=$req->trust;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        if($trust=="SANGH"){
            $total=DB::SELECT("SELECT sum(amount) as amount FROM `Sangh_Expense` as r join add_members on add_members.p_id=r.member_id where date BETWEEN  '$date1' and '$date2' ");
            $expense=DB::SELECT("SELECT * FROM `Sangh_Expense` join add_members on add_members.p_id=Sangh_Expense.member_id where date BETWEEN '$date1' and '$date2'");
        }
        else{
            $total=DB::SELECT("SELECT sum(amount) as amount FROM `Mahajan_Expense` as r join add_members on add_members.p_id=r.member_id where date BETWEEN  '$date1' and '$date2' ");
            $expense=DB::SELECT("SELECT * FROM `Mahajan_Expense` join add_members on add_members.p_id=Mahajan_Expense.member_id where date BETWEEN '$date1' and '$date2'");
        }
       
        return view('Reports.expense_report',['expense'=>$expense,'daterange'=>$daterange,'trust'=>$trust,'total'=>$total]);
    }
    public function medical_report(){
        $daterange=Date("01-m-Y")."-".Date("31-m-Y");
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $data=DB::SELECT("SELECT * FROM medical join add_members on add_members.p_id=medical.p_id where date BETWEEN '$date1' and '$date2'");
        $total=DB::SELECT("SELECT sum(amount) as amount FROM `medical` join add_members on medical.p_id=add_members.p_id where date BETWEEN  '$date1' and '$date2'");
        return view('Reports.medical_report',['data'=>$data,'daterange'=>$daterange,'total'=>$total]);
    }
    public function show_medical_report(Request $req){
        $daterange=$req->daterange;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $total=DB::SELECT("SELECT sum(amount) as amount FROM `medical` join add_members on medical.p_id=add_members.p_id where date BETWEEN  '$date1' and '$date2'");
        $data=DB::SELECT("SELECT * FROM medical join add_members on add_members.p_id=medical.p_id where date BETWEEN '$date1' and '$date2'");
        return view('Reports.medical_report',['data'=>$data,'daterange'=>$daterange,'total'=>$total]);
    }
    public function room_booking_report(){
        $daterange=Date("01-m-Y")."-".Date("31-m-Y");
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $data=DB::SELECT("SELECT * FROM checkout join `room_details`on checkout.room_booking_id=room_details.r_id join personal_details on room_details.member_id=personal_details.p_id join add_members on add_members.p_id=personal_details.member_id WHERE room_details.status='CHECKOUT'and check_out_date BETWEEN  '$date1' and '$date2'");
        $total=DB::SELECT("SELECT sum(total) as amount FROM checkout join `room_details`on checkout.room_booking_id=room_details.r_id join personal_details on room_details.member_id=personal_details.p_id join add_members on add_members.p_id=personal_details.member_id WHERE room_details.status='CHECKOUT' and check_out_date BETWEEN  '$date1' and '$date2'");
        return view('Reports.room_booking_report',['data'=>$data,'daterange'=>$daterange,'total'=>$total]);
    }
    public function show_room_booking_report(Request $req){
        $daterange=$req->daterange;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
        $data=DB::SELECT("SELECT * FROM checkout join `room_details`on checkout.room_booking_id=room_details.r_id join personal_details on room_details.member_id=personal_details.p_id join add_members on add_members.p_id=personal_details.member_id WHERE room_details.status='CHECKOUT'and check_out_date BETWEEN  '$date1' and '$date2'");
        $total=DB::SELECT("SELECT sum(total) as amount FROM checkout join `room_details`on checkout.room_booking_id=room_details.r_id join personal_details on room_details.member_id=personal_details.p_id join add_members on add_members.p_id=personal_details.member_id WHERE room_details.status='CHECKOUT' and check_out_date BETWEEN  '$date1' and '$date2'");
        return view('Reports.room_booking_report',['data'=>$data,'daterange'=>$daterange,'total'=>$total]);
    }
}
