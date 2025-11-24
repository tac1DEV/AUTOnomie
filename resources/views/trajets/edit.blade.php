<x-layout>
    <div class="max-w-2xl mx-auto p-8 my-8 bg-white shadow-lg rounded-2xl border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-8">Modifier le trajet</h2>

        <form action="{{ route('trajets.update', $trajet->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date:</label>
                <input type="date" name="date" id="date" value="{{ old('date', $trajet->date) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="action" class="block text-sm font-medium text-gray-700 mb-1">Action:</label>
                <input type="text" name="action" id="action" value="{{ old('action', $trajet->action) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination:</label>
                <input type="text" name="destination" id="destination"
                    value="{{ old('destination', $trajet->destination) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="km" class="block text-sm font-medium text-gray-700 mb-1">Kilomètres:</label>
                <input type="number" name="km" id="km" value="{{ old('km', $trajet->km) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="pourcentage" class="block text-sm font-medium text-gray-700 mb-1">%Batterie</label>
                <input type="number" name="pourcentage" id="pourcentage"
                    value="{{ old('km', $trajet->Batterie->pourcentage) }}" min="0" step="1" max="100" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
            </div>
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type de trajet:</label>
                <select name="type" id="type"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
                    <option value="{{ $trajet->type }}" selected>{{ $trajet->type ?? 'NULL' }}</option>
                    @foreach($types->where('type', '!=', $trajet->type) as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="autonomie" class="block text-sm font-medium text-gray-700 mb-1">Autonomie: (km)</label>
                <input type="number" name="autonomie" id="autonomie" value="{{ old('autonomie', $trajet->autonomie) }}"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="distance" class="block text-sm font-medium text-gray-700 mb-1">Distance: (km)</label>
                <input type="number" name="distance" id="distance" value="{{ old('distance', $trajet->distance) }}"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="vitesse_moyenne" class="block text-sm font-medium text-gray-700 mb-1">Vitesse
                    moyenne:</label>
                <input type="number" name="vitesse_moyenne" id="vitesse_moyenne"
                    value="{{ old('vitesse_moyenne', $trajet->vitesse_moyenne) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="consommation_moyenne" class="block text-sm font-medium text-gray-700 mb-1">Consommation
                    moyenne:</label>
                <input type="number" name="consommation_moyenne" id="consommation_moyenne"
                    value="{{ old('consommation_moyenne', $trajet->consommation_moyenne) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="consommation_totale" class="block text-sm font-medium text-gray-700 mb-1">Consommation
                    totale:</label>
                <input type="number" name="consommation_totale" id="consommation_totale"
                    value="{{ old('consommation_totale', $trajet->consommation_totale) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="energie_recuperee" class="block text-sm font-medium text-gray-700 mb-1">Énergie
                    récupérée:</label>
                <input type="number" name="energie_recuperee" id="energie_recuperee"
                    value="{{ old('energie_recuperee', $trajet->energie_recuperee) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="consommation_clim" class="block text-sm font-medium text-gray-700 mb-1">Consommation
                    Climatisation:</label>
                <input type="number" name="consommation_clim" id="consommation_clim"
                    value="{{ old('consommation_clim', $trajet->consommation_clim) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div>
                <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-1">Commentaire:</label>
                <input type="text" name="commentaire" id="commentaire" maxlength="100" placeholder="Bleu HC, Bleu HP..."
                    value="{{ old('commentaire', $trajet->commentaire) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <div class="flex items-center gap-8">
                <label for="reset" class="text-sm font-medium text-gray-700 select-none">Reset kilométrage:</label>
                <input type="hidden" name="reset" value="0">
                <input type="checkbox" name="reset" id="reset" value="1" {{ $trajet->reset ? 'checked' : '' }}
                    class="h-6 w-6 rounded text-blue-600">
            </div>

            <div class="flex justify-center gap-8 pt-4 mb-8">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 text-white text-lg font-medium rounded-xl
                           border border-gray-300 shadow-sm hover:bg-blue-700 transition">
                    Mettre à jour
                </button>
                <a href="{{ route('trajets.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-100 text-gray-700 text-lg font-medium rounded-xl
                           border border-gray-300 shadow-sm hover:bg-gray-200 transition">
                    Annuler
                </a>
            </div>

        </form>
    </div>
</x-layout>