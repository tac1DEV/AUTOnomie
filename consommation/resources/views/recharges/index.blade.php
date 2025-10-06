<x-layout>
    <h1 class="text-2xl font-bold text-center my-8">Liste des recharges</h1>

    <!-- Pagination -->
    <div class="m-auto w-2/5 my-12">
        {{ $recharges->links() }}
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
                        <p>Durée: {{ $recharge->duree }}</p>
                        <p>KW Charge: {{ $recharge->kw_charge }}</p>
                        <p>Prix KWh: {{ $recharge->prix_kwh }} €</p>
                        <p>Coût: {{ $recharge->cout }} €</p>
                        <p>Ratio batterie: {{ $recharge->ratio_batterie ?? 'N/A' }} %</p>
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