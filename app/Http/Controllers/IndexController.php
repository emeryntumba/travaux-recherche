<?php

namespace App\Http\Controllers;

use App\Models\Travail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    //
    protected $session;

    public function __construct(Store $session)
    {
        $this->session =$session;
    }
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

        $latest = Travail::latest()->take(9)->get();

        return view('index', [
            'results' => $results,
            'latest' => $latest
        ]);
    }


    public function archiver(){
        if (Auth::user()->role_id == 3){
            return redirect()->route('index')->with('error', "Vous n'avez pas le droit d'archiver, veuillez créer un compte archiviste");
        }
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

        $this->session->put('results', $results);
        return view('results', ['results' => $results]);
    }

    public function generatePDF(){
        $results = $this->session->get('results');
        $pdf = Pdf::loadView('outputs.pdf', ['results' => $results]);
        return $pdf->stream('rapport.pdf');
    }

    public function telecharger($name){

        $path = 'storage/' . $name;
        if (auth()->check()){
            return Storage::download($path);
        }
    }
}
