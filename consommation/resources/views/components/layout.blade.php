<html>

<head>
    <title>Consommation</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Trajets</a></li>
            <li><a href="{{ url('/voitures') }}">Voitures</a></li>
            <li><a href="{{ url('/commentaires') }}">Commentaires</a></li>
            <li><a href="{{ url('/recharges') }}">Recharges</a></li>
        </ul>
    </nav>

    {{ $slot }}
</body>

</html>