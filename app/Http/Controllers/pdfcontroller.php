<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
class pdfcontroller extends Controller
{
    public function pdf_Religious_Donation()
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Hello BABA</h1>');
        // return $pdf->stream();
        
    $pdf = Pdf::loadView('pdf.pdf_Religious_Donation')->setPaper('a5', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote', TRUE]);
    return $pdf->stream();
    }

    public function pdf_Community_Donation()
    {   
    $pdf = Pdf::loadView('pdf.pdf_Community_Donation')->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote', TRUE]);
    return $pdf->stream();
    }

    public function pdf_General_Donation()
    {   
    $pdf = Pdf::loadView('pdf.pdf_General_Donation')->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote', TRUE]);
    return $pdf->stream();
    }

    public function pdf_Expense_Receipt()
    {   
    $pdf = Pdf::loadView('pdf.pdf_Expense_Receipt')->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote', TRUE]);
    return $pdf->stream();
    }

    public function pdf_CheckIn($id)
    {
        $room_booking=DB::SELECT("SELECT *,add_members.p_id as m_id from room_details join add_room on add_room.room_detail_id=room_details.r_id join personal_details on personal_details.p_id=room_details.member_id join add_members on personal_details.member_id=add_members.p_id WHERE r_id='$id'");
        $member_detail=DB::SELECT("SELECT * from member_details WHERE room_id='$id'");

        $pdf = Pdf::loadView('pdf.pdf_Checkin',['room_booking'=>$room_booking,'member_detail'=>$member_detail])->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote', TRUE]);
        return $pdf->stream();
    }
    public function pdf_CheckOut($id)
    {
        $checkout=DB::SELECT("SELECT * from checkout WHERE rec_no='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Checkout',['checkout'=>$checkout])->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote', TRUE]);
        return $pdf->stream();
    }
}
