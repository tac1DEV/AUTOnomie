<x-layout>
    <div class="container mx-auto p-6 space-y-8 bg-white shadow rounded-xl">
        <h2 class="text-xl font-bold mb-4 text-center">Modifier le trajet</h2>

        <form action="{{ route('trajets.update', $trajet->id) }}" method="POST"
            class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            @method('PUT')

            <div>
                <label for="date" class="block font-medium">📅 Date</label>
                <input type="date" name="date" id="date" value="{{ $trajet->date }}" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="action" class="block font-medium">⚡ Action</label>
                <input type="text" name="action" id="action" value="{{ $trajet->action }}" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="destination" class="block font-medium">📍 Destination</label>
                <input type="text" name="destination" id="destination" value="{{ $trajet->destination }}" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="km" class="block font-medium">📏 Kilomètres</label>
                <input type="number" name="km" id="km" value="{{ $trajet->km }}" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="type" class="block font-medium">Type</label>
                <input type="text" name="type" id="type" value="{{ $trajet->type }}" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="reset" class="font-medium">Reset</label>
                <input type="hidden" name="reset" value="0">
                <input type="checkbox" name="reset" id="reset" value="1" {{ $trajet->reset ? 'checked' : '' }}
                    class="w-full h-8">
            </div>

            <div>
                <label for="autonomie" class="block font-medium">🔋 Autonomie (km)</label>
                <input type="number" name="autonomie" id="autonomie" value="{{ $trajet->autonomie }}" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="distance" class="block font-medium">📐 Distance (km)</label>
                <input type="number" name="distance" id="distance" value="{{ $trajet->distance }}" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="vitesse_moyenne" class="block font-medium">🏎️ Vitesse Moy.</label>
                <input type="number" name="vitesse_moyenne" id="vitesse_moyenne" value="{{ $trajet->vitesse_moyenne }}"
                    required class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="pourcentage_batterie" class="block font-medium">🔋 % Batterie</label>
                <input type="number" name="pourcentage_batterie" id="pourcentage_batterie"
                    value="{{ $trajet->pourcentage_batterie }}" min="0" max="100" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="consommation_moyenne" class="block font-medium">⚡ Conso Moy.</label>
                <input type="number" name="consommation_moyenne" id="consommation_moyenne"
                    value="{{ $trajet->consommation_moyenne }}" required class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="consommation_totale" class="block font-medium">📊 Conso Totale</label>
                <input type="number" name="consommation_totale" id="consommation_totale"
                    value="{{ $trajet->consommation_totale }}" required class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="energie_recuperee" class="block font-medium">♻️ Énergie Récup.</label>
                <input type="number" name="energie_recuperee" id="energie_recuperee"
                    value="{{ $trajet->energie_recuperee }}" required class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="consommation_clim" class="block font-medium">❄️ Conso Clim</label>
                <input type="number" name="consommation_clim" id="consommation_clim"
                    value="{{ $trajet->consommation_clim }}" required class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div class="col-span-1 md:col-span-2 flex justify-center mt-4 gap-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Mettre à jour
                </button>
                <a href="/" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</x-layout>