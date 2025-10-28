<x-layout>
    <div class="max-w-2xl mx-auto p-8 my-8 bg-white shadow-lg rounded-2xl border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-8">Modifier la recharge</h2>

        <form action="{{ route('recharges.store') }}" method="POST" class="space-y-6">
            @csrf
            @method('POST')
            <div>
                <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Durée (HH:mm)</label>
                <input type="time" name="duree" id="duree" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>
            <div>
                <label for="kw_charge" class="block text-sm font-medium text-gray-700 mb-1">KW Charge</label>
                <input type="number" step="0.01" name="kw_charge" id="kw_charge" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
            </div>
            <div>
                <label for="prix_kwh" class="block text-sm font-medium text-gray-700 mb-1">Prix KWh (€)</label>
                <input type="number" step="any" min="0" name="prix_kwh" id="prix_kwh" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm">
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