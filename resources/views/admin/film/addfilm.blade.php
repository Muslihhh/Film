<div id="film-modal-admin" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Film
                </h3>
                <button type="button" data-modal-hide="film-modal-admin"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Film</label>
                        <input type="text" name="judul" id="judul"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Masukkan judul film" required>
                    </div>
                    <div>
                        <label for="sinopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis</label>
                        <textarea name="sinopsis" id="sinopsis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Masukkan sinopsis film" required></textarea>
                    </div>
                    <div>
                        <label for="trailer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trailer (Opsional)</label>
                        <input type="url" name="trailer" id="trailer"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Masukkan link trailer">
                    </div>
                    <div>

                    
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Genre</label>
                    
                        <div>
                            <label class="block text-sm font-medium mb-2">Genre</label>
                            <input type="text" id="addsearchGenreInput" onkeyup="addfilterGenres()" 
                                class="w-full bg-white text-black dark:bg-gray-600 dark:text-white p-2 border rounded mb-2" placeholder="Cari Genre...">
                            <ul class="h-32 overflow-y-auto no-scrollbar  p-2 ">
                                @foreach ($genres as $genre)
                                <li class="genre-item">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}"  id="genre-{{ $genre->id }}"
                                           >
                                            <label for="genre-{{ $genre->id }}" class="text-sm text-gray-700 dark:text-white">
                                                {{ $genre->nama_genre }}
                                            </label>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    
                </div>
                <div>
                    <label for="cast" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cast</label>
                    <input type="text" name="cast" id="cast"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Masukkan nama cast" required>
                </div>
                    <div>
                        <label for="id_negara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Negara</label>
                        <select name="id_negara" id="id_negara"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            @foreach ($negaras as $negara)
                                <option value="{{ $negara->id }}">{{ $negara->nama_negara }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tahun_rilis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Rilis</label>
                        <input type="number" name="tahun_rilis" id="tahun_rilis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Masukkan tahun rilis" required>
                    </div>
                    <div>
                        <label for="age_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori Umur</label>
                        <select name="age_category" id="age_category"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
    <option value="0">Semua Umur (SU)</option>
    <option value="7">Bimbingan Orang Tua (PG-7)</option>
    <option value="13">Remaja (PG-13)</option>
    <option value="17">Dewasa Muda (R-17)</option>
    <option value="21">Dewasa (R-21)</option>
</select>
                    </div>
                    <div>
                        <label for="durasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi (menit)</label>
                        <input type="number" name="durasi" id="durasi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Masukkan Durasi" required>
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poster Film</label>
                        <input type="file" name="image" id="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            >
                    </div>
                    <div>
                        <label for="banner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Banner Film (jika ada)</label>
                        <input type="file" name="banner" id="banner"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            >
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Tambah Film
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    function addfilterGenres() {
        let input = document.getElementById("addsearchGenreInput").value.toLowerCase();
        document.querySelectorAll(".genre-item").forEach(item => {
            item.style.display = item.textContent.toLowerCase().includes(input) ? "" : "none";
        });
    }
</script>