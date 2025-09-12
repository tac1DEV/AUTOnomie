<x-layout>
    <h1>Liste des voitures</h1>

@if($voitures->isEmpty())
    <p>Aucune voiture trouvée.</p>
@else
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>KM</th>
                <th>Charge batterie</th>
                <th>Autonomie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voitures as $voiture)
                <tr>
                    <td>{{ $voiture->id }}</td>
                    <td>{{ $voiture->manufacturer }}</td>
                    <td>{{ $voiture->model }}</td>
                    <td>{{ $voiture->km }}</td>
                    <td>{{ $voiture->charge_batterie }}</td>
                    <td>{{ $voiture->autonomie }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</x-layout>