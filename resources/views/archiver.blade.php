@extends('layouts.app')

@section('title', 'Archiver')

@section('content')
<!-- banner -->
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
 <!-- end banner -->

 <section id="formulaire">
    <div class="container">
       <div class="row mt-3">
        @if(session()->has('archivage-success'))
            <div class="col-12">
                <p class="alert alert-success">{{session('archivage-success')}}</p>
            </div>
        @endif
          <div class="col-md-12">
             <form class="" method="POST" action="{{route('save-archive')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                   <div class="col-md-4">
                      <label class="date">Intitulé</label>
                      <input class="book_n"  type="text" name="intitule">
                   </div>
                   <div class="col-md-4">
                      <label class="date">Auteur</label>
                      <input class="book_n" type="text" name="auteur">
                   </div>
                   <div class="col-md-4">
                      <label class="date">Theme</label>
                      <input class="book_n" name="theme">
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
                        <label for="type_travail">Type de Travail</label>
                        <select class="book_n form-control" id="type_travail" name="type_travail">
                          <option value="TFC">TFC</option>
                          <option value="TFE">TFE</option>
                          <option value="RS">RS</option>
                          <option value="DEA">DEA</option>
                          <option value="THESE">THESE</option>
                        </select>
                      </div>
                     <div class="col-md-4">
                        <label class="date">Fichier</label>
                        <input class="book_n form-control" type="file" name="file">
                     </div>
                     <div class="col-md-4">
                        <label class="date">Date de Publication</label>
                        <input class="book_n" type="date" name="date">
                     </div>
                   <div class="col-md-4">
                      <button class="book_btn" type="submit">Enregistrer<i></i></button>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </section>


 <div class="our">
    <div class="container">
       <div class="row d_flex">
          <div class="col-md-6">
             <div class="img_box">
                <figure><img src="{{asset('assets/images/img4.jpg')}}" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-6">
             <div class="our_box">
                <div class="titlepage">
                   <h2><span class="text_norlam">Our Best </span> <br>Breakfast</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
                <a class="read_more" href="#">Read More</a>
             </div>
          </div>
       </div>
    </div>
 </div>

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
@endsection
