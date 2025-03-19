<!-- Modal Sidebar -->
<div id="filter-modal" class="fixed top-0 right-0 w-80 h-full bg-white dark:bg-gray-800 shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    <div class="p-5 h-full flex flex-col">
        <div class="flex justify-between items-center border-b pb-3">
            <h2 class="text-lg font-semibold">Filter</h2>
            <button onclick="closeFilterModal()" class="text-gray-500 hover:text-red-500">✖</button>
        </div>

        <!-- Form dengan Scroll -->
        <div class="flex-1 overflow-y-auto p-2 no-scrollbar">
            <form action="{{ route('film.index') }}" method="GET" class="mt-4 space-y-4">
                <!-- Search Genre -->
                <div>
                    <label class="block text-sm font-medium mb-2">Genre</label>
                    <input type="text" id="searchGenreInput" onkeyup="filterGenres()" 
                        class="w-full p-2 border rounded mb-2" placeholder="Cari Genre...">
                    <ul class="h-32 overflow-y-auto no-scrollbar p-2">
                        @foreach ($genres as $genre)
                        <li class="genre-item">
                            <label class="flex items-center">
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}" 
                                    {{ in_array($genre->id, request('genres', [])) ? 'checked' : '' }} class="mr-2">
                                <span>{{ $genre->nama_genre }}</span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Search Tahun -->
                <div>
                    <label class="block text-sm font-medium mb-2">Tahun</label>
                    <input type="text" id="searchTahunInput" onkeyup="filterTahun()" 
                        class="w-full p-2 border rounded mb-2" placeholder="Cari Tahun...">
                    <ul class="h-32 overflow-y-auto no-scrollbar p-2">
                        @foreach ($tahunList as $tahun)
                        <li class="tahun-item">
                            <label class="flex items-center">
                                <input type="checkbox" name="tahun[]" value="{{ $tahun }}" 
                                    {{ in_array($tahun, request('tahun', [])) ? 'checked' : '' }} class="mr-2">
                                <span>{{ $tahun }}</span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Search Negara -->
                <div>
                    <label class="block text-sm font-medium mb-2">Negara</label>
                    <input type="text" id="searchNegaraInput" onkeyup="filterNegara()" 
                        class="w-full p-2 border rounded mb-2" placeholder="Cari Negara...">
                    <ul class="h-32 overflow-y-auto no-scrollbar p-2">
                        @foreach ($negaraList as $negara)
                        <li class="negara-item">
                            <label class="flex items-center">
                                <input type="checkbox" name="negara[]" value="{{ $negara->id }}" 
                                    {{ in_array($negara->id, request('negara', [])) ? 'checked' : '' }} class="mr-2">
                                <span>{{ $negara->nama_negara }}</span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg">Terapkan</button>
            </form>
        </div>
    </div>
</div>

<!-- 🔹 JavaScript -->
<script>
    function openFilterModal() {
        document.getElementById("filter-modal").classList.remove("translate-x-full");
    }

    function closeFilterModal() {
        document.getElementById("filter-modal").classList.add("translate-x-full");
    }

    function filterGenres() {
        let input = document.getElementById("searchGenreInput").value.toLowerCase();
        document.querySelectorAll(".genre-item").forEach(item => {
            item.style.display = item.textContent.toLowerCase().includes(input) ? "" : "none";
        });
    }

    function filterTahun() {
        let input = document.getElementById("searchTahunInput").value.toLowerCase();
        document.querySelectorAll(".tahun-item").forEach(item => {
            item.style.display = item.textContent.toLowerCase().includes(input) ? "" : "none";
        });
    }

    function filterNegara() {
        let input = document.getElementById("searchNegaraInput").value.toLowerCase();
        document.querySelectorAll(".negara-item").forEach(item => {
            item.style.display = item.textContent.toLowerCase().includes(input) ? "" : "none";
        });
    }
</script>
