<x-layout>
    <h1 class="text-2xl font-bold text-center my-8">Liste des recharges</h1>
    <div class="flex justify-end">
        <a href="{{ route('recharges.create') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-xl font-medium rounded-xl shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Nouvelle recharge
        </a>
    </div>
    @if($recharges->isEmpty())
        <p class="text-center text-gray-500">Aucune recharge trouvée.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-12 mt-8">
            @foreach($recharges as $recharge)
                <div class="bg-white shadow-xl rounded-xl p-6 flex flex-col justify-between gap-6 border border-gray-200">
                    <!-- Actions -->
                    <div class="self-end flex gap-6">
                        <a href="{{ route('recharges.edit', $recharge->id) }}" class="text-xl text-yellow-600 hover:underline">
                            Modifier
                        </a>
                        <form action="{{ route('recharges.destroy', $recharge->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette recharge ?')"
                                class="text-xl text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </div>

                    <!-- Infos principales -->
                    <div class="text-lg flex flex-col gap-2">
                        <h3 class="font-bold text-xl mb-2">Infos principales</h3>
                        <p>Date: <strong>{{ \Carbon\Carbon::parse($recharge->date)->format('d/m/Y') }}</strong></p>
                        <p>Durée: <strong>{{ \Carbon\Carbon::parse($recharge->duree)->format('H:i') }} h</strong></p>
                        <p>KW Charge: <strong>{{ $recharge->kw_charge }}</strong></p>
                        <p>Prix KWh: <strong>{{ $recharge->prix_kwh }} €</strong></p>
                        <p>Pu Chrg kw/H: <strong>{{ $recharge->pu_chrg_kwh }} €</strong></p>
                        <p>Coût: <strong>{{ $recharge->cout }} €</strong></p>
                        <p>Ratio batterie: <strong>{{ $recharge->ratio_batterie ?? 'N/A' }} %</strong></p>
                        @if($recharge->commentaire)
                            <p>Commentaire: <strong>{{ $recharge->commentaire }}</strong></p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="m-auto w-2/5 my-12">
            {{ $recharges->links() }}
        </div>
    @endif
</x-layout>