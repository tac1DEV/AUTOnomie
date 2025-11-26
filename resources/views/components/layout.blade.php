<html>

<head>
    <title>Consommation</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-gray-800 text-white p-4 select-none">
        <div class="flex justify-between items-center">
            <ul class="flex flex-row">
                <li><a href="{{ url('/') }}" class="hover:bg-gray-700 p-2 rounded">Trajets</a></li>
                <li><a href="{{ url('/recharges') }}" class="hover:bg-gray-700 p-2 rounded">Recharges</a></li>
                <li><a href="{{ url('/consommation') }}" class="hover:bg-gray-700 p-2 rounded">Consommation</a></li>
            </ul>
            <ul class="justify-end flex flex-row gap-4">
                <li>
                    <a class="border inline-flex items-center hover:bg-gray-700 p-2 rounded"
                        href="{{ route('recharges.create') }}"><svg class="w-5 h-5 mr-2" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Nouvelle recharge
                    </a>
                </li>
                <li>
                    <a class="border inline-flex items-center hover:bg-gray-700 p-2 rounded"
                        href="{{ route('trajets.create') }}">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Nouveau trajet
                    </a>
                </li>
            </ul>
        </div>

    </nav>
    <div>
        {{ $slot }}
    </div>
</body>

</html>