<!DOCTYPE html>
<html>
<head>
    <title>Rapport PDF</title>
    <style>
        /* Fichier public/css/pdf.css */

/* Tableau */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

/* En-tête du tableau */
thead th {
    background-color: #f5f5f5;
    text-align: left;
    padding: 8px;
    font-weight: bold;
    border-bottom: 1px solid #ddd;
}

/* Lignes du tableau */
tbody td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

/* Alternance de couleur pour les lignes */
tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Ajouter une marge au tableau */
table {
    margin-bottom: 20px;
}

/* Centrer le texte dans les cellules */
table td, table th {
    text-align: center;
}

/* Appliquer une couleur d'arrière-plan au total */
tfoot td {
    background-color: #f5f5f5;
    font-weight: bold;
}

/* Ajouter une bordure en haut du total */
tfoot td {
    border-top: 2px solid #000;
}

    </style>
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
