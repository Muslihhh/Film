<nav class="bg-white shadow-md dark:bg-gray-900">
    <div class="max-w-screen flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class=" flex items-center overflow-hidden h-[40px] ">
            <img src="{{ asset('logo.png') }}" class="h-[70px]" alt="Flowbite Logo" />

        </a>
        <div class="flex-grow max-w-xl mx-4 flex justify-center">
            @include('user.filter.search')
        </div>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                <li
                    class=" content-center block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                    <a href="{{ route('dashboard.subscriber') }}">Home</a>
                </li>
                <li
                    class=" content-center block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                    <a href="{{ route('genres.list') }}">Genre</a>
                </li>



                <li class=" content-center py-2 px-3">
                    <button type="button" id="dropdownNegaraButton" data-dropdown-toggle="dropdownNegara"
                        data-dropdown-trigger="hover"
                        class="cursor-pointer content-center block  text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Negara</button>

                </li>

                <li class=" content-center py-2 px-3">
                    <button type="button" id="dropdowntahunButton" data-dropdown-toggle="dropdownTahun"
                        data-dropdown-trigger="hover"
                        class="cursor-pointer content-center block  text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Tahun
                    </button>
                </li>

                
                <li>
                    @if (Auth::check())
                        <div class="relative">
                            <button type="button" id="profileDropdownButton" data-dropdown-toggle="profileDropdown"
                                class="flex items-center focus:outline-none">
                                <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}"
                                    class="w-10 h-10 rounded-full">
                            </button>

                            <!-- 🔹 Dropdown Profil -->
                            <div id="profileDropdown"
                                class="hidden absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-lg shadow-lg z-50 border">
                                <div class="p-4 text-center">
                                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}"
                                        class="w-16 h-16 rounded-full mx-auto mb-2">
                                    <p class="font-semibold dark:text-white">{{ Auth::user()->name }}</p>
                                    <p class="text-sm dark:text-white">{{ Auth::user()->role }}</p>
                                </div>

                                <div class="border-t"></div>

                                <!-- 🔹 Menu -->
                                <ul class=" pb-2">
                                    <li>

                                        <button data-modal-target="editProfileModal"
                                            data-modal-toggle="editProfileModal"
                                            class="block w-full text-start px-4 py-2 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Edit Profil
                                        </button>

                                    </li>
                                    <li>
                                        <a href="{{ route('dashboard.subscriber') }}"
                                            class="block px-4 py-2 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('watchlist.index') }}"
                                            class="block px-4 py-2 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Watchlist
                                        </a>
                                    </li>
                                    <li>
                                        <div class=" flex items-center justify-between py-2 px-4">
                                            <label for="theme-toggle"
                                                class="text-sm font-medium dark:text-white">Tema</label>
                                            <button id="theme-toggle" type="button"
                                                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm p-2.5">
                                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                                    </path>
                                                </svg>
                                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                                        fill-rule="evenodd" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                            <script>
                                                var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                                                var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                                                // Change the icons inside the button based on previous settings
                                                if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                                                        '(prefers-color-scheme: dark)').matches)) {
                                                    themeToggleLightIcon.classList.remove('hidden');
                                                } else {
                                                    themeToggleDarkIcon.classList.remove('hidden');
                                                }

                                                var themeToggleBtn = document.getElementById('theme-toggle');

                                                themeToggleBtn.addEventListener('click', function() {

                                                    // toggle icons inside button
                                                    themeToggleDarkIcon.classList.toggle('hidden');
                                                    themeToggleLightIcon.classList.toggle('hidden');

                                                    // if set via local storage previously
                                                    if (localStorage.getItem('color-theme')) {
                                                        if (localStorage.getItem('color-theme') === 'light') {
                                                            document.documentElement.classList.add('dark');
                                                            localStorage.setItem('color-theme', 'dark');
                                                        } else {
                                                            document.documentElement.classList.remove('dark');
                                                            localStorage.setItem('color-theme', 'light');
                                                        }

                                                        // if NOT set via local storage previously
                                                    } else {
                                                        if (document.documentElement.classList.contains('dark')) {
                                                            document.documentElement.classList.remove('dark');
                                                            localStorage.setItem('color-theme', 'light');
                                                        } else {
                                                            document.documentElement.classList.add('dark');
                                                            localStorage.setItem('color-theme', 'dark');
                                                        }
                                                    }

                                                });
                                            </script>
                                        </div>
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" onclick="console.log('Logout diklik')"
                                                class="w-full text-left px-4 py-2 text-red-500 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="editProfileModal" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                            <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6">
                                <!-- Header Modal -->
                                <div class="flex justify-between items-center border-b pb-3">
                                    <h3 class="text-xl font-bold">Edit Profil</h3>
                                    <button type="button" data-modal-hide="editProfileModal"
                                        class="text-gray-500 hover:text-gray-700">
                                        ✕
                                    </button>
                                </div>

                                <!-- 🔹 Form Edit Profil -->
                                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                                    @csrf
                                    <label class="block text-sm font-medium dark:text-white">Nama:</label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                                        class="w-full p-2 text-black border rounded mb-3">

                                    <label class="block text-sm font-medium dark:text-white">Email:</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                                        class="w-full p-2 text-black border rounded mb-3">

                                    <label class="block text-sm font-medium dark:text-white">Foto Profil:</label>
                                    <input type="file" name="foto_profil"
                                        class="w-full p-2 text-black border rounded mb-3">

                                    <button type="submit"
                                        class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                        Simpan Perubahan
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="px-2 py-2 bg-blue-600 text-white rounded">Login</a>
                        <a href="{{ route('register') }}"
                            class=" px-2 py-2 bg-transparant border border-blue-600 text-white rounded">Register</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    @include('user.filter.filternegara')
    @include('user.filter.filtertahun')
</nav>
