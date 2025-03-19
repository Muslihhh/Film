<x-app>
    <div class=" h-screen ">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Komentar untuk {{ $film->judul }}</h1>

        @foreach ($komentar as $item)
            <div class=" border-b bg-slate-200 dark:bg-slate-700 rounded-md p-4">
                <div class="flex items-center mb-2">
                    <img class="w-10 h-10 me-4 rounded-full" src="{{ asset('lufi.png') }}" alt="">
                    <div class="flex flex-col dark:text-white">
                        <h1 class="text-lg">{{ $item->user->name }}</h1>
                        <p>{{ $item->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="mb-2">
                    <p class="flex">
                        @for ($i = 1; $i <= $item->rating; $i++)
                            <svg class="w-5 h-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                            </svg>
                        @endfor
                    </p>
                    <p>{{ $item->isi_komentar }}</p>
                </div>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-4">
            {{ $komentar->links() }}
        </div>
    </div>
</div>
</x-app>
