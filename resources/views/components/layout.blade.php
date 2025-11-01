<html>

<head>
    <title>Consommation</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-gray-800 text-white flex flex-col p-4 select-none">
        <ul class="flex gap-6">
            <li><a href="{{ url('/') }}" class="hover:bg-gray-700 p-2 rounded">Trajets</a></li>
            <li><a href="{{ url('/recharges') }}" class="hover:bg-gray-700 p-2 rounded">Recharges</a></li>
            <li><a href="{{ url('/consommation') }}" class="hover:bg-gray-700 p-2 rounded">Consommation</a></li>
        </ul>
    </nav>
    <div class="mb-4 px-12">
        {{ $slot }}

    </div>
</body>

</html>