<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    //


    public function generatePDF(){

        $results = [
            'auteur' => 'Welcome to ItSolutionStuff.com',
            'intitule' => 'Ok',
            'theme' =>  'name',
            'type_travail' =>  'name',
            'directeur' =>  'name',
            'encadreur' =>  'name',
            'annee_publication' =>  'name',
        ];
        //$results = session('results');
        $pdf = Pdf::loadView('outputs/pdf');
        return $pdf->download('rapport.pdf');
    }
}
