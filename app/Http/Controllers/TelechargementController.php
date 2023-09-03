<?php

namespace App\Http\Controllers;

use App\Models\Telechargement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TelechargementController extends Controller
{
    //
    public function index(){
        $user_id = Auth::user()->id;
        $results = Telechargement::all()->where('user_id', $user_id);
        return view('download.index', compact('results'));
    }

    public function store(Request $request, $id){
        $telechargement = new Telechargement();
        $telechargement->user_id = Auth::user()->id;
    }
}
