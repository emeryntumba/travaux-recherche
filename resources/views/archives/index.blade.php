@extends('archives.layout.archive')

@section('content')

@include('archives.components.header')

@include('archives.components.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Mes archives</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('travail')}}">Home</a></li>
          <li class="breadcrumb-item active">Mes archives</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">


        <a href="{{route('archiver')}}"><button class="btn btn-success ms-4">Ajouter un travail</button></a>
        <a href="{{route('admin-pdf')}}"><button class="btn btn-danger ms-4 text-white">Exporter en PDF</button></a>

            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-hover table-responsive-sm mt-3">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Auteur</th>
                            <th scope="col">Intitule</th>
                            <th scope="col">Thème</th>
                            <th scope="col">Type de Travail</th>
                            <th scope="col">Directeur</th>
                            <th scope="col">Encadreur</th>
                            <th scope="col">Fichier</th>
                            <th scope="col">Date de publication</th>
                            <th scope="col">Mise en ligne</th>
                            <th scope="col">Modifié</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($travaux) == 0)
                                <tr>
                                    <td colspan="13">Vous n'avez enregistré aucun article</td>
                                </tr>
                            @else
                                @foreach($travaux as $travail)
                                <tr>
                                    <th scope="row">{{ $travail->auteur }}</td>
                                    <td>{{ Str::limit($travail->intitule, 20) }}</td>
                                    <td>{{ $travail->theme }}</td>
                                    <td>{{ $travail->type_travail }}</td>
                                    <td>{{ $travail->directeur }}</td>
                                    <td>{{ $travail->encadreur }}</td>
                                    <td>{{ Str::limit($travail->file, 20) }}</td>
                                    <td>{{ $travail->annee_publication }}</td>
                                    <td>{{ $travail->created_at }}</td>
                                    <td>{{ $travail->updated_at }}</td>
                                    <td>
                                        <a href="{{route('travail-edit', $travail->id)}}"><Button class="btn btn-primary mb-1 px-2 py-1 mx-1"><i class="bi bi-pencil"></i></Button></a>

                                        <form action="{{route('travail-delete', $travail->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <Button class="btn btn-danger mb-1 px-2 py-1 mx-1 text-white"><i class="bi bi-trash3"></i></Button>
                                        </form>

                                        <a href="{{route('travail-show', $travail->id)}}"><Button class="btn btn-warning mb-1 px-2 py-1 mx-1 text-white"><i class="bi bi-eye"></i></Button></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>

    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



@endsection
