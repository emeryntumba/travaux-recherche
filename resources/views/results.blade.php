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
        <div class="row ">
            @if (count($results) == 0)
            <div class="alert alert-danger col-12 text-center">Pas de résultat pour cette requete</div>
            @else
                @foreach ($results as $travail)

                <div class="col-md-4">
                    <div class="card my-3">
                        <img src="{{ asset('assets/images/book.jpg')}}" alt="" class="card-img-top" style=" max-height:300px">
                        <div class="card-body">
                        <h5 class="card-title">Sujet: <strong>{{$travail->intitule}}</strong></h5>
                        <p class="card-text">Auteur: <strong>{{$travail->auteur}}</strong></p>
                        <p class="card-text">Thème: <strong>{{$travail->theme}}</strong></p>
                        <p class="card-text">Directeur: <strong>{{$travail->directeur}}</strong></p>
                        <p class="card-text">Encadreur: <strong>{{$travail->encadreur}}</strong></p>
                        <p class="card-text">Type de travail: <strong>{{$travail->type_travail}}</strong></p>
                        <p class="card-text">Date de publication: <strong>{{$travail->annee_publication}}</strong></p>
                        <a href="{{route('telecharger', ['file' => $travail->file ])}}"  class="book_btn">Télécharger</a>
                        </div>
                    </div>
                </div>
                @endforeach

            @endif

        </div>

        @if (count($results) != 0)
        <a href="{{route('generate-pdf')}}"><button type="button" class="btn btn-dark  btn-block">Exporter le résultat</button></a>
        @endif




    </div>
 </section>

@endsection
