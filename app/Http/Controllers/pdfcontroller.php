<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

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
    $pdf = Pdf::loadView('pdf.pdf_Expense_Receipt')->setPaper('a5', 'landscape')->setOptions(['defaultFont' => 'KAP119']);
    return $pdf->stream();
    }
}
