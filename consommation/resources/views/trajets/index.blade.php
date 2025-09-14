<x-layout>
    <h1>Liste des trajets</h1>

    @if($trajets->isEmpty())
        <p>Aucun trajet trouvé.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Voiture</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Destination</th>
                    <th>Vitesse Moyenne</th>
                    <th>Consommation Moyenne</th>
                    <th>Energie recuperee</th>
                    <th>Consommation climatisation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="{{ route('trajets.store') }}" method="POST">
                        @csrf
                        <td>
                            <select name="id_voiture" required>
                                @foreach ($voitures as $voiture)
                                    <option value="{{ $voiture->id }}">{{ $voiture->manufacturer }} ({{ $voiture->model }})
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="date" name="date" required></td>
                        <td><input type="text" name="type_trajet" required></td>
                        <td><input type="text" name="destination" required></td>
                        <td><input type="number" name="vitesse_moyenne" required></td>
                        <td><input type="number" name="consommation_moyenne" required></td>
                        <td><input type="number" name="energie_recuperee" required></td>
                        <td><input type="number" name="consommation_climatisation" required></td>
                        <td style="border: none;">
                            <button type="submit">Ajouter</button>
                        </td>
                    </form>
                </tr>
                @foreach($trajets as $trajet)
                    <tr>
                        <td>{{ $trajet->voiture->manufacturer }} {{ $trajet->voiture->model }}</td>
                        <td>{{ $trajet->date }}</td>
                        <td>{{ $trajet->type_trajet }}</td>
                        <td>{{ $trajet->destination }}</td>
                        <td>{{ $trajet->vitesse_moyenne }}</td>
                        <td>{{ $trajet->consommation_moyenne }}</td>
                        <td>{{ $trajet->energie_recuperee }}</td>
                        <td>{{ $trajet->consommation_climatisation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>