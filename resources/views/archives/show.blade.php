@extends('archives.layout.archive')

@section('content')

@include('archives.components.header')

@include('archives.components.sidebar')

  <main id="main" class="main">


        <a href="{{route('travail-edit', $travail->id)}}"><Button class="btn btn-primary my-3 px-4 py-1 mx-1">Edit</Button></a>


        <div class="card">
            <div class="card-body  pt-2">

                <div class="control-group col">
                    <label for="label">Auteur</label>
                    <input type="text" class="form-control" id="label" name="auteur" value="{{$travail->auteur}}" disabled />
                </div>

                <div class="control-group col">
                    <label for="price">Intitule</label>
                    <input type="text" class="form-control" id="price"  name="intitule" value="{{$travail->intitule}}" disabled />
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Theme</label>
                    <input type="text" class="form-control" id="desc"  name="theme" value="{{$travail->theme}}" disabled/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Type de travail</label>
                    <input type="text" class="form-control" id="desc"  name="type_travail" value="{{$travail->type_travail}}" disabled/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Directeur</label>
                    <input type="text" class="form-control" id="desc"  name="directeur" value="{{$travail->directeur}}" disabled/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Encadreur</label>
                    <input type="text" class="form-control" id="desc"  name="encadreur" value="{{$travail->encadreur}}" disabled/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Fichier</label>
                    <input type="file" class="form-control" id="desc"  name="theme" value="{{$travail->file}}" disabled/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Date de publication</label>
                    <input type="text" class="form-control" id="desc"  name="theme" value="{{$travail->annee_publication}}" disabled/>
                    <p class="help-block text-danger"></p>
                </div>

            </div>
        </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



@endsection
