<x-app>
    <div>
        <div class=" mb-28">
            <form action="{{ route('dashboard.subscriber') }}" method="GET" class="flex items-center max-w-md mx-auto">   
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        
                    </div>
                    <input value="{{ request('search') }}" type="search" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Film..."  />
                </div>
                <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
        <div class="flex justify-between items-center mb-6 py-1 px-3 border-l-4 border-blue-300">
        <h1 class="text-xl font-bold " >Film Terbaru</h1>
        <a href="{{ route('films.latest') }}" class="flex hover:underline">Tampilkan Semua <svg class="w-6 h-6 text-gray-800 dark:text-white/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
          </svg>
          </a>
    </div>
        <div class="flex gap-5 scroll mb-10 border-b">
        @foreach($latestFilms as $film)
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
        @endforeach
    </div>
    <div class="flex justify-between items-center mb-6 py-1 px-3 border-l-4 border-blue-300">
        <h1 class="text-xl font-bold " >Film Terpopuler</h1>
        <a href="{{ route('films.topRated') }}" class="flex hover:underline">Tampilkan Semua <svg class="w-6 h-6 text-gray-800 dark:text-white/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
          </svg></a>
    </div>
        <div class="flex gap-5 scroll mb-10 border-b ">
        @foreach($topRatedFilms as $film)
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
        @endforeach
    </div>
        @if ($films->isEmpty())
    <p class="text-gray-500">Film tidak ditemukan.</p>
@endif
        <div class="flex gap-5 scroll mb-10 ">
            @foreach ($films as $film)
                
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

        @endforeach
        {{ $films->links() }}
        </div>
    </div>
</x-app>