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
                    <p>📅 {{ \Carbon\Carbon::parse($trajet->date)->format('d/m/Y') }}</p>
                    <p>⚡ {{ $trajet->action }}</p>
                    <p>📍 {{ $trajet->destination }}</p>
                    <p>Reset: {{ $trajet->reset ? 'oui' : 'non' }}</p>
                    <p>Type de trajet: {{ $trajet->type }}</p>
                </div>

                <!-- Données techniques -->
                <div class="text-lg flex flex-col gap-2">
                    <h3 class="font-bold text-2xl mb-2">Données techniques</h3>
                    <p>📏 Km: {{ $trajet->km }}</p>
                    <p>🔋 Batterie: {{ $trajet->pourcentage_batterie }}%</p>
                    <p>🔋 Autonomie: {{ $trajet->autonomie }} km</p>
                    <p>📐 Distance: {{ $trajet->distance }} km</p>
                    <p>🏎️ Vitesse moy.: {{ $trajet->vitesse_moyenne }} km/h</p>
                    <p>⚡ Conso moy.: {{ $trajet->consommation_moyenne }} kWh/100km</p>
                    <p>📊 Conso tot.: {{ $trajet->consommation_totale }} kWh</p>
                    <p>♻️ Énergie récup.: {{ $trajet->energie_recuperee }} kWh</p>
                    <p>❄️ Conso clim.: {{ $trajet->consommation_clim }} kWh</p>
                </div>

                <!-- Calculs -->
                <div class="text-lg flex flex-col gap-2">
                    <h3 class="font-bold text-2xl mb-2">Calculs</h3>
                    <p>Distance: {{ $trajet->distance() ?? 'N/A' }} km</p>
                    <p>%Batterie: {{ $trajet->pourcentageBatterie() ?? 'N/A' }} %</p>
                    <p>nb kw: {{ $trajet->nbKw() ?? 'N/A' }} kw</p>
                    <p>kwh/100km: {{ $trajet->kwh100km() ?? 'N/A' }}</p>
                    @if($trajet->vitesseMoyenne() == '#DIV/0!')
                        <p>Vitesse moy.: DIV/0!</p>
                    @else
                        <p>Vitesse moy.: {{ $trajet->vitesseMoyenne() }} km/h</p>
                    @endif
                    <p>Durée: {{$trajet->durée()}}</p>
                    <p>Conso tot. depuis raz: {{$trajet->reset ? 0 : $trajet->consoTotDistance()}} kw</p>
                </div>

                <!-- Commentaire -->
                @if(!empty(trim($trajet->commentaire ?? '')))
                    <div class="text-lg flex flex-col gap-2">
                        <h3 class="font-bold text-2xl mb-2">Commentaire</h3>
                        <p>{{ $trajet->commentaire }}</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="m-auto w-2/5 my-12">
        {{ $trajets->links() }}
    </div>
</x-layout>