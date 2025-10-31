<x-layout>
    <x-layout-consommation></x-layout-consommation>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($data->pluck('labels')),
                datasets: [{
                    label: 'Consommation moyenne(kwh/100)',
                    data: @json($data->pluck('consommation_moyenne')),
                    borderWidth: 2,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                }]
            }
        });
    </script>
</x-layout>