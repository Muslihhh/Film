<x-app>
    <div class="mt-40"></div>
    <div class="relative w-full bg-gray-200 dark:bg-gray-900 p-10">
        <!-- Kotak Hitam dengan Gambar -->
        <div class="relative flex xl:flex-row flex-col items-start">
            <!-- Gambar -->
            <div class="relative -top-28 w-72 h-96 bg-black shadow-xl">
                <img src="starwars.jpg" class="w-full h-full object-cover" alt="Gambar Film">
            </div>

            <!-- Judul dan Deskripsi -->
            <div class="flex flex-col xl:ml-10 mt-4 xl:mt-0 space-y-4">
                <!-- Judul -->
                <h1 class=" relative sm:absolute -top-24 text-4xl font-bold text-gray-800 dark:text-white">Judul Film</h1>
                <div class=" flex gap-3">
                    <a href="http://">
                    <p class=" text-gray-600 dark:text-gray-300 bg-transparent border border-black dark:border-white hover:bg-gray-300 dark:hover:bg-gray-600 px-5 py-1 rounded-xl">Kategori</p>
                    </a>
                    <a href="http://">
                    <p class=" text-gray-600 dark:text-gray-300 bg-transparent border border-black dark:border-white hover:bg-gray-300 dark:hover:bg-gray-600 px-5 py-1 rounded-xl">Kategori</p>
                    </a>
                    <a href="http://">
                    <p class=" text-gray-600 dark:text-gray-300 bg-transparent border border-black dark:border-white hover:bg-gray-300 dark:hover:bg-gray-600 px-5 py-1 rounded-xl">Kategori</p>
                    </a>
                    <a href="http://">
                    <p class=" text-gray-600 dark:text-gray-300 bg-transparent border border-black dark:border-white hover:bg-gray-300 dark:hover:bg-gray-600 px-5 py-1 rounded-xl">Kategori</p>
                    </a>
                </div>
                <!-- Deskripsi -->
                <p class="text-gray-600 dark:text-gray-300">
                    Deskripsi singkat tentang film ini. Contoh: Film ini bercerita tentang petualangan epik di luar angkasa, penuh aksi dan drama yang mendalam.
                </p>
            </div>
        </div>

        <!-- Sinopsis -->
        <div class="mt-10">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Sinopsis</h2>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                Sinopsis lengkap film ini. Contoh: Pada sebuah galaksi yang jauh, seorang pahlawan muda terjebak dalam konflik besar antara kekuatan gelap dan terang. Dengan bantuan teman-temannya, ia harus menghadapi tantangan besar untuk menyelamatkan dunia dari kehancuran.
            </p>
        </div>

        <div class=" xl:mx-10 mt-10">
            <h1 class=" text-4xl">Trailer</h1>
<video class="w-full h-auto max-w-full" controls>
    <source src="/docs/videos/flowbite.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  
        </div>
        
    </div>

</x-app>
