<x-app>
    <div class="mt-40 m-10">
        <!-- Container Utama -->
        <div class="w-full bg-gray-200 dark:bg-gray-900 p-5 rounded-xl">
            <!-- Bagian Gambar dan Informasi Film -->
            <div class="flex xl:flex-row md:flex-row flex-col items-start pb-16 border-b">
                <!-- Gambar Film -->
                <div class="xl:w-1/4 w-full mx-auto h-auto bg-black shadow-xl overflow-hidden rounded-xl">
                    <img src="{{ asset('storage/' . $film->image) }}" class="w-full h-full object-cover" alt="Gambar Film">
                </div>

                <!-- Informasi Film -->
                <div class="xl:w-3/4 w-auto flex flex-col xl:ml-10 mt-4 xl:mt-0">
                    <!-- Judul Film -->
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">{{ $film->judul }}</h1>
                    <h2 class="text-lg font-semibold text-gray-500">
                        {{ $film->tahun_rilis }} . {{ $film->negara->nama_negara }} . 
                        {{ intdiv($film->durasi, 60) }} jam {{ $film->durasi % 60 }} menit
                    </h2>

                    <!-- Genre Film -->
                    <div class="flex flex-wrap gap-3 mt-2">
                        @foreach ($film->genres as $genre)
                            <a href="{{ route('genres.list', ['genres' => [$genre->id]]) }}">
                                <p class="text-gray-600 dark:text-gray-300 bg-transparent border border-black dark:border-white hover:bg-gray-300 dark:hover:bg-gray-600 px-5 py-1 rounded-xl">
                                    {{ $genre->nama_genre }}
                                </p>
                            </a>
                        @endforeach
                    </div>

                    <!-- Sinopsis Film -->
                    <div class="mt-10">
                        <h1 class="text-2xl font-bold">Sinopsis</h1>
                        <p class="max-h-64 overflow-y-auto pr-4 no-scrollbar">
                            {{ $film->sinopsis }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Trailer Film -->
            @if ($film->trailer)
                <div class="xl:mx-10 my-20">
                    <h3 class="text-3xl font-bold mb-2 border-l-4 border-blue-500 pl-2">Trailer</h3>
                    <div class="max-w-4xl h-auto mx-auto">
                        <iframe class="w-full h-96 rounded-lg" src="https://www.youtube.com/embed/{{ $film->trailer_id }}" 
                            title="YouTube video player" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            @endif

            <!-- Rating dan Review -->
            <div class="xl:mx-10 pt-8 border-t">
                <div class="flex items-end gap-3">
                    <!-- Rata-rata Rating -->
                    <div class="flex items-end">
                        <p class="text-3xl font-bold">{{ number_format($film->averageRating(), 1) }}/5</p>
                        <svg class="w-14 h-14 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                    </div>
                    <!-- Jumlah Review -->
                    <p class="text-gray-600 dark:text-gray-300">({{ $reviewCount }} review)</p>
                </div>

                <!-- Form Komentar dan Rating -->
                <div class="mt-10">
                    <h3 class="text-lg font-bold">Komentar & Rating</h3>

                    @php
                        $userHasCommented = Auth::check() && \App\Models\Komentar::userHasCommented($film->id, Auth::id());
                    @endphp

                    @if (Auth::check() && !$userHasCommented)
                        <form action="{{ route('komentar.store', $film->id) }}" method="POST">
                            @csrf
                            <div class="mb-4 ">
                                <label class="block font-bold">Beri Rating</label>
                                <select name="rating" class=" text-black border p-2 rounded-lg">
                                    <option value="">Pilih Rating</option>
                                    <option value="1">⭐</option>
                                    <option value="2">⭐⭐</option>
                                    <option value="3">⭐⭐⭐</option>
                                    <option value="4">⭐⭐⭐⭐</option>
                                    <option value="5">⭐⭐⭐⭐⭐</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block font-bold">Komentar (Opsional)</label>
                                <textarea name="isi_komentar" class="border text-black p-2 w-full rounded-lg" placeholder="Tulis komentar..."></textarea>
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                                Kirim
                            </button>
                        </form>
                    @elseif(Auth::check())
                        <p class="text-gray-500">Anda sudah memberikan komentar untuk film ini.</p>
                    @else
                        <p class="text-gray-500">Silakan login untuk memberikan komentar.</p>
                    @endif

                    <!-- Daftar Komentar Terbaru -->
                    <h3 class="mt-6">Komentar Terbaru:</h3>
                    @foreach ($film->komentar->where('parent_id', null)->take(3) as $komentar)
                        <div class=" bg-white dark:bg-slate-700 rounded-md p-4 border-b">
                            <div class="flex items-center mb-4">
                                <img class="w-10 h-10 me-4 rounded-full" src="{{ asset('lufi.png') }}" alt="">
                                <div class="flex flex-col dark:text-white">
                                    <h1 class="text-xl">{{ $komentar->user->name }}</h1>
                                    <p>{{ $komentar->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="items-center mb-4">
                                <p class="flex">
                                    @for ($i = 1; $i <= $komentar->rating; $i++)
                                        <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                                        </svg>
                                    @endfor
                                </p>
                                <p class="line-clamp-3 text-ellipsis">{{ $komentar->isi_komentar }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Tombol Lihat Semua Komentar -->
                    <a href="{{ route('films.comments', $film->id) }}" class="text-blue-500 hover:underline mt-4 block">
                        Lihat Semua Komentar
                    </a>
                </div>
            </div>
        </div>

        <!-- Film Lainnya -->
        <div class="mt-5">
            <h1 class="text-3xl">Film Lainnya</h1>
        </div>
        <div class="flex overflow-x-auto gap-5 no-scrollbar">
            @foreach ($randomFilms as $randomFilm)
                @include('user.film.film_card', ['film' => $randomFilm])
            @endforeach
        </div>
    </div>
</x-app>