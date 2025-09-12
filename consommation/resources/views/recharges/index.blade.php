<x-layout>
    <h1>Liste des recharges</h1>

    @if($recharges->isEmpty())
        <p>Aucune recharge trouvée.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Durée</th>
                    <th>KW Charge</th>
                    <th>Prix KWh</th>
                    <th>PU Charge KWh</th>
                    <th>Coût</th>
                    <th>Pourcentage</th>
                    <th>Commentaire ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recharges as $recharge)
                    <tr>
                        <td>{{ $recharge->id }}</td>
                        <td>{{ $recharge->duree }}</td>
                        <td>{{ $recharge->kw_charge }}</td>
                        <td>{{ $recharge->prix_kwh }}</td>
                        <td>{{ $recharge->pu_charge_kwh }}</td>
                        <td>{{ $recharge->cout }}</td>
                        <td>{{ $recharge->pourcentage }}</td>
                        <td>{{ $recharge->id_commentaire }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>