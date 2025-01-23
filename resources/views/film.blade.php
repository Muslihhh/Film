<x-app>
    <div class="mt-40"></div>
    <div class=" w-full bg-gray-200 dark:bg-gray-900 p-5 rounded-xl">
        <!-- Kotak Hitam dengan Gambar -->
        <div class=" flex xl:flex-row flex-col items-start  ">
            <!-- Gambar -->
            <div class=" xl:w-1/4 w-full mx-auto h-auto bg-black shadow-xl overflow-hidden rounded-xl">
                <img src="Godzilla.jpg" class="w-full h-full  object-cover" alt="Gambar Film">
            </div>

            <!-- Judul dan Deskripsi -->
            <div class=" xl:w-3/4 w-auto flex flex-col xl:ml-10 mt-4 xl:mt-0">
                <!-- Judul -->
                <h1 class="  text-4xl font-bold text-gray-800 dark:text-white">Judul Film</h1>
                <h2 class=" text-lg font-semibold text-gray-500">2015 . 2 Jam 30 Menit</h2>
                <div class=" flex flex-wrap gap-3 mt-2">
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
                <div class=" mt-10">
                    <h1 class="text-2xl font-bold">Sinopsis</h1>
                    <p class="max-h-64 overflow-y-auto pr-4 no-scrollbar">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum neque placeat fugit error esse nam illo, voluptatibus ad temporibus quo veniam, pariatur quis? Quod voluptas nam sequi? Fugit, veritatis voluptatibus.
                        Commodi reiciendis nesciunt explicabo tempora at consequuntur dolore natus, quibusdam repellat rem ratione ea recusandae possimus voluptatibus dolores quis illum molestiae soluta? Fugit dicta commodi voluptas, optio expedita tempore corrupti.
                        Omnis maxime deserunt, soluta doloribus dolorum, quia dignissimos repellendus vitae nemo excepturi voluptatem vel in temporibus consectetur, error voluptate voluptatum blanditiis odio debitis nostrum distinctio id ipsa possimus! Modi, tempora!
                        Autem reprehenderit ex recusandae iste molestiae laudantium ullam odio explicabo reiciendis qui! Corrupti sit nulla harum deleniti nihil magni corporis, molestiae laboriosam eveniet consequuntur ipsum culpa expedita neque fuga illum.
                        Provident repellendus corporis vel, cupiditate dolorem maxime illo suscipit cumque aliquid iusto molestias officia laboriosam, dicta animi quisquam asperiores. Commodi error deserunt omnis dolore mollitia odio explicabo assumenda beatae eius!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, illum maxime. Optio sequi dicta officia voluptas, aut iure porro et quisquam voluptates quos vel soluta illum corporis rem sunt accusantium.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus expedita voluptatem doloremque magni nostrum quae sapiente atque blanditiis, nihil voluptate facilis in, voluptates totam nobis a animi accusantium, maxime reprehenderit!
                        Quas at modi cupiditate perspiciatis corporis, iure veritatis veniam impedit provident, ullam laborum. Exercitationem quasi iure dolorem maxime sed. Temporibus sint similique quae porro nisi eligendi maiores soluta placeat repellendus.
                        Numquam ipsam, asperiores necessitatibus ducimus omnis aliquam quo blanditiis odio aliquid? Molestias mollitia, corrupti distinctio nihil non rerum asperiores qui delectus dolore ipsa ducimus voluptate? Doloribus ullam velit tenetur obcaecati?
                    </p>
                </div>
            </div>
        </div>

        <!-- Sinopsis -->
        

        <div class=" xl:mx-10 mt-20 ">
            <h1 class=" text-4xl">Trailer</h1>
            <div class="w-full h-auto p-2 max-w-4xl mx-auto rounded-md bg-blue-900 mt-5 ">
                <video class=" rounded-md " controls>
                    <source src="Trailer.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class=" mt-10">
                    <h1 class=" text-3xl">Komentar</h1>
                    <div class="flex flex-col">
                        <div class=" bg-white dark:bg-slate-800 p-5 rounded-md">
                            <p>Nama</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci rerum placeat molestias doloribus deserunt. Quisquam, molestiae vero voluptate nihil, molestias dolorem delectus recusandae asperiores, ipsum dignissimos laboriosam? Quis, rem possimus.</p>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
    <div class=" mt-5">
        <h1 class=" text-3xl">Film Lainnya</h1>
    </div>
    <div class=" flex overflow-x-auto gap-5 no-scrollbar">
        <a href="" class=" scroll-mx-5">
            <div class=" relative w-[200px] h-auto group overflow-hidden rounded-2xl">
                <img src="starwars.jpg" alt="" class=" w-full h-[250px] object-cover rounded-2xl group-hover:">
                <div class=" absolute flex bg-black/50 text-white top-0 left-0 px-2">
                    <svg class="w-5 h-5 text-yellow-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                    </svg>
                    <p class=" ">5</p> 
                </div>
            </div>
        </a>  
        <a href="" class=" scroll-mx-5">
            <div class=" relative w-[200px] h-auto group overflow-hidden rounded-2xl">
                <img src="starwars.jpg" alt="" class=" w-full h-[250px] object-cover rounded-2xl group-hover:">
                <div class=" absolute flex bg-black/50 text-white top-0 left-0 px-2">
                    <svg class="w-5 h-5 text-yellow-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                    </svg>
                    <p class=" ">5</p> 
                </div>
            </div>
        </a>  
    </div>

</x-app>
