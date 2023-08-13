<?php

namespace App\Http\Controllers;

use App\Models\Travail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class TravailController extends VoyagerBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $this->authorize('browse', app(Travail::class));
        $travaux = auth()->user()->travails;
        return parent::index($request);
    }

}
