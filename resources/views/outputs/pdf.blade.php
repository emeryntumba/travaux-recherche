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
</body>
</html>
