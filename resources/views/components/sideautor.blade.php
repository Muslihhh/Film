<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('dashboard.author') }}" class=" flex items-center overflow-hidden h-[40px] ">
                    <img src="{{ asset('logo.png') }}" class="h-[70px]" alt="Flowbite Logo" />
                </a>
            </div>
            @if (Auth::check())
                <div class="relative">
                    <button id="profileDropdownButton" data-dropdown-toggle="profileDropdown"
                        class="flex items-center focus:outline-none">
                        <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" class="w-10 h-10 rounded-full">
                    </button>

                    <!-- Dropdown Profil -->
                    <div id="profileDropdown"
                        class="hidden absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-lg shadow-lg z-50 border">
                        <div class="p-4 text-center">
                            <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}"
                                class="w-16 h-16 rounded-full mx-auto mb-2">
                            <p class="font-semibold dark:text-white">{{ Auth::user()->name }}</p>
                            <p class="text-sm dark:text-white">{{ Auth::user()->email }}</p>
                        </div>

                        <div class="border-t"></div>

                        <!-- Menu -->
                        <ul class=" pb-2">
                            <li>

                                <button data-modal-target="editProfileModal" data-modal-toggle="editProfileModal"
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
                                <div class=" flex items-center justify-between py-2 px-4">
                                    <label for="theme-toggle" class="text-sm font-medium dark:text-white">Tema</label>
                                    <button id="theme-toggle" type="button"
                                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm p-2.5">
                                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                        </svg>
                                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
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
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
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

                        <!--  Form Edit Profil -->
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                            @csrf
                            <label class="block text-sm font-medium dark:text-white">Nama:</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                class="w-full p-2 text-black border rounded mb-3">

                            <label class="block text-sm font-medium dark:text-white">Email:</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                class="w-full p-2 text-black border rounded mb-3">

                            <label class="block text-sm font-medium dark:text-white">Foto Profil:</label>
                            <input type="file" name="foto_profil" value="{{ Auth::user()->foto_profil }}" class="w-full p-2 text-black border rounded mb-3">

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
        </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard.author') }}"
                    class="{{ Route::is('dashboard.author') ? 'bg-gray-100 dark:bg-gray-700 text-black dark:text-white' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('film.index') }}"
                    class="{{ Route::is('film.index') ? 'bg-gray-100 dark:bg-gray-700 text-black dark:text-white' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M14 7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7Zm2 9.387 4.684 1.562A1 1 0 0 0 22 17V7a1 1 0 0 0-1.316-.949L16 7.613v8.774Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Film</span>
                </a>
            </li>

        </ul>
       
    </div>
</aside>
