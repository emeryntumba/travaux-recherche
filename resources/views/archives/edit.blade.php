@extends('archives.layout.archive')

@section('content')

@include('archives.components.header')

@include('archives.components.sidebar')

  <main id="main" class="main">

    <form action="{{route('travail-update', $travail->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-body  pt-2">

                <div class="control-group col">
                    <label for="label">Auteur</label>
                    <input type="text" class="form-control" id="label" name="auteur" value="{{$travail->auteur}}" />
                </div>

                <div class="control-group col">
                    <label for="price">Intitule</label>
                    <input type="text" class="form-control" id="price"  name="intitule" value="{{$travail->intitule}}"/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Theme</label>
                    <input type="text" class="form-control" id="desc"  name="theme" value="{{$travail->theme}}"/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Type de travail</label>
                    <input type="text" class="form-control" id="desc"  name="type_travail" value="{{$travail->type_travail}}"/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Directeur</label>
                    <input type="text" class="form-control" id="desc"  name="directeur" value="{{$travail->directeur}}"/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Encadreur</label>
                    <input type="text" class="form-control" id="desc"  name="encadreur" value="{{$travail->encadreur}}"/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Fichier</label>
                    <input type="file" class="form-control" id="desc"  name="file" value="{{$travail->file}}"/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <label for="desc">Date de publication</label>
                    <input type="text" class="form-control" id="desc"  name="date_publication" value="{{$travail->annee_publication}}"/>
                    <p class="help-block text-danger"></p>
                </div>

                <div class="control-group col">
                    <button type="submit" class="btn btn-success mt-3">Modifier</button>
                </div>

            </div>
        </div>

    </form>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



@endsection
