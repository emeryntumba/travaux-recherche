<?php

namespace App\Http\Controllers;

use App\Models\Travail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArchivageController extends Controller
{
    //
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'intitule' => ['required', 'string', 'max:5000', function($attribute, $value, $fail){
                $count = Travail::whereIn('type_travail', ['TFC', 'TFE'])
                ->where('intitule', $value)
                ->count();

                if ($count > 0) {
                    $fail("Archivage échoué, l'intitulé est déjà utilisé pour un travail de type 'TFC' ou 'TFE'");
                }
            }],
            'type_travail' => ['required', 'in:TFC,TFE,RS,DEA,THESE'],
            'auteur' =>'required',
            'theme' => 'required',
            'encadreur' => 'required',
            'directeur' => 'required',
            'file' => ['required', 'file', 'mimes:pdf'],
            'date' => ['required', 'date'],
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $travail = new Travail();
        $travail->intitule = $request->intitule;
        $travail->auteur = $request->auteur;
        $travail->theme = $request->theme;
        $travail->directeur = $request->directeur;
        $travail->encadreur = $request->encadreur;
        $travail->type_travail= $request->type_travail;
        $travail->file = $request->file('file')->storeAs('travaux', $request->file('file')->getClientOriginalName(), 'public');
        $travail->annee_publication = $request->date;
        $travail->user_id = Auth::user()->id;
        $travail->save();

        return redirect()
        ->route('travail')
        ->with('archivage', 'Votre travail a été archivé avec succès, merci pour votre confiance :)');

    }

    public function telecharger($file){

        $path = 'storage/' . $file;
        if (auth()->check()){
            return Storage::download($path);
        }


    }
}
