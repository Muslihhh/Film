<div class="relative w-56 bg-white dark:bg-gray-900 h-auto group overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
    <a href="{{ route('films.detail', $film->slug) }}" class="snap-start shrink-0">
    <!-- Gambar Film -->
    <img src="{{ asset('storage/' . $film->image)}}" alt="{{ $film->judul }}" 
        class="w-full h-[250px] object-cover rounded-t-2xl">
    
    <!-- Badge Rating -->
    <div class="absolute top-0 left-0 bg-black/50 text-white px-3 py-1 rounded-br-lg flex items-center">
        <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
        </svg>
        <p class="ml-1 font-semibold">{{ number_format($film->averageRating(), 1) ?? 'N/A' }}</p> 
    </div>
    </a>
    <!-- Informasi Film -->
    <div class="bg-transparant px-3 py-2 rounded-b-2xl gap-2 flex flex-col">
        <h2 class="text-lg leading-5 font-bold truncate">{{ $film->judul }}</h2>
        <p class="text-sm font-semibold text-gray-500">{{ $film->tahun_rilis }}</p>
        @livewire('watchlist-button', ['film_id' => $film->id])
        
    </div>
</div>