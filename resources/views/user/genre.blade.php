<x-app>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Pilih Genre</h1>
    
        <!-- Form Filter -->
        <form method="GET" action="{{ route('genres.list') }}" class="mb-6">
            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2">
                @foreach ($genres as $genre)
                    <label class="text-gray-600 dark:text-gray-300 bg-transparent border border-black dark:border-white hover:bg-gray-300 dark:hover:bg-gray-600 px-5 py-1 rounded-xl">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}" 
                            {{ in_array($genre->id, request('genres', [])) ? 'checked' : '' }}>
                        <span>{{ $genre->nama_genre }} </span>
                    </label>
                @endforeach
            </div>
    
            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Tampilkan Film
            </button>
        </form>
    
        <!-- Daftar Film -->
        <h1>
            Daftar Film
        </h1>
        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @forelse ($films as $film)
            <a href="{{ route('films.show', $film->id) }}" class="scroll-mx-5">
                <div class="relative w-full max-w-xs h-auto group overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <!-- Gambar Film -->
                    <img src="{{ asset('storage/' . $film->image)}}" alt="{{ $film->judul }}" 
                        class="w-full h-[250px] object-cover rounded-2xl group-hover:scale-105 transition-transform duration-300">
                    
                    <!-- Badge Rating -->
                    <div class="absolute top-0 left-0 bg-black/50 text-white px-3 py-1 rounded-br-lg flex items-center">
                        <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                        <p class="ml-1 font-semibold">{{ number_format($film->averageRating(), 1) ?? 'N/A' }}</p> 
                    </div>
            
                    <!-- Informasi Film -->
                    <div class="bg-transparant px-3 py-2 rounded-b-2xl">
                        <h2 class="text-lg leading-5 font-bold truncate">{{ $film->judul }}</h2>
                        <p class="text-sm font-semibold text-gray-500">{{ $film->tahun_rilis }}</p>
                    </div>
                </div>
            </a>
            @empty
                <p class="text-gray-600">Tidak ada film yang cocok dengan genre yang dipilih.</p>
            @endforelse
        </div>
    </div>
</x-app>