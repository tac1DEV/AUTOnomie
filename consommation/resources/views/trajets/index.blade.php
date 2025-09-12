<x-layout>
    <h1>Liste des trajets</h1>

    @if($trajets->isEmpty())
        <p>Aucun trajet trouvé.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Voiture ID</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Destination</th>
                    <th>Vitesse Moyenne</th>
                    <th>Consommation Moyenne</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trajets as $trajet)
                    <tr>
                        <td>{{ $trajet->id }}</td>
                        <td>{{ $trajet->id_voiture }}</td>
                        <td>{{ $trajet->date }}</td>
                        <td>{{ $trajet->type_trajet }}</td>
                        <td>{{ $trajet->destination }}</td>
                        <td>{{ $trajet->vitesse_moyenne }}</td>
                        <td>{{ $trajet->consommation_moyenne }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>