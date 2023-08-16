<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    //


    public function generatePDF(){
        $results = session('results');
        $pdf = Pdf::loadView('outputs/pdf', $results);
        return $pdf->download('rapport.pdf');
    }
}
