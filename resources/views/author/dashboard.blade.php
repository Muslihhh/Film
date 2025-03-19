<x-dasautor>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
        <div class="flex justify-between bg-blue-200 dark:bg-blue-700 p-4 rounded-lg">
            <div>
                <p class="text-lg font-bold">Film Saya</p>
                <p class="text-2xl">{{ $filmsCount }}</p>
                
            </div>
            <div>
                <svg class="w-20 h-20 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1Zm0 0-4 4m5 0H4m1 0 4-4m1 4 4-4m-4 7v6l4-3-4-3Z"/>
                  </svg>
                            
            </div>
        </div>
        <div class="flex justify-between bg-green-200 dark:bg-green-700 p-4 rounded-lg">
            <div>
                <p class="text-lg font-bold">Rata Rata Rating</p>
                <p class="text-2xl">{{ round($averageRating, 1) }}</p>
               
            </div>
            <div>
                <svg class="w-20 h-20 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                  </svg>
            </div>
        </div>
        <div class="flex justify-between bg-yellow-200 dark:bg-yellow-700 p-4 rounded-lg">
            <div>
                <p class="text-lg font-bold">Total Komentar</p>
                <p class="text-2xl">{{ $commentCount }}</p>
            </div>
            <div>
                <svg class="w-20 h-20 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z"/>
                  </svg>
                  
            </div>
        </div>
       
    </div>
    <div class=" grid grid-rows-3 grid-cols-2 gap-4">
        <div class=" p-4 rounded-lg shadow-md bg-white dark:bg-gray-800">
            <div class="text-xl font-bold mb-2 flex gap-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1Zm0 0-4 4m5 0H4m1 0 4-4m1 4 4-4m-4 7v6l4-3-4-3Z"/>
                  </svg>
                  
                  <h1>Film Terbaru</h1>
                </div>
            <ul>
                @foreach($newFilms as $film)
                    <li class="border-b py-2">
                        <span>{{ $film->judul }}</span>
                        <small class="text-gray-500">{{ $film->created_at->diffForHumans() }}</small>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class=" p-4 rounded-lg shadow-md bg-white dark:bg-gray-800">
            <div class="text-xl font-bold mb-2 flex gap-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1Zm0 0-4 4m5 0H4m1 0 4-4m1 4 4-4m-4 7v6l4-3-4-3Z"/>
                  </svg>
                  
                  <h1>Film Rating Tertinggi</h1>
                </div>
                @foreach($topRatedFilms as $film)
                    <li class="flex justify-between border-b py-2">
                        <span>{{ $film->judul }}</span>
                        <span class="flex">
                            <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                            </svg>
                            {{ number_format($film->rating, 1) }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-dasauutor>