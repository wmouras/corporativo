<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center flex-md-shrink-1">
<<<<<<< HEAD
                    <svg height="30" width="200" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <a href="{{ route('pessoa') }}">
                            <text x="0" y="27" fill="green" font-size="20pt">CREA-DF</text>
                        </a>
                    </svg>
=======
                    <a href="{{ url('', []) }}" >
                    <svg width="406.75002441406247px" height="114.81754150390624px" xmlns="http://www.w3.org/2000/svg"
                        viewBox="96.62498779296877 17.59122924804688 406.75002441406247 114.81754150390624"
                        style="background: none;"
                        preserveAspectRatio="xMidYMid">
                            <defs>
                                <linearGradient id="editing-glowing-gradient" x1="0.8146601955249185" x2="0.18533980447508147" y1="0.8885729807284856" y2="0.11142701927151444">
                                    <stop offset="0" stop-color="#74c005"></stop>
                                    <stop offset="1" stop-color="#74c005"></stop>
                                </linearGradient>
                                <filter id="editing-glowing" x="-100%" y="-100%" width="300%" height="300%">
                                    <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="1"></feGaussianBlur>
                                    <feMerge>
                                        <feMergeNode in="blur"></feMergeNode>
                                        <feMergeNode in="SourceGraphic"></feMergeNode>
                                    </feMerge>
                                </filter>
                            </defs>
                            <g filter="url(#editing-glowing)">
                                <g transform="translate(107.76000428199768, 97.71999931335449)">
                                    <path d="M24.38 0.77L24.38 0.77Q13.76 0.77 8.38-4.90L8.38-4.90L8.38-4.90Q3.01-10.56 3.01-21.95L3.01-21.95L3.01-21.95Q3.01-33.34 8.38-39.01L8.38-39.01L8.38-39.01Q13.76-44.67 24.38-44.67L24.38-44.67L24.38-44.67Q32.96-44.67 38.11-40.42L38.11-40.42L38.11-40.42Q43.26-36.16 43.26-28.03L43.26-28.03L37.06-28.03L37.06-28.03Q37.06-33.66 33.70-36.58L33.70-36.58L33.70-36.58Q30.34-39.49 24.38-39.49L24.38-39.49L24.38-39.49Q16.64-39.49 12.99-35.39L12.99-35.39L12.99-35.39Q9.34-31.30 9.28-22.08L9.28-22.08L9.28-21.95L9.28-21.95Q9.28-12.67 12.93-8.54L12.93-8.54L12.93-8.54Q16.58-4.42 24.38-4.42L24.38-4.42L24.38-4.42Q30.46-4.42 33.89-7.30L33.89-7.30L33.89-7.30Q37.31-10.18 37.31-15.74L37.31-15.74L43.26-15.74L43.26-15.74Q43.26-7.55 38.14-3.39L38.14-3.39L38.14-3.39Q33.02 0.77 24.38 0.77L24.38 0.77ZM51.26 0L51.26-43.90L74.11-43.90L74.11-43.90Q80.70-43.90 84.22-40.51L84.22-40.51L84.22-40.51Q87.74-37.12 87.74-31.42L87.74-31.42L87.74-31.42Q87.74-26.94 85.60-23.68L85.60-23.68L85.60-23.68Q83.46-20.42 79.68-19.01L79.68-19.01L89.79 0L83.01 0L73.47-18.11L57.34-18.11L57.34 0L51.26 0ZM57.34-23.42L73.79-23.42L73.79-23.42Q77.38-23.42 79.49-25.54L79.49-25.54L79.49-25.54Q81.60-27.65 81.60-31.36L81.60-31.36L81.60-31.36Q81.60-34.82 79.62-36.70L79.62-36.70L79.62-36.70Q77.63-38.59 73.79-38.59L73.79-38.59L57.34-38.59L57.34-23.42ZM97.47 0L97.47-43.90L131.26-43.90L131.26-38.59L103.55-38.59L103.55-25.09L128.45-25.09L128.45-19.78L103.55-19.78L103.55-5.31L131.65-5.31L131.65 0L97.47 0ZM135.55 0L152.58-43.90L160.32-43.90L177.34 0L170.88 0L166.46-11.71L146.11-11.71L141.82 0L135.55 0ZM148.10-17.02L164.48-17.02L159.36-30.72L156.42-38.66L156.10-38.66L153.22-30.85L148.10-17.02ZM179.84-14.14L179.84-20.42L197.12-20.42L197.12-14.14L179.84-14.14ZM204.16 0L204.16-43.90L220.42-43.90L220.42-43.90Q230.98-43.90 236.67-38.50L236.67-38.50L236.67-38.50Q242.37-33.09 242.37-21.95L242.37-21.95L242.37-21.95Q242.37-10.82 236.67-5.41L236.67-5.41L236.67-5.41Q230.98 0 220.42 0L220.42 0L204.16 0ZM210.24-5.31L220.42-5.31L220.42-5.31Q228.03-5.31 232.03-9.15L232.03-9.15L232.03-9.15Q236.03-12.99 236.10-21.82L236.10-21.82L236.10-21.95L236.10-21.95Q236.10-30.85 232.10-34.72L232.10-34.72L232.10-34.72Q228.10-38.59 220.42-38.59L220.42-38.59L210.24-38.59L210.24-5.31ZM250.37 0L250.37-43.90L281.47-43.90L281.47-38.59L256.45-38.59L256.45-24.64L279.17-24.64L279.17-19.33L256.45-19.33L256.45 0L250.37 0Z" fill="url(#editing-glowing-gradient)"></path>
                                </g>
                            </g>
                        <style>
                            text {
                                font-size: 64px;
                                font-family: Arial Black;
                                dominant-baseline: central;
                                text-anchor: middle;
                            }
                        </style>
                    </svg>
                    </a>
>>>>>>> 5e3072d3401e9ee5cd9623c57fed38479e49348c
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('pessoa') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <button class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Perfil de usuário') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('pessoa') }}">
                            Registro profissional
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach

                            <div class="border-t border-gray-100"></div>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    Perfil
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
