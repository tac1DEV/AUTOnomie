<x-layout>
    <div class="max-w-2xl mx-auto p-8 my-8 bg-white shadow-lg rounded-2xl border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-8">Ajouter un trajet</h2>

        <form action="{{ route('trajets.store') }}" method="POST" class="space-y-8">
            @csrf

            <div class="flex flex-col gap-4">
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="date" id="date" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="action" class="block text-sm font-medium text-gray-700 mb-1">Action</label>
                    <input type="text" name="action" id="action" placeholder="n104 n2, moissy..." required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                    <input type="text" name="destination" id="destination" placeholder="maison, CDG..." required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="km" class="block text-sm font-medium text-gray-700 mb-1">Kilométrage</label>
                    <input type="number" step="0.001" name="km" id="km" placeholder="120000.001" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>
                <div>
                    <label for="pourcentage" class="block text-sm font-medium text-gray-700 mb-1">%Batterie</label>
                    <input type="number" name="pourcentage" id="pourcentage" placeholder="85" min="0" step="1" max="100"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="autonomie" class="block text-sm font-medium text-gray-700 mb-1">Autonomie (km)</label>
                    <input type="number" step="0.001" name="autonomie" id="autonomie" placeholder="350.000" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type de trajet:</label>
                    <select name="type" id="type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                        <option value="">Choisir un type</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>



                <div>
                    <label for="distance" class="block text-sm font-medium text-gray-700 mb-1">Distance (km)</label>
                    <input type="number" step="0.001" name="distance" id="distance" placeholder="115.000" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="vitesse_moyenne" class="block text-sm font-medium text-gray-700 mb-1">Vitesse
                        Moy.</label>
                    <input type="number" step="0.001" name="vitesse_moyenne" id="vitesse_moyenne" placeholder="90.000"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="consommation_moyenne" class="block text-sm font-medium text-gray-700 mb-1">Conso
                        Moy.</label>
                    <input type="number" step="0.001" name="consommation_moyenne" id="consommation_moyenne"
                        placeholder="15.000" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="consommation_totale" class="block text-sm font-medium text-gray-700 mb-1">Conso
                        Totale</label>
                    <input type="number" step="0.001" name="consommation_totale" id="consommation_totale"
                        placeholder="18.000" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="energie_recuperee" class="block text-sm font-medium text-gray-700 mb-1">Énergie
                        Récupérée</label>
                    <input type="number" step="0.001" name="energie_recuperee" id="energie_recuperee"
                        placeholder="3.000" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>

                <div>
                    <label for="consommation_clim" class="block text-sm font-medium text-gray-700 mb-1">Conso
                        Clim</label>
                    <input type="number" step="0.001" name="consommation_clim" id="consommation_clim"
                        placeholder="2.000" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                </div>
            </div>
            <div class="flex items-center gap-8">
                <label for="reset" class="text-sm font-medium text-gray-700 select-none">Reset kilométrage:</label>
                <input type="hidden" name="reset" value="0">
                <input type="checkbox" name="reset" id="reset" value="1"
                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            </div>
            <div class="flex justify-center gap-8 pt-4 mb-8">
                <button type="submit"
                    class="inline-flex items-center p-2 bg-blue-600 text-white text-lg font-medium rounded-xl border border-gray-300 shadow-sm hover:bg-blue-700">
                    Créer
                </button>

                <a href="{{ route('recharges.index') }}"
                    class="inline-flex items-center p-2 bg-gray-100 text-gray-700  text-lg font-medium rounded-xl border border-gray-300 shadow-sm hover:bg-gray-200">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</x-layout>