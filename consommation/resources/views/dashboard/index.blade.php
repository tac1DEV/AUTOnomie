<x-layout>
    <div class="container mx-auto p-6 space-y-8">

        <h1 class="text-2xl font-bold text-center mb-8">Dashboard</h1>

        <!-- Résumé -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow rounded-xl p-4 text-center">
                <h2 class="font-bold text-lg">Distance Totale</h2>
                <p class="text-2xl">{{ $totalDistance }} km</p>
            </div>
            <div class="bg-white shadow rounded-xl p-4 text-center">
                <h2 class="font-bold text-lg">Coût Total</h2>
                <p class="text-2xl">{{ $totalCost }} €</p>
            </div>
            <div class="bg-white shadow rounded-xl p-4 text-center">
                <h2 class="font-bold text-lg">Énergie Récupérée</h2>
                <p class="text-2xl">{{ $totalEnergyRecovered }} kWh</p>
            </div>
            <div class="bg-white shadow rounded-xl p-4 text-center">
                <h2 class="font-bold text-lg">% Batterie Moyenne</h2>
                <p class="text-2xl">{{ $averageBattery }} %</p>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Évolution batterie -->
            <div class="bg-white shadow rounded-xl p-4">
                <h2 class="font-bold mb-2 text-lg">Évolution Batterie (%)</h2>
                <canvas id="batteryChart"></canvas>
            </div>

            <!-- Coût par recharge -->
            <div class="bg-white shadow rounded-xl p-4">
                <h2 class="font-bold mb-2 text-lg">Coût par Recharge (€)</h2>
                <canvas id="costChart"></canvas>
            </div>

            <!-- Consommation moyenne -->
            <div class="bg-white shadow rounded-xl p-4">
                <h2 class="font-bold mb-2 text-lg">Consommation Moyenne (kWh/100km)</h2>
                <canvas id="consumptionChart"></canvas>
            </div>

            <!-- Ratio Batterie -->
            <div class="bg-white shadow rounded-xl p-4">
                <h2 class="font-bold mb-2 text-lg">Ratio Batterie</h2>
                <canvas id="ratioChart"></canvas>
            </div>

            <!-- Répartition par type -->
            <div class="bg-white shadow rounded-xl p-4 md:col-span-2">
                <h2 class="font-bold mb-2 text-lg">Répartition des Types</h2>
                <canvas id="typeChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dates = @json($trajetDates);
        const batteryValues = @json($batteryValues);
        const costValues = @json($costValues);
        const consumptionValues = @json($consumptionValues);
        const ratioValues = @json($ratioValues);
        const labels = @json($labels);
        const values = @json($values);

        // Batterie
        new Chart(document.getElementById('batteryChart'), {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: '% Batterie',
                    data: batteryValues,
                    borderColor: 'rgb(34,197,94)',
                    backgroundColor: 'rgba(34,197,94,0.2)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: { responsive: true }
        });

        // Coût
        new Chart(document.getElementById('costChart'), {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Coût (€)',
                    data: costValues,
                    backgroundColor: 'rgba(59,130,246,0.7)'
                }]
            },
            options: { responsive: true }
        });

        // Consommation
        new Chart(document.getElementById('consumptionChart'), {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Conso Moy (kWh/100km)',
                    data: consumptionValues,
                    borderColor: 'rgb(245,158,11)',
                    backgroundColor: 'rgba(245,158,11,0.2)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: { responsive: true }
        });

        // Ratio Batterie
        new Chart(document.getElementById('ratioChart'), {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Ratio Batterie',
                    data: ratioValues,
                    borderColor: 'rgb(239,68,68)',
                    backgroundColor: 'rgba(239,68,68,0.2)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: { responsive: true }
        });

        // Répartition par type
        new Chart(document.getElementById('typeChart'), {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de trajets',
                    data: values,
                    backgroundColor: [
                        '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#EC4899', '#14B8A6', '#F43F5E'
                    ]
                }]
            },
            options: { responsive: true }
        });
    </script>
</x-layout>