<nav x-data="{ open: false }" class="bg-white border-b border-gray-200/80 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <a href="/dashboard" class="flex items-center shrink-0">
                <x-ui.logo class="block w-auto h-8 text-gray-800 fill-current dark:text-gray-200" />
            </a>

            <!-- Navigation -->
            <div :class="{ 'absolute left-0' : open, 'relative' : !open }" class="flex flex-col justify-start w-full sm:relative sm:flex-row sm:justify-between">
                @php
                    $navLinks = ['Dashboard' => 'dashboard', 'Learn More' => 'learn'];
                @endphp
                <!-- Navigation Links -->
                <div :class="{'block bg-white relative z-50 w-full h-auto px-4 py-5 left-0 mt-16': open, 'hidden': ! open}" class="items-center space-y-3 sm:space-x-3 sm:space-y-0 sm:mt-0 sm:bg-transparent sm:p-0 sm:relative sm:flex sm:-my-px sm:ml-8" x-cloak>
                    @foreach($navLinks as $title => $link)
                        <a href="/{{ $link }}"
                            :class="{ 'block w-full': open, '': ! open }"
                            class="rounded-md px-4 sm:px-3 py-2.5 sm:py-2 sm:w-auto text-sm group relative @if(Request::is($link)){{ 'text-gray-800 bg-gray-100/70 font-semibold' }}@else{{ 'text-gray-600 font-medium hover:bg-gray-100/70' }}@endif">
                            <span>{{ $title }}</span>
                        </a>
                    @endforeach
                </div>

                <!-- User Dropdown -->
                <div x-data="{ dropdownOpen: false }"
                    :class="{ 'block z-50 w-full p-4 border-t border-gray-100 bg-white' : open, 'hidden': ! open }"
                    class="relative flex-shrink-0 sm:p-0 sm:flex sm:w-auto sm:bg-transparent sm:items-center sm:ml-6"
                    x-cloak
                >
                    <button @click="dropdownOpen=!dropdownOpen" class="inline-flex items-center justify-between w-full sm:px-3 sm:py-2 py-2.5 px-4 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border-transparent sm:border rounded-md hover:bg-gray-100/70 dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </div>
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen=false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 sm:scale-95" x-transition:enter-end="transform opacity-100 sm:scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 sm:scale-100" x-transition:leave-end="transform opacity-0 sm:scale-95" 
                        class="absolute top-0 right-0 z-50 w-full mt-16 sm:mt-12 sm:origin-top-right sm:w-40" x-cloak>
                        <div class="p-4 pt-0 mt-1 space-y-3 text-gray-600 bg-white sm:p-1 sm:space-y-0 sm:border sm:shadow-md sm:rounded-md border-gray-200/70">
                            <a href="/profile/edit" class="relative flex cursor-pointer hover:text-gray-700 select-none hover:bg-gray-100/70 items-center rounded py-2 px-4 sm:px-2 sm:py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Edit Profile</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button onclick="event.preventDefault(); this.closest('form').submit();" class="relative w-full flex cursor-pointer select-none hover:bg-gray-50 items-center rounded px-4 py-2 sm:px-2 sm:py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></svg>
                                    <span>Log out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Hamburger -->
                <div :class="{ 'right-4' : open, 'right-0' : !open }" class="absolute top-0 flex items-center mt-3 sm:right-0 sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
</nav>