<x-layout>
    <h1 class="text-2xl font-bold text-center my-8">Liste des trajets</h1>
    <div class="flex justify-end mb-4 px-12">
        <a href="{{ route('trajets.create') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-xl font-medium rounded-xl shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Nouveau trajet
        </a>
    </div>

    <div class="grid grid-cols-3 gap-8 px-12 mt-8">
        @foreach($trajets as $trajet)
            <div class="shadow-xl rounded-xl p-6 flex flex-col justify-between gap-6 border border-gray-200">
                <div class="self-end flex gap-6">
                    <a href="{{ route('trajets.edit', $trajet->id) }}" class="text-xl text-yellow-600 hover:underline">
                        Modifier
                    </a>
                    <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce trajet ?')"
                            class="text-xl text-red-600 hover:underline">Supprimer</button>
                    </form>
                </div>

                <!-- Infos principales -->
                <div class="text-lg flex flex-col gap-2">
                    <h3 class="font-bold text-xl mb-2">Infos principales</h3>
                    <p>Date: <strong>{{ \Carbon\Carbon::parse($trajet->date)->format('d/m/Y') }}</strong></p>
                    <p>Action: <strong>{{ $trajet->action }}</strong></p>
                    <p>Destination: <strong>{{ $trajet->destination }}</strong></p>
                    <p>Reset: <strong>{{ $trajet->reset ? 'oui' : 'non' }}</strong></p>
                    <p>Type de trajet: <strong>{{ $trajet->type }}</strong></p>
                </div>

                <!-- Données techniques -->
                <div class="text-lg flex flex-col gap-2">
                    <h3 class="font-bold text-2xl mb-2">Données techniques</h3>
                    <p>Km: <strong>{{ $trajet->km }}</strong></p>
                    <p>Batterie: <strong>{{ $trajet->pourcentage_batterie }}%</strong></p>
                    <p>Autonomie: <strong>{{ $trajet->autonomie }} km</strong></p>
                    <p>Distance: <strong>{{ $trajet->distance }} km</strong></p>
                    <p>Vitesse moy.: <strong>{{ $trajet->vitesse_moyenne }} km/h</strong></p>
                    <p>Conso moy.: <strong>{{ $trajet->consommation_moyenne }} kWh/100km</strong></p>
                    <p>Conso tot.: <strong>{{ $trajet->consommation_totale }} kWh</strong></p>
                    <p>Énergie récup.: <strong>{{ $trajet->energie_recuperee }} kWh</strong></p>
                    @if(!is_null($trajet->consommation_clim) && $trajet->consommation_clim != 0)
                        <p>Conso clim. : <strong>{{ $trajet->consommation_clim }} kWh</strong></p>
                    @endif
                </div>

                <!-- Calculs -->
                <div class="text-lg flex flex-col gap-2">
                    <h3 class="font-bold text-2xl mb-2">Calculs</h3>
                    <p>Distance: <strong>{{ $trajet->distance() ?? 'N/A' }} km</strong></p>
                    <p>%Batterie: <strong>{{ $trajet->pourcentageBatterie() ?? 'N/A' }} %</strong></p>
                    <p>nb kw: <strong>{{ $trajet->nbKw() ?? 'N/A' }} kw</strong></p>
                    <p>kwh/100km: <strong>{{ $trajet->kwh100km() ?? 'N/A' }}</strong></p>
                    @if($trajet->vitesseMoyenne() == '#DIV/0!')
                        <p>Vitesse moy.: <strong>DIV/0!</strong></p>
                    @else
                        <p>Vitesse moy.: <strong>{{ $trajet->vitesseMoyenne() }} km/h</strong></p>
                    @endif
                    <p>Durée: <strong>{{$trajet->durée()}}</strong></p>
                    <p>Conso tot. depuis raz: <strong>{{$trajet->reset ? 0 : $trajet->consoTotDistance()}} kw</strong></p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="m-auto w-2/5 my-12">
        {{ $trajets->links() }}
    </div>
</x-layout>