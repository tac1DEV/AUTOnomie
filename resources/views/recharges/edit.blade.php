<x-layout>
    <div class="max-w-2xl mx-auto p-8 my-8 bg-white shadow-lg rounded-2xl border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-8">Modifier la recharge</h2>

        <form action="{{ route('recharges.update', $recharge->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Date -->
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date:</label>
                <input type="date" name="date" id="date" value="{{ old('date', $recharge->date) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-xl 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <!-- Durée -->
            <div>
                <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Durée: (HH:mm)</label>
                <input type="time" name="duree" id="duree"
                    value="{{ old('duree', \Carbon\Carbon::parse($recharge->duree)->format('H:i')) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-xl 
       focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">

            </div>

            <!-- KW Charge -->
            <div>
                <label for="kw_charge" class="block text-sm font-medium text-gray-700 mb-1">KW Charge:</label>
                <input type="number" step="0.001" name="kw_charge" id="kw_charge"
                    value="{{ old('kw_charge', $recharge->kw_charge) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-xl 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <!-- Prix KWh -->
            <div>
                <label for="prix_kwh" class="block text-sm font-medium text-gray-700 mb-1">Prix KWh: (€)</label>
                <input type="number" step="0.001" min="0" name="prix_kwh" id="prix_kwh"
                    value="{{ old('prix_kwh', $recharge->prix_kwh) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-xl 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>

            <!-- Commentaire -->
            <div>
                <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-1">Commentaire: (max 100
                    carac.)</label>
                <textarea name="commentaire" id="commentaire" rows="3" maxlength="100"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">{{ old('commentaire', $recharge->commentaire) }}</textarea>
            </div>

            <div>
                <label for="pourcentage" class="block text-sm font-medium text-gray-700 mb-1">%Batterie</label>
                <input type="number" name="pourcentage" id="pourcentage"
                    value="{{ old('km', $recharge->Batterie->pourcentage) }}" min="0" step="1" max="100" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
            </div>
            <!-- Boutons -->
            <div class="flex justify-center gap-8 pt-4 mb-8">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 text-white text-lg font-medium rounded-xl 
                           border border-gray-300 shadow-sm hover:bg-blue-700 transition">
                    Mettre à jour
                </button>
                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-2 bg-gray-100 text-gray-700 text-lg font-medium rounded-xl 
                           border border-gray-300 shadow-sm hover:bg-gray-200 transition">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</x-layout>