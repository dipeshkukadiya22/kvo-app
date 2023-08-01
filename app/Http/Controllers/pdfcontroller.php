<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\community_donation;
use DB;

class pdfcontroller extends Controller
{
    public function pdf_Religious_Donation()
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Hello BABA</h1>');
        // return $pdf->stream();
        
    $pdf = Pdf::loadView('pdf.pdf_Religious_Donation')->setPaper('a5', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote',True]);
    return $pdf->stream();
    }

    public function pdf_Community_Donation($id)
    {   
        $community_donation=DB::select("SELECT * FROM `community_donation` join add_members WHERE add_members.p_id=community_donation.member_id and donation_id='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Community_Donation',['community_donation'=>$community_donation])->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
        return $pdf->stream();
    }

    public function pdf_General_Donation()
    {   
    $pdf = Pdf::loadView('pdf.pdf_General_Donation')->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
    return $pdf->stream();
    }

    public function pdf_Expense_Receipt()
    {   
         $data=DB::select("SELECT * FROM Mahajan_Expense");
    
    $pdf = Pdf::loadView('pdf.pdf_Expense_Receipt',compact('data'))->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
    return $pdf->stream();
    }

    public function pdf_Religious_Expense_Receipt()
    {   
    $pdf = Pdf::loadView('pdf.pdf_Religious_Expense_Receipt')->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
    return $pdf->stream();
    }

    public function pdf_Checkout()
    {
    $pdf = Pdf::loadView('pdf.pdf_Checkout')->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
    return $pdf->stream();
    }

    public function pdf_Advance_Deposit()
    {
    $pdf = Pdf::loadView('pdf.pdf_Advance_Deposit')->setPaper('a5', 'potrait')->setOptions(['defaultFont' => 'KAP119']);
    return $pdf->stream();
    }

    public function pdf_Checkin()
    {
    $pdf = Pdf::loadView('pdf.pdf_Checkin')->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'KAP119']);
    return $pdf->stream();
    }

    public function pdf_Medical_Treatment($id)
    {   
        $medical=DB::select("SELECT * FROM medical join add_members where add_members.p_id=medical.p_id and sr_no='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Medical_Treatment',['medical' => $medical])->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
        return $pdf->stream();
    }
}
