<x-dashboard>
    <div class=" h-full">
        <div class="mb-4">
            <div class=" w-full flex justify-end gap-4 px-10">
                <button data-modal-target="film-modal-admin" data-modal-toggle="film-modal-admin"
                    class="block mb-4 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Tambah Film
                </button>

                <button onclick="openFilterModal()"
                    class="text-white mb-4 bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                    type="button">Filter
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg></button>
            </div>
            <!-- Dropdown menu -->



            <form action="{{ route('films.index') }}" method="GET" class="flex items-center max-w-md mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                    </div>
                    <input value="{{ request('search') }}" type="search" id="search" name="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Film..." />
                </div>
                <button type="submit"
                    class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
        @include('admin.film.addfilm')
        @include('admin.film.filtergenre')

        @if(session('success'))
        <div class=" dark:bg-green-600 bg-green-400/50 w-full p-2 text-sm">
        {{ session('success') }}
        </div>
@endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-white uppercase bg-black dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('films.index', ['sort' => 'judul', 'order' => $sort === 'judul' && $order === 'asc' ? 'desc' : 'asc']) }}"
                            class="flex">
                            Judul

                            <span><svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg></span>

                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('films.index', ['sort' => 'rating', 'order' => $sort === 'rating' && $order === 'asc' ? 'desc' : 'asc']) }}"
                            class="flex">
                            Rating

                            <span><svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg></span>

                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('films.index', ['sort' => 'durasi', 'order' => $sort === 'durasi' && $order === 'asc' ? 'desc' : 'asc']) }}"
                            class="flex">
                            Durasi

                            <span><svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg></span>

                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Genre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        cast
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Negara
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('films.index', ['sort' => 'tahun_rilis', 'order' => $sort === 'tahun_rilis' && $order === 'asc' ? 'desc' : 'asc']) }}"
                            class="flex">
                            Tahun Rilis

                            <span><svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg></span>

                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori Umur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-200 even:dark:bg-gray-800 border-b border-black dark:border-gray-700">
                        <td class=" p-2">
                            <img src="{{ asset('storage/' . $film->image) }}" class=" w-12 rounded-sm"
                                alt=" ">
                        </td>
                        <td class="">
                            {{ $film->judul }}
                        </td>

                        <td class="">
                            {{ number_format($film->averageRating(), 1) ?? 'N/A' }}
                        </td>
                        <td class="">
                            {{ intdiv($film->durasi, 60) }} jam {{ $film->durasi % 60 }} menit
                        </td>
                        <td class="">
                            @foreach ($film->genres as $genre)
                                {{ $genre->nama_genre }},
                            @endforeach
                        </td>
                        <td class="">
                            {{ $film->cast }}
                        </td>
                        <td class="">
                            {{ $film->negara->nama_negara }}
                        </td>
                        <td class="">
                            {{ $film->tahun_rilis }}
                        </td>
                        <td class="">
                            @if ($film->age_category == 0)
                                Semua Umur (SU)
                            @elseif($film->age_category == 7)
                                PG-7
                            @elseif($film->age_category == 13)
                                PG-13
                            @elseif($film->age_category == 17)
                                R-17
                            @elseif($film->age_category == 21)
                                R-21
                            @endif
                        </td>
                        <td class=" py-4 flex gap-2 pr-2">
                            <button type="button" data-modal-target="edit-film-modal"
        data-modal-toggle="edit-film-modal"
        onclick="openEditFilmModal(
            {{ $film->id }},
            '{{ addslashes($film->judul) }}',
            '{{ addslashes($film->sinopsis) }}',
            '{{ $film->trailer }}',
            {{ $film->id_negara }},
            {{ $film->tahun_rilis }},
            '{{ $film->age_category }}',
            {{ $film->durasi }},
            '{{ addslashes($film->cast) }}',
            '{{ json_encode($film->genres->pluck('id')->toArray()) }}',
            '{{ $film->image }}',
            '{{ $film->banner }}',
            '{{ $film->banner_status }}'
        )"
        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-3 py-2 text-center">
    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
    </svg>
</button>

                            <button type="button"
                                onclick="setDeleteAction('{{ route('films.destroy', $film->id) }}', '{{ $film->judul }}')"
                                data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                class=" btn btn-danger flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 "
                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                               
                            </button>
                            <div id="delete-modal" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full h-auto max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-toggle="delete-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <!-- Modal -->
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true"
                                                class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <!-- Di modal delete -->
                                            <p>Apakah Anda yakin ingin menghapus film <br>
                                                <strong id="film-judul"></strong>?
                                            </p>
                                            <form id="delete-form" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes,
                                                    I'm sure</button>
                                                <button type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                                    data-modal-toggle="delete-modal">No,
                                                    cancel</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <script>
                                function setDeleteAction(action, judul) {
                                    document.getElementById('delete-form').action = action;
                                    document.getElementById('film-judul').innerText = judul;
                                }
                            </script>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.film.editfilm')
        <script src="{{ asset('js/editFilm.js') }}"></script>
    </div>

</x-dashboard>
