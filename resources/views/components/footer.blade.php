<footer class="bg-gray-900 text-white mt-10">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-between py-10">
            <!-- Logo & Deskripsi -->
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h2 class="text-lg font-bold">FilmKU</h2>
                <p class="text-gray-400 mt-2">Tempat terbaik untuk menemukan banyak film termasuk film terbaru, terpopuler, dan ulasan terbaik.</p>
            </div>

            <!-- Navigasi -->
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h3 class="text-lg font-semibold mb-2">Navigasi</h3>
                <ul class="text-gray-400">
                    <li><a href="{{ route('dashboard.subscriber') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('films.latest') }}" class="hover:text-white">Film Terbaru</a></li>
                    <li><a href="{{ route('films.topRated') }}" class="hover:text-white">Film Terpopuler</a></li>
                    <li><a href="{{ route('genres.list') }}" class="hover:text-white">Genre</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="w-full md:w-1/3">
                <h3 class="text-lg font-semibold mb-2">Hubungi Kami</h3>
                <p class="text-gray-400">Email: support@filmKU.com</p>
                <p class="text-gray-400">Telepon: +62 896-9046-0054</p>
                <div class="flex mt-3">
                    <a href="#" class="text-gray-400 hover:text-white mx-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white mx-2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white mx-2">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-700 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} FilmKU. Semua Hak Cipta Dilindungi.
        </div>
    </div>
</footer>
