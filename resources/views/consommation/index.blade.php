<x-layout>
    <x-layout-consommation></x-layout-consommation>
    <div class="h-[50vh] flex">
        <canvas id="line"></canvas>
        <canvas id="doughnut"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        const line = document.getElementById('line').getContext('2d');

        new Chart(line, {
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

        const doughnut = document.getElementById('doughnut').getContext('2d');

        // Données depuis Laravel
        const labels = @json($trajetsParType->pluck('type'));
        const data = @json($trajetsParType->pluck('nombre_trajets'));

        // Génération automatique d'une couleur différente pour chaque type
        const backgroundColors = labels.map((_, i) => {
            const hue = (i * 360 / labels.length) % 360;
            return `hsl(${hue}, 70%, 60%)`;
        });

        new Chart(doughnut, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de trajets',
                    data: data,
                    borderWidth: 2,
                    backgroundColor: backgroundColors,
                    borderColor: 'white',
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#333',
                            font: { size: 14 }
                        }
                    }
                }
            }
        });


    </script>

</x-layout>