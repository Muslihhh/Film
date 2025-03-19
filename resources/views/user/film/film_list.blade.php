<x-app>
    <div class="m-10 h-full">
        <h1 class="text-xl font-bold mb-4">{{ $title }}</h1>

        <div class="grid grid-cols-2 xl:grid-cols-6 gap-4">
            @foreach ($films as $film)
               @include('user.film.film_card', ['film' => $film])
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $films->links() }}
        </div>
    </div>
</x-app>
