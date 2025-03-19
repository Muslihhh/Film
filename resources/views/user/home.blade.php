<x-app>
<div class="m-10">
    <div>
        <div class=" mb-28 items-center max-w-md mx-auto">
            @include('user.filter.search')
        </div>

        @if (!request('search'))
            <div class="flex justify-between items-center mb-6 py-1 px-3 border-l-4 border-blue-300">
                <h1 class="text-xl font-bold ">Film Terbaru</h1>
                <a href="{{ route('films.latest') }}" class="flex hover:underline">Tampilkan Semua <svg
                        class="w-6 h-6 text-gray-800 dark:text-white/50" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>
            <div
                class="flex w-full overflow-x-auto mb-10 border-b pb-4 scroll-smooth snap-x snap-mandatory no-scrollbar">
                @foreach ($latestFilms as $film)
                <div class="film-card" style="flex: 0 0 calc(100% / 6);">
                    @include('user.film.film_card', ['film' => $film])
                </div>
                @endforeach
            </div>

            <div class="flex justify-between items-center mb-6 py-1 px-3 border-l-4 border-blue-300">
                <h1 class="text-xl font-bold ">Film Terpopuler</h1>
                <a href="{{ route('films.topRated') }}" class="flex hover:underline">Tampilkan Semua <svg
                        class="w-6 h-6 text-gray-800 dark:text-white/50" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg></a>
            </div>
            <div class="flex w-full overflow-x-auto mb-10 border-b pb-4 scroll-smooth snap-x snap-mandatory no-scrollbar">
                @foreach ($topRatedFilms as $film)
                    <div class="film-card" style="flex: 0 0 calc(100% / 6);">
                        @include('user.film.film_card', ['film' => $film])
                    </div>
                @endforeach
            </div>
        @endif
        @if (request('search'))
            <div class="flex flex-wrap justify-between items-center mb-6 py-1 px-3 border-l-4 border-blue-300">
                <h1 class="text-xl font-bold ">hasil Pencarian</h1>
            </div>
            <div
                class="w-full grid grid-cols-6 gap-4">
                @foreach ($films as $film)
                    @include('user.film.film_card', ['film' => $film])
                @endforeach
            </div>
           
    </div>
    @endif
</div>
</x-app>
