<!-- Modal Edit Film -->
<div id="edit-film-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 flex bg-black bg-opacity-50 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold">Edit Film</h3>
                <button type="button" data-modal-hide="edit-film-modal" onclick="closeEditFilmModal()"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <form id="edit-film-form" class="p-4" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" id="edit-film-id" name="id">

                <div class="grid gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="edit-judul" class="block mb-2 text-sm font-medium">Judul Film</label>
                        <input type="text" name="judul" id="edit-judul"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    </div>

                    <div class="col-span-2">
                        <label for="edit-sinopsis" class="block mb-2 text-sm font-medium">Sinopsis</label>
                        <textarea name="sinopsis" id="edit-sinopsis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required></textarea>
                    </div>

                    <div class="col-span-2">
                        <label for="edit-trailer" class="block mb-2 text-sm font-medium">Trailer (URL)</label>
                        <input type="url" name="trailer" id="edit-trailer"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium">Genre</label>
                        <div class="max-h-20 overflow-y-auto p-2 rounded-lg">                            @foreach($genres as $genre)
                                <div class="mb-2">
                                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}" 
                                           id="edit-genre-{{ $genre->id }}" 
                                           class="mr-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                                    <label for="edit-genre-{{ $genre->id }}">{{ $genre->nama_genre }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label for="edit-id_negara" class="block mb-2 text-sm font-medium">Negara</label>
                        <select name="id_negara" id="edit-id_negara"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            @foreach($negaras as $negara)
                                <option value="{{ $negara->id }}">{{ $negara->nama_negara }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="edit-tahun_rilis" class="block mb-2 text-sm font-medium">Tahun Rilis</label>
                        <input type="number" name="tahun_rilis" id="edit-tahun_rilis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    </div>

                    <div class="col-span-2">
                        <label for="edit-age_category" class="block mb-2 text-sm font-medium">Kategori Umur</label>
                        <select name="age_category" id="edit-age_category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                            <option value="0">Semua Umur (SU)</option>
                            <option value="7">Bimbingan Orang Tua (PG-7)</option>
                            <option value="13">Remaja (PG-13)</option>
                            <option value="17">Dewasa Muda (R-17)</option>
                            <option value="21">Dewasa (R-21)</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="edit-durasi" class="block mb-2 text-sm font-medium">Durasi (menit)</label>
                        <input type="number" name="durasi" id="edit-durasi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    </div>
                </div>

                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>