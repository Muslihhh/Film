<x-app>
    <div class="mt-40"></div>
    <div class=" w-full bg-gray-200 dark:bg-gray-900 p-5 rounded-xl">
        <!-- Kotak Hitam dengan Gambar -->
        <div class=" flex xl:flex-row flex-col items-start  ">
            <!-- Gambar -->
            <div class=" xl:w-1/4 w-full mx-auto h-auto bg-black shadow-xl overflow-hidden rounded-xl">
                <img src="{{ asset('storage/' . $film->image) }}" class="w-full h-full  object-cover" alt="Gambar Film">
            </div>

            <!-- Judul dan Deskripsi -->
            <div class=" xl:w-3/4 w-auto flex flex-col xl:ml-10 mt-4 xl:mt-0">
                <!-- Judul -->
                <h1 class="  text-4xl font-bold text-gray-800 dark:text-white">{{ $film->judul }}</h1>
                <h2 class=" text-lg font-semibold text-gray-500">{{ $film->tahun_rilis }} .
                    {{ intdiv($film->durasi, 60) }} jam {{ $film->durasi % 60 }} menit</h2>
                <div class=" flex flex-wrap gap-3 mt-2">
                    @foreach ($film->genres as $genre)
                        <a href="http://">
                            <p
                                class=" text-gray-600 dark:text-gray-300 bg-transparent border border-black dark:border-white hover:bg-gray-300 dark:hover:bg-gray-600 px-5 py-1 rounded-xl">
                                {{ $genre->nama_genre }}</p>
                        </a>
                    @endforeach
                </div>
                <!-- Deskripsi -->
                <div class=" mt-10">
                    <h1 class="text-2xl font-bold">Sinopsis</h1>
                    <p class="max-h-64 overflow-y-auto pr-4 no-scrollbar">
                        {{ $film->sinopsis }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Sinopsis -->


        <div class=" xl:mx-10 mt-20 ">
            @if ($film->trailer)
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/{{ explode('v=', $film->trailer)[1] }}" frameborder="0"
                    allowfullscreen>
                </iframe>
            @else
                <p class="text-gray-500">Trailer tidak tersedia.</p>
            @endif


            <div class=" mt-10">

                <form action="{{ route('komentar.store', $film->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center space-x-1 rating" id="rating-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="star{{ $i }}" name="rating"
                                value="{{ $i }}" {{ $film->rating == $i ? 'checked' : '' }}
                                class="hidden" />
                            <label for="star{{ $i }}" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="{{ $i <= $film->rating ? '#f59e0b' : 'none' }}" viewBox="0 0 24 24"
                                    stroke="{{ $i <= $film->rating ? '#f59e0b' : '#d1d5db' }}" class="w-6 h-6 star"
                                    data-value="{{ $i }}">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.713 5.267a1 1 0 00.95.69h5.516c.967 0 1.371 1.24.588 1.81l-4.473 3.248a1 1 0 00-.364 1.118l1.713 5.267c.3.922-.755 1.688-1.54 1.118l-4.473-3.248a1 1 0 00-1.176 0l-4.473 3.248c-.784.57-1.84-.196-1.54-1.118l1.713-5.267a1 1 0 00-.364-1.118L2.17 10.694c-.783-.57-.38-1.81.588-1.81h5.516a1 1 0 00.95-.69l1.713-5.267z" />
                                </svg>
                            </label>
                        @endfor
                    </div>

                    <script>
                        const stars = document.querySelectorAll('#rating-stars .star');
                        const inputs = document.querySelectorAll('#rating-stars input');

                        stars.forEach((star) => {
                            star.addEventListener('click', function() {
                                const ratingValue = this.getAttribute('data-value');

                                // Update radio button selection
                                inputs.forEach((input) => {
                                    if (input.value == ratingValue) {
                                        input.checked = true;
                                    }
                                });

                                // Update star color
                                stars.forEach((star) => {
                                    if (star.getAttribute('data-value') <= ratingValue) {
                                        star.setAttribute('fill', '#f59e0b');
                                        star.setAttribute('stroke', '#f59e0b');
                                    } else {
                                        star.setAttribute('fill', 'none');
                                        star.setAttribute('stroke', '#d1d5db');
                                    }
                                });
                            });
                        });
                    </script>

                    <div class=" flex">
                        <textarea name="isi_komentar" class=" text-black w-full" placeholder="Tambahkan komentar..." required></textarea>

                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Kirim Komentar</button>
                    </div>
                </form>

                <h3>Komentar:</h3>

                @foreach ($film->komentar->where('parent_id', null) as $komentar)
    <div class="mb-2">
        <div class="flex flex-col mb-2">
            <div class="bg-slate-200 dark:bg-slate-700 rounded-md p-4">
                <div class="flex items-center mb-4">
                    <img class="w-10 h-10 me-4 rounded-full" src="{{ asset('lufi.png') }}" alt="">
                    <div class="flex flex-col font-medium dark:text-white">
                        <strong>{{ $komentar->user->name }}</strong>
                        <small>{{ $komentar->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <div class="items-center mb-4">
                    <p class="flex">
                        @for ($i = 1; $i <= $komentar->rating; $i++)
                            <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                            </svg>
                        @endfor
                    </p>
                    <p class="line-clamp-3 text-ellipsis">{{ $komentar->isi_komentar }}</p>
                </div>

                <!-- Tombol Balas -->
                <button onclick="toggleReplyForm({{ $komentar->id }})" class="text-blue-500 hover:underline">Balas</button>

                <!-- Tombol Lihat Balasan -->
                @if ($komentar->replies->count() > 0)
                    <button onclick="toggleReplies({{ $komentar->id }})"
                        class="text-blue-500 hover:underline mt-2">Lihat Balasan
                        ({{ $komentar->replies->count() }})</button>

                    <!-- Balasan Komentar (Disembunyikan) -->
                    <div id="replies-{{ $komentar->id }}" class="hidden mt-2 ml-4 border-l pl-2">
                        @foreach ($komentar->replies as $reply)
                            <div class="mb-2">
                                <strong>{{ $reply->user->name }}</strong> -
                                <small>{{ $reply->created_at->diffForHumans() }}</small>
                                <p>{{ $reply->isi_komentar }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Form Balasan (Disembunyikan Secara Default) -->
                <div id="reply-form-{{ $komentar->id }}" class="hidden w-full mt-2">
                    <form action="{{ route('komentar.store', $film->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $komentar->id }}">
                        <div class="flex">
                            <textarea name="isi_komentar" class="w-full" placeholder="Balas komentar..." required></textarea>
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

                <script>
                    function toggleReplyForm(komentarId) {
                        let form = document.getElementById('reply-form-' + komentarId);
                        form.classList.toggle('hidden');
                    }

                    function toggleReplies(komentarId) {
                        let repliesDiv = document.getElementById('replies-' + komentarId);
                        repliesDiv.classList.toggle('hidden');
                    }
                </script>

            </div>
        </div>

    </div>
    <div class=" mt-5">
        <h1 class=" text-3xl">Film Lainnya</h1>
    </div>
    <div class=" flex overflow-x-auto gap-5 no-scrollbar">
        @foreach($randomFilms as $randomFilm)
        <a href="{{ route('films.show', $randomFilm->id) }}" class="scroll-mx-5">
            <div class="relative w-full max-w-xs h-auto group overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <!-- Gambar Film -->
                <img src="{{ asset('storage/' . $randomFilm->image)}}" alt="{{ $randomFilm->judul }}" 
                    class="w-full h-[250px] object-cover rounded-2xl group-hover:scale-105 transition-transform duration-300">
                
                <!-- Badge Rating -->
                <div class="absolute top-0 left-0 bg-black/50 text-white px-3 py-1 rounded-br-lg flex items-center">
                    <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                    </svg>
                    <p class="ml-1 font-semibold">{{ number_format($randomFilm->averageRating(), 1) ?? 'N/A' }}</p> 
                </div>
        
                <!-- Informasi Film -->
                <div class="bg-transparant px-3 py-2 rounded-b-2xl">
                    <h2 class="text-lg leading-5 font-bold truncate">{{ $randomFilm->judul }}</h2>
                    <p class="text-sm font-semibold text-gray-500">{{ $randomFilm->tahun_rilis }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>

</x-app>
