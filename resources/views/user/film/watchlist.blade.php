<x-app>
    <div class=" m-10 h-screen">
    <h1 class="text-2xl font-bold">Watchlist</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
        @foreach ($watchlist as $item)
        @include('user.film.film_card', ['film' => $item->film])
        @endforeach
    </div>
</div>
</x-app>
