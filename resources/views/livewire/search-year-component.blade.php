<div class="container mt-3">
    <form wire:submit.prevent="search">
        <input type="text" wire:model="year" placeholder="Entrez l'année">
        <button type="submit" class="read_more" href="#">Rechercher</button>
    </form>


    @if ($results)
    <table class="table mt-3">
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
    @endif

</div>


