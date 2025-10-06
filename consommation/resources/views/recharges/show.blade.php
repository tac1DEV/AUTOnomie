<x-layout>
    <div class="px-4 py-8">
        <div class="bg-white shadow-xl rounded-xl p-6 border border-gray-200 max-w-2xl mx-auto my-12">
            <!-- Infos principales -->
            <div class="text-lg flex flex-col gap-4">
                <h3 class="font-bold text-xl text-center mb-4">Infos principales</h3>
                <p><strong>Durée :</strong> {{ $recharge->duree }}</p>
                <p><strong>KW Charge :</strong> {{ $recharge->kw_charge }}</p>
                <p><strong>Prix KWh :</strong> {{ $recharge->prix_kwh }} €</p>
                <p><strong>Coût :</strong> {{ $recharge->cout }} €</p>
                <p><strong>Ratio batterie :</strong> {{ $recharge->ratio_batterie ?? 'N/A' }} %</p>
            </div>
        </div>
    </div>
</x-layout>