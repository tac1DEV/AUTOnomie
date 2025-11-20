<x-layout>
    <h1 class="text-2xl font-bold text-center my-8">Liste des trajets</h1>

    <div class="overflow-x-auto px-4">
        <table class="table-fixed w-full border border-gray-300 border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-2 py-1">Date</th>
                    <th class="border border-gray-300 px-2 py-1">Action</th>
                    <th class="border border-gray-300 px-2 py-1">Destination</th>
                    <th class="border border-gray-300 px-2 py-1">Km</th>
                    <th class="border border-gray-300 px-2 py-1">Batterie (%)</th>
                    <th class="border border-gray-300 px-2 py-1">Autonomie (km)</th>
                    <th class="border border-gray-300 px-2 py-1">Type de trajet</th>
                    <th class="border border-gray-300 px-2 py-1">Reset km</th>
                    <th class="border border-gray-300 px-2 py-1">Distance (km)</th>
                    <th class="border border-gray-300 px-2 py-1">Vitesse moy.</th>
                    <th class="border border-gray-300 px-2 py-1">Conso moy.</th>
                    <th class="border border-gray-300 px-2 py-1">Conso tot.</th>
                    <th class="border border-gray-300 px-2 py-1">Énergie récup.</th>
                    <th class="border border-gray-300 px-2 py-1">Conso clim.</th>
                    <th class="border border-gray-300 px-2 py-1">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trajets as $trajet)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-2 py-1 text-center">
                            {{ \Carbon\Carbon::parse($trajet->date)->format('d/m/Y') }}
                        </td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->action }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->destination }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->km }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->pourcentage_batterie }}%</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->autonomie }} km</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->type }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->reset ? 'Oui' : 'Non' }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->distance }} km</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->vitesse_moyenne }} km/h</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->consommation_moyenne }}
                            kWh/100km</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->consommation_totale }} kWh</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->energie_recuperee }} kWh</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">
                            @if(!is_null($trajet->consommation_clim) && $trajet->consommation_clim != 0)
                                {{ $trajet->consommation_clim }} kWh
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="border border-gray-300 px-2 py-1 text-center">
                            <div class="flex justify-center gap-4">
                                <a href="{{ route('trajets.edit', $trajet->id) }}"
                                    class="text-yellow-600 hover:underline">Modifier</a>
                                <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Voulez-vous vraiment supprimer ce trajet ?')"
                                        class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="m-auto w-2/5 my-12">
        {{ $trajets->links() }}
    </div>
</x-layout>