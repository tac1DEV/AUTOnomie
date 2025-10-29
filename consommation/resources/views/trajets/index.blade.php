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
                    <p><strong>Date: </strong>{{ \Carbon\Carbon::parse($trajet->date)->format('d/m/Y') }}</p>
                    <p><strong>Action: </strong>{{ $trajet->action }}</p>
                    <p><strong>Destination: </strong>{{ $trajet->destination }}</p>
                    <p><strong>Reset: </strong>{{ $trajet->reset ? 'oui' : 'non' }}</p>
                    <p><strong>Type de trajet: </strong>{{ $trajet->type }}</p>
                </div>

                <!-- Données techniques -->
                <div class="text-lg flex flex-col gap-2">
                    <h3 class="font-bold text-2xl mb-2">Données techniques</h3>
                    <p><strong>Km: </strong>{{ $trajet->km }}</p>
                    <p><strong>Batterie: </strong>{{ $trajet->pourcentage_batterie }}%</p>
                    <p><strong>Autonomie: </strong>{{ $trajet->autonomie }} km</p>
                    <p><strong>Distance: </strong>{{ $trajet->distance }} km</p>
                    <p><strong>Vitesse moy.: </strong>{{ $trajet->vitesse_moyenne }} km/h</p>
                    <p><strong>Conso moy.: </strong>{{ $trajet->consommation_moyenne }} kWh/100km</p>
                    <p><strong>Conso tot.: </strong>{{ $trajet->consommation_totale }} kWh</p>
                    <p><strong>Énergie récup.: </strong>{{ $trajet->energie_recuperee }} kWh</p>
                    <p><strong>Conso clim.: </strong>{{ $trajet->consommation_clim }} kWh</p>
                </div>

                <!-- Calculs -->
                <div class="text-lg flex flex-col gap-2">
                    <h3 class="font-bold text-2xl mb-2">Calculs</h3>
                    <p><strong>Distance: </strong>{{ $trajet->distance() ?? 'N/A' }} km</p>
                    <p><strong>%Batterie: </strong>{{ $trajet->pourcentageBatterie() ?? 'N/A' }} %</p>
                    <p><strong>nb kw: </strong>{{ $trajet->nbKw() ?? 'N/A' }} kw</p>
                    <p><strong>kwh/100km: </strong>{{ $trajet->kwh100km() ?? 'N/A' }}</p>
                    @if($trajet->vitesseMoyenne() == '#DIV/0!')
                        <p><strong>Vitesse moy.: </strong>DIV/0!</p>
                    @else
                        <p><strong>Vitesse moy.: </strong>{{ $trajet->vitesseMoyenne() }} km/h</p>
                    @endif
                    <p><strong>Durée: </strong>{{$trajet->durée()}}</p>
                    <p><strong>Conso tot. depuis raz: </strong>{{$trajet->reset ? 0 : $trajet->consoTotDistance()}} kw</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="m-auto w-2/5 my-12">
        {{ $trajets->links() }}
    </div>
</x-layout>