<!-- start navbar -->
<div class="md:fixed md:w-full md:top-0 md:z-20 flex items-center flex-wrap bg-white p-6 border-b border-gray-300 shadow-sm">

    <!-- logo -->
    <div class="flex-none w-56 flex items-center">
        <img src="{{ asset('img/logo.png') }}" class="w-10 flex-none">
        <strong class="capitalize ml-2 flex-1 text-gray-800">Car Dealership</strong>

        <!-- sidebar toggle -->
        <button id="sliderBtn" class="flex-none text-gray-800 hidden md:block focus:outline-none hover:text-blue-900">
            <i class="fad fa-list-ul fa-lg"></i>
        </button>
    </div>
    <!-- end logo -->

    <!-- right section -->
    <div class="flex flex-row-reverse items-center ml-auto">

        <div class="relative" x-data="{ open: false }">

            @guest
                <div class="flex space-x-3">
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="bg-black text-white text-sm px-4 py-2 rounded hover:bg-gray-800 transition">
                            Sign Up
                        </a>
                    @endif

                    <a href="{{ route('login') }}"
                       class="bg-gray-800 text-white text-sm px-4 py-2 rounded hover:bg-gray-700 transition">
                        Login
                    </a>
                </div>
            @else
                <!-- user button -->
                <button @click="open = !open" class="flex items-center focus:outline-none">

                    <div class="w-8 h-8 overflow-hidden rounded-full border border-gray-300">
                        <img class="w-full h-full object-cover" src="{{ asset('img/user.svg') }}">
                    </div>

                    <span class="ml-2 text-sm font-semibold text-gray-800">
                        {{ Auth::user()->name }}
                    </span>

                    <i class="fad fa-chevron-down ml-2 text-xs text-gray-500"></i>

                </button>

                <!-- dropdown menu -->
                <div x-show="open" @click.away="open = false" x-transition
                     class="absolute right-0 mt-3 w-48 bg-white rounded shadow-lg z-50 divide-y divide-gray-200">

                    <a href="{{ route('home') }}"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        Back to public page
                    </a>

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>

                </div>
            @endguest
        </div>
    </div>
    <!-- end right section -->
</div>
<!-- end navbar -->