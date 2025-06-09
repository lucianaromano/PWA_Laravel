<nav x-data="{ open: false }" class="ixed top-0 left-0 w-full z-50 bg-[#732255] shadow text-[#E7F2E4]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center font-bold text-lg gap-2">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8">
                        {{ config('app.name', '🏠') }}
                    </a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth()
                        <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" class="transition hover:text-[#d493bc]">
                            {{ __('Posts de la comunidad') }}
                        </x-nav-link>
                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" class="transition hover:text-[#d493bc]">
                            {{ __('Gestionar Categorías') }}
                        </x-nav-link>
                        <x-nav-link :href="route('posts.myPosts')" :active="request()->routeIs('posts.index')" class="transition hover:text-[#d493bc]">
                            {{ __('Mis Posteos') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded transition hover:text-[#d493bc] text-[#732255] text-[#E7F2E4] bg-transparent">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="transition text-pink-900 hover:text-[#d493bc]">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="transition hover:text-[#d493bc]"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded transition hover:text-[#d493bc] text-[#732255] text-[#E7F2E4]">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded transition hover:text-[#d493bc] text-[#732255] text-[#E7F2E4]">Registrarse</a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#732255] text-[#E7F2E4] hover:text-[#d493bc] hover:bg-[#E7F2E4] hover:bg-[#3e5d82] focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth()
                <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" class="transition hover:text-[#d493bc]">
                    {{ __('Posts de la comunidad') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" class="transition hover:text-[#d493bc]">
                    {{ __('Gestionar Categorías') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('posts.myPosts')" :active="request()->routeIs('posts.myPosts')" class="transition hover:text-[#d493bc]">
                    {{ __('Mis Posteos') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                    <div class="font-medium text-base text-[#E7F2E4]">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm  text-[#E7F2E4]">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="transition hover:text-[#d493bc]">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="transition hover:text-[#d493bc]"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar sesion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
