<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- ===== LEFT: Logo + Nav Links ===== --}}
            <div class="flex items-center gap-8">

                {{-- Logo / Brand --}}
                <a href="{{ route('posts.index') }}"
                   class="shrink-0 flex items-center gap-2 text-white-900 dark:text-white font-semibold text-base tracking-tight hover:opacity-80 transition">
                    {{-- Replace with your <x-application-logo> if available --}}
                    <svg class="h-7 w-7 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                    <span>MyBlog</span>
                </a>

                {{-- Desktop Navigation Links --}}
                <div class="hidden sm:flex items-center gap-1">
                    @auth
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.*')">
                        Posts
                    </x-nav-link>
                    @endauth
                    @auth
                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                            Categories
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            {{-- ===== RIGHT: Auth Actions ===== --}}
            <div class="hidden sm:flex items-center gap-3">

                @guest
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">
                        Log in
                    </a>

                    <a href="{{ route('register') }}"
                       class="text-sm font-medium bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1.5 rounded-lg shadow-sm transition">
                        Sign up
                    </a>
                @endguest

                @auth
                    {{-- Create Post CTA --}}
                    <a href="{{ route('posts.create') }}"
                       class="hidden md:inline-flex items-center gap-1.5 text-sm font-medium bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 hover:bg-indigo-100 dark:hover:bg-indigo-900/60 px-3 py-1.5 rounded-lg transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        New Post
                    </a>

                    {{-- User Dropdown --}}
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1">
                                {{-- Avatar initials --}}
                                <span class="inline-flex items-center justify-center h-7 w-7 rounded-full bg-indigo-600 text-white text-xs font-semibold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 border-b border-gray-100 dark:border-gray-700">
                                <p class="text-xs text-gray-400 dark:text-gray-500 uppercase tracking-wider font-medium">Signed in as</p>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 truncate mt-0.5">{{ Auth::user()->email }}</p>
                            </div>

                            <x-dropdown-link :href="route('profile.edit')">
                                <svg class="inline h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                Profile
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('posts.create')">
                                <svg class="inline h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                </svg>
                                New Post
                            </x-dropdown-link>

                            <div class="border-t border-gray-100 dark:border-gray-700 mt-1 pt-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        class="text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg class="inline h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                        Log Out
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @endauth

            </div>

            {{-- ===== MOBILE: Hamburger ===== --}}
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                        class="p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800 transition"
                        aria-label="Toggle menu">
                    <svg x-show="!open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="open" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- ===== MOBILE MENU ===== --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="sm:hidden border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">

        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('posts.index') }}"
               @class(['block px-3 py-2 rounded-lg text-sm font-medium transition',
                        'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-300' => request()->routeIs('posts.*'),
                        'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' => !request()->routeIs('posts.*')])>
                Posts
            </a>

            @auth
                <a href="{{ route('categories.index') }}"
                   @class(['block px-3 py-2 rounded-lg text-sm font-medium transition',
                            'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-300' => request()->routeIs('categories.*'),
                            'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' => !request()->routeIs('categories.*')])>
                    Categories
                </a>

                <a href="{{ route('posts.create') }}"
                   class="block px-3 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                    + New Post
                </a>
            @endauth
        </div>

        {{-- Mobile Auth Footer --}}
        <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-4">
            @auth
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-indigo-600 text-white text-sm font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('profile.edit') }}"
                       class="flex-1 text-center text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 px-3 py-1.5 rounded-lg transition">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="flex-1">
                        @csrf
                        <button type="submit"
                                class="w-full text-sm font-medium text-red-600 dark:text-red-400 border border-red-200 dark:border-red-900 hover:bg-red-50 dark:hover:bg-red-900/20 px-3 py-1.5 rounded-lg transition">
                            Log Out
                        </button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="flex gap-2">
                    <a href="{{ route('login') }}"
                       class="flex-1 text-center text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 px-3 py-1.5 rounded-lg transition">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                       class="flex-1 text-center text-sm font-medium bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1.5 rounded-lg transition">
                        Sign up
                    </a>
                </div>
            @endguest
        </div>

    </div>
</nav>