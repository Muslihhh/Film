<x-app>
    <div class="container m-10 h-full p-6">
        <h1 class="text-2xl font-bold mb-6">Pilih Genre</h1>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('genres.list') }}" class="mb-6">
            <div class="flex flex-wrap gap-2">
                @foreach ($genres as $genre)
                    <label class="cursor-pointer">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                            {{ in_array($genre->id, request('genres', [])) ? 'checked' : '' }} class="hidden peer">
                        <span
                            class="text-gray-600 dark:text-gray-300 bg-transparent border border-black dark:border-white hover:bg-gray-300 dark:hover:bg-gray-600 px-5 py-1 rounded-xl dark:peer-checked:bg-gray-600 peer-checked:bg-gray-300 peer-checked:border-4 peer-checked:border-blue-700 transition">
                            {{ $genre->nama_genre }}
                        </span>
                    </label>
                @endforeach
            </div>
            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Tampilkan Film
            </button>
        </form>

        <!-- Daftar Film -->
        <h1 class=" text-2xl font-bold mb-6">
            Daftar Film
        </h1>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @forelse ($films as $film)
               @include('user.film.film_card', ['film' => $film])
            @empty
                <p class="text-gray-600">Tidak ada film yang cocok dengan genre yang dipilih.</p>
            @endforelse
        </div>
    </div>
</x-app>
