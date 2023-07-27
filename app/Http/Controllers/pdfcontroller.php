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
        
    $pdf = Pdf::loadView('pdf.pdf_Religious_Donation')->setPaper('a5', 'potrait')->setOptions(['defaultFont' => 'KAP119']);
    return $pdf->stream();
    }

    public function pdf_Community_Donation()
    {   
    $pdf = Pdf::loadView('pdf.pdf_Community_Donation')->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
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
}
