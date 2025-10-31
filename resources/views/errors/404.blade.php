<x-layout>
    <div class="min-h-screen flex flex-col items-center justify-center text-gray-800">
        <h1 class="text-9xl font-bold text-blue-600">404</h1>
        <h2 class="text-2xl font-semibold mb-4">Page non trouvée</h2>
        <p class="mb-8 text-gray-600">La page que vous recherchez n'existe pas.</p>

        <a href="{{ url('/') }}"
            class="px-6 py-3 bg-blue-600 text-white rounded-2xl shadow hover:bg-blue-700 transition">
            Retour à l'accueil
        </a>
    </div>
</x-layout>