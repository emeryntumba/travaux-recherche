<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    //
    public function generatePDF(Request $request){

           $results = DB::table('travails')
            ->select([
                DB::raw('YEAR(`annee_publication`) as year'),
                DB::raw('COUNT(*) as total'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "TFC" THEN 1 END) as TFC'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "TFE" THEN 1 END) as TFE'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "RS" THEN 1 END) as RS'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "DEA" THEN 1 END) as DEA'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "THESE" THEN 1 END) as THESE')
            ])
            ->whereYear('annee_publication', $this->year)
            ->groupBy(DB::raw('YEAR(`annee_publication`)'))
            ->get();


        $pdf = PDF::loadView('pdf', ['results' => $results]);

        return $pdf->download('rapport.pdf');
    }
}
