<x-layout>
    <h1 class="text-2xl font-bold text-center my-8">Liste des trajets</h1>
    <div class="my-6 flex justify-end">
        <a href="{{ route('trajets.create') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-xl font-medium rounded-xl shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Nouveau trajet
        </a>
    </div>
    <div class="overflow-x-auto px-4">
        <table class="w-full border border-gray-300 border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-2 py-1">Date</th>
                    <th class="border border-gray-300 px-2 py-1">Action</th>
                    <th class="border border-gray-300 px-2 py-1">Destination</th>
                    <th class="border border-gray-300 px-2 py-1">Km</th>
                    <th class="border border-gray-300 px-2 py-1">Batterie</th>
                    <th class="border border-gray-300 px-2 py-1">Batterie consommée</th>
                    <th class="border border-gray-300 px-2 py-1">Autonomie (km)</th>
                    <th class="border border-gray-300 px-2 py-1">Type de trajet</th>
                    <th class="border border-gray-300 px-2 py-1">Reset</th>
                    <th class="border border-gray-300 px-2 py-1">Distance (km)</th>
                    <th class="border border-gray-300 px-2 py-1">Vitesse moyenne (km/h)</th>
                    <th class="border border-gray-300 px-2 py-1">Conso moy. (kWh/100km)</th>
                    <th class="border border-gray-300 px-2 py-1">Conso tot. depuis raz (kWh)</th>
                    <th class="border border-gray-300 px-2 py-1">Énergie récup. (kWh)</th>
                    <th class="border border-gray-300 px-2 py-1">Conso clim. (kwh)</th>
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
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->batterie->pourcentage }}%</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->autonomie }} km</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->type }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->reset ? 'Oui' : 'Non' }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->distance }} km</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->vitesse_moyenne }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->consommation_moyenne }}
                        </td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->consommation_totale }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $trajet->energie_recuperee }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">
                            @if(!is_null($trajet->consommation_clim) && $trajet->consommation_clim != 0)
                                {{ $trajet->consommation_clim }}
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