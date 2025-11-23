<x-layout>
    <h1 class="text-2xl font-bold text-center my-8">Liste des recharges</h1>

    <div class="my-6 flex justify-end px-4">
        <a href="{{ route('recharges.create') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-xl font-medium rounded-xl shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Nouvelle recharge
        </a>
    </div>

    <div class="overflow-x-auto px-4">
        <table class="w-full border border-gray-300 border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-2 py-1">Date</th>
                    <th class="border border-gray-300 px-2 py-1">Durée</th>
                    <th class="border border-gray-300 px-2 py-1">KW charge</th>
                    <th class="border border-gray-300 px-2 py-1">Prix KWh</th>
                    <th class="border border-gray-300 px-2 py-1">Puissance (kW/h)</th>
                    <th class="border border-gray-300 px-2 py-1">Coût</th>
                    <th class="border border-gray-300 px-2 py-1">Batterie chargée (total)</th>
                    <th class="border border-gray-300 px-2 py-1">Commentaire</th>
                    <th class="border border-gray-300 px-2 py-1">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recharges as $recharge)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-2 py-1 text-center">
                            {{ \Carbon\Carbon::parse($recharge->date)->format('d/m/Y') }}
                        </td>

                        <td class="border border-gray-300 px-2 py-1 text-center">
                            {{ \Carbon\Carbon::parse($recharge->duree)->format('H:i') }}
                        </td>

                        <td class="border border-gray-300 px-2 py-1 text-center">
                            {{ $recharge->kw_charge }}
                        </td>

                        <td class="border border-gray-300 px-2 py-1 text-center">
                            {{ $recharge->prix_kwh }} €
                        </td>

                        <td class="border border-gray-300 px-2 py-1 text-center">
                            {{ $recharge->pu_chrg_kwh }} €
                        </td>

                        <td class="border border-gray-300 px-2 py-1 text-center">
                            {{ $recharge->cout }} €
                        </td>

                        <td class="border border-gray-300 px-2 py-1 text-center">
                            <strong>+{{ $recharge->batterie->difference() }} %</strong>
                            ({{$recharge->batterie->pourcentage}} %)
                        </td>

                        <td class="border border-gray-300 px-2 py-1 text-center">
                            {{ $recharge->commentaire ?: '—' }}
                        </td>

                        <td class="border border-gray-300 px-2 py-1">
                            <div class="flex justify-center gap-4">
                                <a href="{{ route('recharges.edit', $recharge->id) }}"
                                    class="text-yellow-600 hover:underline">Modifier</a>

                                <form action="{{ route('recharges.destroy', $recharge->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cette recharge ?')"
                                        class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-500">
                            Aucune recharge trouvée.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="m-auto w-2/5 my-12">
        {{ $recharges->links() }}
    </div>
</x-layout>