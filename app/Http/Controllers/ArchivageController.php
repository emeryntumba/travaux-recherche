<?php

namespace App\Http\Controllers;

use App\Models\Travail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchivageController extends Controller
{
    //
    public function store(Request $request){
        $this->validate($request, [
            'intitule' => 'required',
            'auteur' => 'required',
            'theme' => 'required',
            'directeur' => 'required',
            'encadreur' => 'required',
            'type_travail' => 'required',
            'file'=> 'required',
            'date' => 'required'
        ]);


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
        ->route('archiver')
        ->with('archivage-success', 'Votre travail a été archivé avec succès, merci pour votre confiance :)');

    }
}
