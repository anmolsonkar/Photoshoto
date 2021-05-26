<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class=" antialiased bg-gray-100" data-turbolinks="false">
    <div class="fixed w-full flex bg-white ">
        <header class="flex-1 flex justify-items-center ml-2 lg:ml-8">
            <a href="{{ route('dashboard') }}">
                {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
                <img src="storage/svg/LOGO.png" class="w-14 mb-0" alt="Logo">
            </a>
            <h1 class="my-4 text-xl text-gray-800">Photoshoto</h1>
        </header>
        <div class="p-1.5 hidden md:block">

            <form>
                <div class="pt-2 relative mx-auto text-gray-600">
                    <x-jet-input
                        class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm hover:shadow"
                        type="search" name="search" placeholder="Search" />
                    <button type="submit" class="absolute right-0 top-0 mt-5 mr-4 focus:outline-none">
                        <svg class="text-gray-600 h-4 w-4 fill-current " xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                            xml:space="preserve" width="512px" height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </div>
            </form>

        </div>
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Hamburger -->
            <div class="my-3 mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 ml-12 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    @if (Route::has('login'))
                    @auth
                    <x-jet-responsive-nav-link
                        class="text-indigo-600 visited:text-indigo-400 border-indigo-400 bg-gray-100"
                        href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-responsive-nav-link>
                    @else
                    <x-jet-responsive-nav-link
                        class="text-indigo-600 visited:text-indigo-400 border-indigo-400 bg-gray-100"
                        href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-jet-responsive-nav-link>
                    @if (Route::has('register'))
                    <x-jet-responsive-nav-link
                        class="text-indigo-600 visited:text-indigo-400 border-indigo-400 bg-gray-100"
                        href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-jet-responsive-nav-link>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </nav>
        @if (Route::has('login'))
        <div class="hidden top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 no-underline">
                <x-jet-button>
                    {{ __('Dashboard') }}
                </x-jet-button>
            </a>


            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 no-underline">
                <x-jet-button>
                    {{ __('Login') }}
                </x-jet-button>
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 no-underline">
                <x-jet-button>
                    {{ __('Register') }}
                </x-jet-button>
            </a>
            @endif
            @endauth

        </div>
        @endif


    </div>
</body>

</html>