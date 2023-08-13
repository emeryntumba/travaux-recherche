
@extends('layouts.app')

@section('title', 'Bibliothèque Archivage')

@section('custom-style')
    @livewireStyles
@endsection

@section('banner')
    @include('components.banner')
@endsection

@section('content')
    <!-- form_lebal -->
    <section>
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <form class="form_book" method="POST" action="{{route('search')}}">
                    @csrf
                    <div class="row">
                       <div class="col-md-4">
                          <label class="date">Intitulé</label>
                          <input class="book_n"  type="text" name="intitule">
                       </div>
                       <div class="col-md-4">
                          <label class="date">Thème</label>
                          <input class="book_n" type="text" name="theme">
                       </div>
                       <div class="col-md-4">
                          <label class="date">Directeur</label>
                          <input class="book_n" name="directeur">
                       </div>
                       <div class="col-md-4">
                            <label class="date">Encadreur</label>
                            <input class="book_n" name="encadreur">
                        </div>
                        <div class="col-md-4">
                            <label class="date">Auteur</label>
                            <input class="book_n" name="auteur">
                         </div>
                       <div class="col-md-4">
                          <button class="book_btn" type="submit">Rechercher <i class="bi bi-search"></i></button>
                       </div>
                    </div>
                 </form>
              </div>
           </div>
        </div>
     </section>
     <!-- end form_lebal -->

     <section>
        <div class="container mt-5">
            <div class="row ">
                @foreach ($latest as $travail)

                <div class="col-md-4">
                    <div class="card my-3">
                        <img src="{{ asset('assets/images/book.jpg')}}" alt="" class="card-img-top" style=" max-height:300px">
                        <div class="card-body">
                          <h5 class="card-title">Sujet: {{$travail->intitule}}</h5>
                          <p class="card-text">Auteur: {{$travail->auteur}}</p>
                          <p class="card-text">Thème: {{$travail->theme}}</p>
                          <p class="card-text">Directeur: {{$travail->directeur}}</p>
                          <p class="card-text">Encadreur: {{$travail->encadreur}}</p>
                          <p class="card-text">Type de travail: {{$travail->type_travail}}</p>
                          <p class="card-text">Date de publication: {{$travail->annee_publication}}</p>
                          <a href="{{route('telecharger', ['file' => $travail->file ])}}"  class="book_btn">Télécharger</a>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
     <!-- our  section -->
     <div class="our">
        <div class="container">
           <div class="row d_flex">
              <div class="col-md-5">
                 <div class="img_box">
                    <figure><img src="{{asset('assets/images/img4.jpg')}}" alt="#"/></figure>
                 </div>
              </div>
              <div class="col-md-7">
                 <div class="our_box">
                    <div class="titlepage">
                       <h2><span class="text_norlam">Statistiques</span> <br>Archives</h2>
                    </div>
                    <p>Faites comme toutes ces personnes qui ont gardé leur travail au meilleur endroit. Le tableau ci-après reprend les statistiques de notre archive sur les 5 dernières années </p>

                    <table class="table table-responsive-sm">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">ANNEE</th>
                            <th scope="col">TFC</th>
                            <th scope="col">TFE</th>
                            <th scope="col">RS</th>
                            <th scope="col">DEA</th>
                            <th scope="col">THESE</th>
                            <th scope="col">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                            <tr>
                                <th scope="row">{{ $result->year }}</td>
                                <td>{{ $result->TFC }}</td>
                                <td>{{ $result->TFE }}</td>
                                <td>{{ $result->RS }}</td>
                                <td>{{ $result->DEA }}</td>
                                <td>{{ $result->THESE }}</td>
                                <td>{{ $result->total }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>

                    @livewire('search-year-component')
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- end our  section -->
     <!-- about -->
     <div id="about"  class="about">
        <div class="container-fluid">
           <div class="row d_flex">
              <div class="col-md-6">
                 <div class="about_text">
                    <div class="titlepage">
                       <h2>About Our Hotel</h2>
                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
                    </div>
                 </div>
              </div>
              <div class="col-md-6">
                 <div class="about_img">
                    <figure><img src="{{asset('assets/images/about_img.jpg')}}" alt="#"/></figure>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- end about -->
@section('custom-js')
     @livewireScripts
@endsection

@endsection
