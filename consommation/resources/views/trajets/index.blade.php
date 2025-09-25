<x-layout>
    <div class="container mx-auto p-6 space-y-8">

        <!-- Formulaire de création -->
        <div class="bg-white shadow rounded-xl p-6">
            <h2 class="text-xl font-bold mb-4">Ajouter un trajet</h2>

            <form action="{{ route('trajets.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf

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

                <div class="flex items-center mt-6 md:mt-0">
                    <input type="hidden" name="reset" value="0">
                    <input type="checkbox" name="reset" id="reset" value="1" class="mr-2">
                    <label for="reset" class="font-medium">Reset</label>
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

                <div class="col-span-2 flex justify-end mt-4">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Enregistrer</button>
                </div>
            </form>
        </div>
        <div class="mt-6">
            {{ $trajets->links() }}
        </div>
        <!-- Liste des trajets avec pagination -->
        <div class="space-y-6">
            @foreach($trajets as $trajet)
                <div class="bg-white shadow rounded-xl p-6 flex flex-col md:flex-row justify-between gap-6">

                    <!-- Bouton supprimer -->
                    <div class="self-end md:self-start">
                        <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce trajet ?')"
                                class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </div>

                    <!-- Infos principales -->
                    <div class="flex-1">
                        <h3 class="font-bold text-lg mb-2">Infos principales</h3>
                        <p>📅 {{ $trajet->date }}</p>
                        <p>⚡ {{ $trajet->action }}</p>
                        <p>📍 {{ $trajet->destination }}</p>
                        <p>Reset: {{ $trajet->reset ? 'oui' : 'non' }}</p>
                    </div>

                    <!-- Données techniques -->
                    <div class="flex-1">
                        <h3 class="font-bold text-lg mb-2">Données techniques</h3>
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
                    <div class="flex-1">
                        <h3 class="font-bold text-lg mb-2">Calculs</h3>
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
        <div class="mt-6">
            {{ $trajets->links() }}
        </div>
    </div>
</x-layout>