<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed-top">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home_page') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home_page')" :active="request()->routeIs('home_page')">
                        {{ __('Home') }}
                    </x-nav-link>
                    
                </div>
                
            </div>


            <!-- Settings Dropdown -->
            {{-- hidden sm:flex sm:items-center sm:ms-6 --}}
            {{-- hidden md:flex md:items-center md:space-x-2 --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6 ">

                @guest


                    <div class=" md:flex-row space-x-3 items-center justify-center">
                        <div class="space-x-3 text-[1.6rem] mr-5 leading-5">

                            <a href="/login" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wedest mr-2">
                                {{ __('Login') }}
                            </a>
                            <a href="/register" class="inline-flex items-center px-4 py-2 font-semibold text-xs uppercase tracking-widest border border-transparent rounded-md">
                                {{ __('Register') }}
                            </a>
                        </div>
                    </div>
                @endguest
                @auth

                    <a href="{{ route('home_page') }}">
                        {!! url()->current() == route('home_page')
                            ? '<i class="fas fa-home nav-icon-active"></i>'
                            : '<i class="fas fa-home nav-icon"></i>' !!}
                    </a>

                    <a href="{{ route('explore') }}">
                        {!! url()->current() == route('explore')
                            ? '<i class="far fa-compass nav-icon-active"></i>'
                            : '<i class="far fa-compass nav-icon"></i>' !!}
                    </a>

                    <a href="{{ route('create_post') }}">
                        {!! url()->current() == route('create_post')
                            ? '<i class="far fa-plus-square nav-icon-active"></i>'
                            : '<i class="far fa-plus-square nav-icon"></i>' !!}
                    </a>

                    {{-- <a href="#" class="nav-icon"><i class="far fa-paper-plane"></i></a>
                <a href="#" class="nav-icon"><i class="far fa-heart"></i></a>
                 --}}





                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2  text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                <div>

                                    <img src="{{ Str::startsWith(Auth::user()->image, 'https') ? Auth::user()->image : asset('storage/' . Auth::user()->image) }}"
                                        alt="" class="h-7 w-7 rounded-full">
                                </div>

                                <div class="ms-1">
                                    {{ Auth::user()->name }}
                                </div>
                            </button>

                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link :href="route('user_profile', Auth::user()->username)">
                                <i class="fas fa-user me-2"></i>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                <i class="fas fa-bookmark me-2"></i>
                                {{ __('Saved') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                <i class="fas fa-cog me-2"></i>
                                {{ __('Sitting') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>

                        </x-slot>

                    </x-dropdown>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home_page')" :active="request()->routeIs('home_page')">
                {{ __('Home') }}
                
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth


                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('user_profile',Auth::user()->username)">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                     <x-responsive-nav-link :href="route('explore')">
                        {{ __('explore') }}
                    </x-responsive-nav-link>
                     <x-responsive-nav-link :href="route('create_post')">
                        {{ __('New Post') }}
                    </x-responsive-nav-link>
                     <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Setting') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
