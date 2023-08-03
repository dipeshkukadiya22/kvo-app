<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\community_donation;
use DB;

class pdfcontroller extends Controller
{
    public function pdf_Religious_Donation($id)
    {   
        $religious_donation=DB::select("SELECT * FROM `religious_donation` join add_members where religious_donation.member_id=add_members.p_id and religious_donation.religious_donation_id='$id'");
        $pdf = Pdf::loadView('pdf.pdf_Religious_Donation',['religious_donation'=>$religious_donation])->setPaper('a5', 'potrait')->setOptions(['defaultFont' => 'NotoSansGujarati-Regular','enable_remote',True]);
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
