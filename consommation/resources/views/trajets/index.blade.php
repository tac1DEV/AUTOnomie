<x-layout>

    <!-- Formulaire de création -->
    <div class="mx-auto space-y-8 rounded-xl px-12">
        <h2 class="text-xl font-bold mb-4 text-center">Ajouter un trajet</h2>

        <form action="{{ route('trajets.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-14 gap-4">
                <div>
                    <label for="date" class="block font-medium">📅 Date</label>
                    <input type="date" name="date" id="date" required class="w-full border rounded px-3 py-2 mt-1">
                </div>

                <div>
                    <label for="action" class="block font-medium">⚡ Action</label>
                    <input type="text" name="action" id="action" placeholder="Travail, Loisir..."
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="destination" class="block font-medium">📍 Destination</label>
                    <input type="text" name="destination" id="destination" placeholder="Paris, Lyon..."
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="km" class="block font-medium">📏 Kilomètres</label>
                    <input type="number" name="km" id="km" placeholder="120"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="type" class="block font-medium">Type</label>
                    <input type="text" name="type" id="type" placeholder="MA"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for=" reset" class="font-medium">Reset</label>
                    <input type="hidden" name="reset" value="0">
                    <input type="checkbox" name="reset" id="reset" value="1"
                        class="w-full h-11 border rounded px-3 py-2 mt-1 align-bottom">
                </div>

                <div>
                    <label for="autonomie" class="block font-medium">🔋 Autonomie (km)</label>
                    <input type="number" name="autonomie" id="autonomie" placeholder="350"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="distance" class="block font-medium">📐 Distance (km)</label>
                    <input type="number" name="distance" id="distance" placeholder="115"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="vitesse_moyenne" class="block font-medium">🏎️ Vitesse Moy.</label>
                    <input type="number" name="vitesse_moyenne" id="vitesse_moyenne" placeholder="90"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="pourcentage_batterie" class="block font-medium">🔋 % Batterie</label>
                    <input type="number" name="pourcentage_batterie" id="pourcentage_batterie" placeholder="85" min="0"
                        max="100" class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="consommation_moyenne" class="block font-medium">⚡ Conso Moy.</label>
                    <input type="number" name="consommation_moyenne" id="consommation_moyenne" placeholder="15"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="consommation_totale" class="block font-medium">📊 Conso Totale</label>
                    <input type="number" name="consommation_totale" id="consommation_totale" placeholder="18"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="energie_recuperee" class="block font-medium">♻️ Énergie Récup.</label>
                    <input type="number" name="energie_recuperee" id="energie_recuperee" placeholder="3"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div>
                    <label for="consommation_clim" class="block font-medium">❄️ Conso Clim</label>
                    <input type="number" name="consommation_clim" id="consommation_clim" placeholder="2"
                        class="w-full border rounded px-3 py-2 mt-1" required>
                </div>
            </div>
            <div class="flex justify-center mt-8">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Enregistrer</button>
            </div>
        </form>
    </div>
    <div class="grid grid-cols-3 gap-8 px-12 mt-8">
        @foreach($trajets as $trajet)
            <div
                class="{{ $trajet->reset ? 'bg-green-100' : 'bg-white' }} shadow-xl rounded-xl p-6 flex flex-col justify-between gap-6 border border-gray-200">
                <div class="self-end flex gap-6">
                    <a href="{{ route('trajets.edit', $trajet->id) }}" class="text-yellow-600 hover:underline">
                        Modifier
                    </a>
                    <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce trajet ?')"
                            class="text-red-600 hover:underline">Supprimer</button>
                    </form>
                </div>

                <!-- Infos principales -->
                <div class="text-lg flex flex-col gap-2">
                    <h3 class="font-bold text-xl mb-2">Infos principales</h3>
                    <p>📅 {{ \Carbon\Carbon::parse($trajet->date)->format('d/m/Y') }}</p>
                    <p>⚡ {{ $trajet->action }}</p>
                    <p>📍 {{ $trajet->destination }}</p>
                    <p>Reset: {{ $trajet->reset ? 'oui' : 'non' }}</p>
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
                    <p>kwh/100km: {{ $trajet->kwh100km() ?? 'N/A' }} kWh/100km</p>
                    <p>Conso tot/distance: {{ $trajet->consoTotDistance() ?? 'N/A' }} km</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="m-auto w-2/5 my-12">
        {{ $trajets->links() }}
    </div>
</x-layout>