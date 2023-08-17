<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use App\Models\Travail;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Barryvdh\DomPDF\Facade\Pdf;

class ArchiveController extends VoyagerBaseController
{

    protected $session;

    public function __construct(Store $session)
    {
        $this->session =$session;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = Auth::user();
        if ($user->role_id == 1){
            return parent::index($request);
        }

        $travaux = Travail::all()->where('user_id', $user_id)->sortDesc();
        $this->session->put('results', $travaux);
        return view('archives.index', compact('travaux'));
    }

    public function generatePDF(){
        $results = $this->session->get('results');
        $pdf = Pdf::loadView('outputs.pdf', ['results' => $results]);
        return $pdf->download('rapport.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        if ($user->role_id == 1){
            return parent::create($request);
        }
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
        $user = Auth::user();
        if ($user->role_id == 1){
            return parent::store($request);
        }
        return redirect()->route('archiver');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Travail  $travail
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->role_id == 1){
            return parent::show($request, $id);
        }
        $travail = Travail::find($id);
        return view('archives.show', compact('travail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Travail  $travail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $user_id = Auth::user()->id;
        $user = Auth::user();
        if ($user->role_id == 1){
            return parent::edit($request, $id);
        }
        $travail = Travail::findOrFail($id);
        if ($travail->user_id != $user->id){
            abort(403, 'Vous n\'avez pas droit à accéder à cette ressource.');
        }
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
        $user = Auth::user();
        if ($user->role_id == 1){
            return parent::update($request, $id);
        }
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

        return redirect()->route('travail')->with('succes', "Modification avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Travail  $travail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->role_id == 1){
            return parent::destroy($request, $id);
        }
        $travail = Travail::find($id);
        $travail->delete();
        return redirect()->to(route('travail'));
    }
}
