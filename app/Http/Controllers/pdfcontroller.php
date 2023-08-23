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
     
        $pdf = Pdf::loadView('pdf.pdf_Checkin',['room_booking'=>$room_booking,'member_detail'=>$member_detail])->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote'=>TRUE]);
        
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
      
        foreach ($room_checkout as $room) {
            if ($room === '301' || $room === '302' || $room === '401' || $room === '402') {
         
                $drc++;
            } elseif ($room === '303' || $room === '304' || $room === '305' || $room === '306' || $room === '403') {
              
                $nonac++;
            } elseif ($room === '201' || $room === '202' || $room === '203' || $room === '204' || $room === '205' || $room === '206' || $room === '404' || $room === '405' || $room === '406') {
              
                $ac++;
            } elseif ($room === '11' || $room === '12' || $room === '13' || $room === '14' || $room === '15' || $room === '16' || $room === '17' || $room === '18' || $room === '19' || $room === '20') {
                
                $dmac++;
            } elseif ($room === '1' || $room === '2' || $room === '3' || $room === '4' || $room === '5' || $room === '6' || $room === '7' || $room === '8' || $room === '9' || $room === '10') {
             
                $dmnonac++;
            }
        }   
 
        $pdf = Pdf::loadView('pdf.pdf_Checkout',['checkout'=>$checkout,'drc'=> $drc ,'nonac'=> $nonac ,'ac'=>$ac,'dmac'=>$dmac,'dmnonac'=>$dmnonac])->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote', TRUE]);
        return $pdf->stream();
      

    }
}

