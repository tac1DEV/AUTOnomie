<x-layout>
    <h1>Liste des commentaires</h1>

    @if($commentaires->isEmpty())
        <p>Aucun commentaire trouvé.</p>
    @else
        <ul>
            @foreach($commentaires as $commentaire)
                <li>{{ $commentaire->id }} : {{ $commentaire->message }}</li>
            @endforeach
        </ul>
    @endif
</x-layout>