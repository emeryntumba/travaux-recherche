<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use App\Models\Travail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $travaux = Travail::all()->where('user_id', $user_id)->sortDesc();
        return view('archives.index', compact('travaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('archives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Travail  $travail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $travail = Travail::find($id);
        return view('archives.show', compact('travail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Travail  $travail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travail = Travail::find($id);
        return view('archives.edit', compact('travail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Travail  $travail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $travail = Travail::find($id);

        $travail->intitule = $request->intitule;
        $travail->auteur = $request->auteur;
        $travail->theme = $request->theme;
        $travail->type_travail = $request->type_travail;
        $travail->directeur = $request->directeur;
        $travail->annee_publication = $request->date_publication;

        if ($request->file('file') != null){
            $travail->file = $request->file('file')->storeAs('travaux', $request->file('file')->getClientOriginalName(), 'public');
        }

        $travail->update();

        return redirect()->to(route('travail'))->with('succes', "Modification avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Travail  $travail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travail = Travail::find($id);
        $travail->delete();
        return redirect()->to(route('travail'));
    }
}
