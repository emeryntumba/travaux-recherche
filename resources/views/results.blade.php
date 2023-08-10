@extends('layouts.app')

@section('title', 'Resultat')

@section('content')

<section class="banner_main">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="text-bg">
                <div class="padding_lert">
                   <h1>Archiver votre Travail ici</h1>
                   <span>Nous en prendrons soin :)</span>
                   <p>Sauvegardez votre oeuvre scientifique en toute quiétude et facilité. Permettez aux autres générations de s'en inspirer sans soucis de plagiat. Des filtres de recherche avancés qui vous facilitent de retrouver rapidement un travail</p>
                   <a href="#formulaire"><i class="bi bi-arrow-down" style="font-size: 20px;"></i></a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

 <section id="formulaire">
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2">
            @foreach ($results as $travail)
            <div class="col mb-4">
                <div class="card" style="width:18rem">
                  <div class="card-body">
                    <h5 class="card-title">Sujet: {{$travail->intitule}}</h5>
                    <p class="card-text">Auteur: {{$travail->auteur}}</p>
                    <p class="card-text">Thème: {{$travail->theme}}</p>
                    <p class="card-text">Directeur: {{$travail->directeur}}</p>
                    <p class="card-text">Encadreur: {{$travail->encadreur}}</p>
                    <p class="card-text">Type de travail: {{$travail->type_travail}}</p>
                    <p class="card-text">Date de publication: {{$travail->annee_publication}}</p>
                    <a href="#" class="btn btn-primary">Télécharger</a>
                  </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
 </section>

@endsection
