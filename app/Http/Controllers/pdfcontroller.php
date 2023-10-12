<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\room_details;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
class pdfcontroller extends Controller
{
   
    public function pdf_CheckIn($id)
    {
        $room_booking=DB::SELECT("SELECT *,add_members.p_id as m_id from room_details join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE r_id='$id'");
        $member_detail=DB::SELECT("SELECT * from member_details WHERE room_id='$id'");
        $img="images/".$room_booking[0]->id_proof;
        $index=strrpos($img,",");
        if($index==false)
        {
            $pdf = Pdf::loadView('pdf.pdf_Checkin',['room_booking'=>$room_booking,'member_detail'=>$member_detail,'img1'=>$img,'img2'=>NULL])->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote'=>TRUE]);    
        }else{
            $img1=substr($img,0,$index);
            $img2="images/".substr($img,$index+1);
            $pdf = Pdf::loadView('pdf.pdf_Checkin',['room_booking'=>$room_booking,'member_detail'=>$member_detail,'img1'=>$img1,'img2'=>$img2])->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote'=>TRUE]);
        }
        return $pdf->stream();
    }
   
    public function pdf_Religious_Donation($id)
    {   
        $religious_donation=DB::select("SELECT * FROM `religious_donation` join add_members where religious_donation.member_id=add_members.p_id and religious_donation.religious_donation_id='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Religious_Donation',['religious_donation'=>$religious_donation])->setPaper('a5', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote',True]);
        return $pdf->stream();

    }
    public function pdf_CheckOut($id)
    {
        $checkout=DB::SELECT("SELECT *,add_members.p_id as m_id from room_details left join personal_details on personal_details.p_id=room_details.member_id left join add_members on personal_details.member_id=add_members.p_id left Join checkout on checkout.room_booking_id = room_details.r_id WHERE rec_no= '$id'");
        $room_checkout = $checkout[0]->room_list;


        $drc = 0;
        $nonac = 0;
        $ac = 0;
        $dmac = 0;
        $dmnonac = 0;

        $checkout = DB::SELECT("SELECT *,add_members.p_id as m_id from room_details left join personal_details on personal_details.p_id=room_details.member_id left join add_members on personal_details.member_id=add_members.p_id left Join checkout on checkout.room_booking_id = room_details.r_id WHERE rec_no= '$id'");

        $room_checkout = explode(",", $checkout[0]->room_list); 
        
        $drc = 0;
        $nonac = 0;
        $ac = 0;
        $dmac = 0;
        $dmnonac = 0;
        $room_no=array();
        $dmt_no=array();
        foreach ($room_checkout as $room) {
            if ($room === '301' || $room === '302' || $room === '401' || $room === '402') {
                array_push($room_no,$room);
                $drc++;
            } elseif ($room === '303' || $room === '304' || $room === '305' || $room === '306' || $room === '403') {
                array_push($room_no,$room);
                $nonac++;
            } elseif ($room === '201' || $room === '202' || $room === '203' || $room === '204' || $room === '205' || $room === '206' || $room === '404' || $room === '405' || $room === '406') {
                array_push($room_no,$room);
                $ac++;
            } elseif ($room === '11' || $room === '12' || $room === '13' || $room === '14' || $room === '15' || $room === '16' || $room === '17' || $room === '18' || $room === '19' || $room === '20') {
                array_push($dmt_no,$room);
                $dmac++;
            } elseif ($room === '1' || $room === '2' || $room === '3' || $room === '4' || $room === '5' || $room === '6' || $room === '7' || $room === '8' || $room === '9' || $room === '10') {
                array_push($dmt_no,$room);
                $dmnonac++;
            }
        }   
 
        $pdf = Pdf::loadView('pdf.pdf_Checkout',['checkout'=>$checkout,'drc'=> $drc ,'nonac'=> $nonac ,'ac'=>$ac,'dmac'=>$dmac,'dmnonac'=>$dmnonac,'room_no'=>$room_no,'dmt_no'=>$dmt_no])->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote', TRUE]);
        return $pdf->stream();
      
    }
  public function pdf_Community_Donation($id)
    {   
        $community_donation=DB::select("SELECT * FROM `community_donation` join add_members WHERE add_members.p_id=community_donation.member_id and donation_id='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Community_Donation',['community_donation'=>$community_donation])->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
        return $pdf->stream();
    }

    public function pdf_General_Donation($id)
    {   
        $general_donatin=DB::select("SELECT * FROM `GeneralDonation` join add_members where GeneralDonation.member_id=add_members.p_id and depo_id='$id'");
        $pdf = Pdf::loadView('pdf.pdf_General_Donation',['general_donation' => $general_donatin])->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
        return $pdf->stream();
    }

    public function pdf_Mahajan_Expense($id)
    {   
        $mahajan_expense=DB::select("SELECT * FROM `Mahajan_Expense` join add_members WHERE Mahajan_Expense.member_id=add_members.p_id and depo_id='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Expense_Receipt',['mahajan_expense' => $mahajan_expense])->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
        return $pdf->stream();
    }
    public function pdf_Sangh_Expense($id)
    {      
        $sangh_expense=DB::select("SELECT * FROM `Sangh_Expense` join add_members WHERE Sangh_Expense.member_id=add_members.p_id and depo_id='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Religious_Expense_Receipt',['sangh_expense' => $sangh_expense])->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
        return $pdf->stream();
    }
    
    public function pdf_Advance_Deposit($id)
    {
        $count=DB::SELECT("SELECT count(*) from booking_deposite WHERE booking_id='$id'");
    
        
            $advance_room_booking=DB::SELECT("SELECT *,add_members.p_id as m_id from room_details join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id join booking_deposite on room_details.r_id=booking_deposite.booking_id WHERE booking_id='$id'");
            $member_detail=DB::SELECT("SELECT * from member_details WHERE room_id='$id'");
            $pdf = Pdf::loadView('pdf.pdf_Advance_Deposit',['advance_room_booking'=>$advance_room_booking,'member_detail'=>$member_detail])->setPaper('a5', 'potrait')->setOptions(['defaultFont' => 'KAP119']);
            return $pdf->stream();
        
    //$advance_room_booking=DB::SELECT("SELECT *,add_members.p_id as m_id from room_details join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE r_id='$id'");
       
    }
    public function pdf_Medical_Treatment($id)
    {  
        //dd("HI") ;
        $medical=DB::select("SELECT * FROM medical join add_members where add_members.p_id=medical.p_id and sr_no='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Medical_Treatment',['medical' => $medical])->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
        return $pdf->stream();
    }
}

