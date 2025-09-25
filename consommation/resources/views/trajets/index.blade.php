<x-layout>

    <!-- Form -->
    <div>
        <form action="{{ route('trajets.store') }}" method="POST">
            @csrf

            <!-- Informations générales -->
            <div>
                <label for="date">📅 Date</label>
                <input type="date" name="date" id="date" required>
            </div>

            <div>
                <label for="action">⚡ Action</label>
                <input type="text" name="action" id="action" placeholder="Travail, Loisir..." required>
            </div>

            <div>
                <label for="destination">📍 Destination</label>
                <input type="text" name="destination" id="destination" placeholder="Paris, Lyon..." required>
            </div>

            <div>
                <label for="km">📏 Kilomètres</label>
                <input type="number" name="km" id="km" placeholder="120" required>
            </div>
            <div>
                <label for="type">Type</label>
                <input type="text" name="type" id="type" placeholder="MA" required>
            </div>

            <div>
                <label for="reset">Reset</label>
                <!-- Hidden input pour envoyer 0 si non coché -->
                <input type="hidden" name="reset" value="0">
                <input type="checkbox" name="reset" id="reset" value="1">
            </div>

            <div>
                <label for="autonomie">🔋 Autonomie (km)</label>
                <input type="number" name="autonomie" id="autonomie" placeholder="350" required>
            </div>

            <div>
                <label for="distance">📐 Distance (km)</label>
                <input type="number" name="distance" id="distance" placeholder="115" required>
            </div>

            <div>
                <label for="vitesse_moyenne">🏎️ Vitesse Moy.</label>
                <input type="number" name="vitesse_moyenne" id="vitesse_moyenne" placeholder="90" required>
            </div>

            <div>
                <label for="pourcentage_batterie">🔋 % Batterie</label>
                <input type="number" name="pourcentage_batterie" id="pourcentage_batterie" placeholder="85" min="0"
                    max="100" required>
            </div>

            <div>
                <label for="consommation_moyenne">⚡ Conso Moy.</label>
                <input type="number" name="consommation_moyenne" id="consommation_moyenne" placeholder="15" required>
            </div>

            <div>
                <label for="consommation_totale">📊 Conso Totale</label>
                <input type="number" name="consommation_totale" id="consommation_totale" placeholder="18" required>
            </div>

            <div>
                <label for="energie_recuperee">♻️ Énergie Récup.</label>
                <input type="number" name="energie_recuperee" id="energie_recuperee" placeholder="3" required>
            </div>

            <div>
                <label for="consommation_clim">❄️ Conso Clim</label>
                <input type="number" name="consommation_clim" id="consommation_clim" placeholder="2" required>
            </div>

            <!-- Submit -->
            <div class="row-span-2 flex items-end">
                <button type="submit">
                    Enregistrer
                </button>
            </div>
        </form>

    </div>
    </div>

    <div class="space-y-4">
        @foreach($trajets as $trajet)

            <div class="bg-white shadow rounded-xl p-4 flex flex-col md:flex-row justify-between items-start hover:shadow-lg transition duration-300"
                style="margin:200px 0;">
                <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Voulez-vous vraiment supprimer ce trajet ?')">Supprimer</button>
                </form>

                <!-- Ligne 1 : Infos principales -->
                <div class="flex flex-wrap gap-4 mb-2 w-full md:w-1/2">
                    <h1>Infos principales</h1>
                    <p class="text-gray-500">📅 {{ $trajet->date }}</p>
                    <p class="text-gray-700">⚡ {{ $trajet->action }}</p>
                    <p class="text-gray-700">📍 {{ $trajet->destination }}</p>
                </div>

                <!-- Ligne 2 : Données techniques -->
                <div class="flex flex-wrap gap-4 w-full md:w-1/2 text-gray-700">
                    <h1>Données techniques</h1>
                    <p>📏 Km: <span class="font-medium">{{ $trajet->km }}</span></p>
                    <p>🔋 Batterie: <span class="font-medium">{{ $trajet->pourcentage_batterie }}%</span></p>
                    <p>🔋 Autonomie: <span class="font-medium">{{ $trajet->autonomie }} km</span></p>
                    <p>Reset: <span class="font-medium">{{ $trajet->reset ? 'raz' : 'non' }}</span></p>
                    <p>📐 Distance: <span class="font-medium">{{ $trajet->distance }}</span></p>
                    <p>🏎️ Vitesse moy.: <span class="font-medium">{{ $trajet->vitesse_moyenne }} km/h</span></p>
                    <p>⚡ Conso moy.: <span class="font-medium">{{ $trajet->consommation_moyenne }} kWh/100km</span></p>
                    <p>📊 Conso tot.: <span class="font-medium">{{ $trajet->consommation_totale }} kWh</span></p>
                    <p>♻️ Energie recup.: <span class="font-medium">{{ $trajet->energie_recuperee }} kWh</span></p>
                    <p>❄️ Conso clim.: <span class="font-medium">{{ $trajet->consommation_clim }} kWh</span>
                    </p>
                </div>

                <div>
                    <h1>Calculs</h1>
                    <p>Distance: {{ $trajet->distance() ?? 'N/A' }} km</p>
                    <p>%Batterie: {{ $trajet->pourcentageBatterie() ?? 'N/A' }} %</p>
                    <p>nb kw: {{ $trajet->nbKw() ?? 'N/A' }} kw</p>
                    <p>kwh/100km: {{ $trajet->kwh100km() ?? 'N/A' }} kwh/100km</p>
                    <p>conso tot/distance: {{ $trajet->consoTotDistance() ?? 'N/A' }} km</p>
                </div>
            </div>
        @endforeach
    </div>


    </div>
</x-layout>