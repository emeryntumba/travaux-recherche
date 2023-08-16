<!DOCTYPE html>
<html>
<head>
    <title>Rapport PDF</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <h1>Rapport PDF</h1>
    <table class="table table-responsive-sm mt-3">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Auteur</th>
            <th scope="col">Intitule</th>
            <th scope="col">Thème</th>
            <th scope="col">Type de Travail</th>
            <th scope="col">Directeur</th>
            <th scope="col">Encadreur</th>
            <th scope="col">Date de publication</th>
          </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
                <tr>
                    <th scope="row">{{ $result->auteur }}</td>
                    <td>{{ $result->intitule }}</td>
                    <td>{{ $result->theme }}</td>
                    <td>{{ $result->type_travail }}</td>
                    <td>{{ $result->directeur }}</td>
                    <td>{{ $result->encadreur }}</td>
                    <td>{{ $result->annee_publication }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>
