<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{

    public function generatePDF(){
        $results = session()->get('results');
        $pdf = Pdf::loadView('outputs.pdf', ['results' => $results]);
        return $pdf->stream('rapport.pdf');
    }
}
