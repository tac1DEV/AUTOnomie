<html>

<head>
    <title>Consommation</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav>
        <ul class="flex gap-6">
            <li><a href="{{ url('/') }}">Trajets</a></li>
            <li><a href="{{ url('/recharges') }}">Recharges</a></li>
            <li><a href="{{ url('/graphs') }}">Graphiques</a></li>
        </ul>
    </nav>

    {{ $slot }}
</body>

</html>