<x-layout>
    <div class="container mx-auto p-6 space-y-8 bg-white shadow rounded-xl">
        <h2 class="text-xl font-bold mb-4 text-center">Modifier la recharge</h2>
        {{-- Affichage des messages d'erreur --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded space-y-2">
                <p>{{ session('error') }}</p>

                @if(old('id'))
                    <a href="{{ route('recharges.show', old('id')) }}" class="text-blue-600 underline hover:text-blue-800">
                        🔍 Consulter la recharge existante (ID: {{ old('id') }})
                    </a>
                @endif
            </div>
        @endif

        <form action="{{ route('recharges.store', $trajet->id) }}" method="POST"
            class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            @method('POST')
            <input type="hidden" name="trajet_id" value="{{ $trajet->id }}">
            <div>
                <label for="duree" class="block font-medium">Durée</label>
                <input type="time" step="1" name="duree" id="duree" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="kw_charge" class="block font-medium">KW Charge</label>
                <input type="number" step="0.01" name="kw_charge" id="kw_charge" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="prix_kwh" class="block font-medium">Prix KWh (€)</label>
                <input type="number" step="any" min="0" name="prix_kwh" id="prix_kwh" required
                    class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div class="col-span-1 md:col-span-2 flex justify-center mt-4 gap-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Créer
                </button>
                <a href="{{ route('recharges.index') }}"
                    class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</x-layout>