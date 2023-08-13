<?php

namespace App\Http\Controllers;

use App\Models\Travail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(){
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
        ->whereBetween(DB::raw('YEAR(`annee_publication`)'), [date('Y') - 5, date('Y')])
        ->groupBy(DB::raw('YEAR(`annee_publication`)'))
        ->get();

        $latest = Travail::latest()->take(10)->get();

        return view('index', [
            'results' => $results,
            'latest' => $latest
        ]);
    }


    public function archiver(){
        return view('archiver');
    }

    public function search(Request $request) {
        $auteur = $request->input('auteur');
        $theme = $request->input('theme');
        $intitule = $request->input('intitule');
        $directeur = $request->input('directeur');
        $encadreur = $request->input('encadreur');

        $query = Travail::where(function($query) use ($auteur, $theme, $intitule, $directeur, $encadreur) {
            if ($auteur) {
                $query->where('auteur', 'like', "%$auteur%");
            }
            if ($theme) {
                $query->where('theme', 'like', "%$theme%");
            }
            if ($intitule) {
                $query->where('intitule', 'like', "%$intitule%");
            }
            if ($directeur) {
                $query->where('directeur', 'like', "%$directeur%");
            }
            if ($encadreur) {
                $query->where('encadreur', 'like', "%$encadreur%");
            }
        });


        $results = $query->get();

        session(['results' => $results]);


        return view('results', ['results' => $results]);
    }


}
