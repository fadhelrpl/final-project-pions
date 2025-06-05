<nav class="w-full h-auto py-4 bg-transparent md:bg-blue-800/10 backdrop-blur-none md:backdrop-blur-sm fixed top-0 flex justify-center items-center z-20">
    <a href="{{ url('/') }}" class="decoration-0">
        <img src="{{ asset('images/logo_pions.svg') }}" class="w-20 h-auto max-w-full mr-50 invisible lg:visible">
    </a>
    <div
        class="w-auto h-auto mr-20 px-10 py-1 bg-white shadow-sm shadow-black/50 rounded-full gap-5 flex justify-center items-center invisible lg:visible">
        <a href="{{ route('home') }}" class="px-6 py-2 rounded-md text-md text-black font-normal capitalize">home</a>
        <a href="{{ route('news.index') }}" class="px-6 py-2 rounded-md text-md text-black font-normal capitalize">news</a>
        <a href="{{ route('event.index') }}" class="px-6 py-2 rounded-md text-md text-black font-normal capitalize">event</a>
        <a href="{{ route('apply') }}" class="px-6 py-2 rounded-md text-md text-black font-normal capitalize">apply</a>

        {{-- DROPdown About Us (Desktop) --}}
        <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
            <a href="#"
                class="px-6 py-2 rounded-md text-md text-black font-normal capitalize cursor-default">
                About Us
            </a>

            <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="{{ route('department', 'media') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Media Division</a>
                    <a href="{{ route('department', 'education') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Education Division</a>
                    <a href="{{ route('department', 'event') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Event Division</a>
                    <a href="{{ route('department', 'ubudiyyah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Ubudiyyah Division</a>
                    <a href="{{ route('department', 'pr') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Public Relation Division</a>
                    <a href="{{ route('department', 'sports') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sports Division</a>
                    <a href="{{ route('department', 'cleanliness') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Cleanliness Division</a>
                    <a href="{{ route('votings.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Votings</a>
                </div>
            </div>
        </div>
        <a href="{{ route('feedback') }}" class="px-6 py-2 rounded-md text-md text-black font-normal capitalize">Feedback</a>
    </div>
    <div class="w-auto h-auto gap-5 flex justify-center items-center invisible lg:visible">
        @auth
            @if (auth()->user()->hasAnyRole(['super_admin', 'PIONS']))
                <a href="/admin"
                    class="px-8 py-3 border-4 border-blue-950 rounded-full bg-blue-950 hover:bg-transparent text-md shadow-sm shadow-black/50 text-white font-medium capitalize transition-all">Admin
                    Panel</a>
            @endif
        @else
            <a href="{{ route('login') }}"
                class="px-8 py-3 border-4 border-blue-950 rounded-full bg-blue-950 hover:bg-transparent text-md shadow-sm shadow-black/50 text-white font-medium capitalize transition-all">Login</a>

            <a href="{{ route('register') }}"
                class="px-8 py-3 border-4 border-blue-600 rounded-full bg-blue-600 hover:bg-transparent text-md shadow-sm shadow-black/50 text-white font-medium capitalize transition-all">Register</a>
        @endauth
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-8 py-3 border-4 border-blue-950 rounded-full bg-blue-950 hover:bg-transparent text-md shadow-sm shadow-black/50 text-white font-medium capitalize transition-all">Logout</button>
            </form>
        @endauth
    </div>
    <i onclick="responsif()"
        class="fa-solid fa-bars text-2xl py-3 px-3 rounded-lg bg-white text-blue-800 cursor-pointer absolute right-5 visible lg:invisible"></i>
</nav>

<div id="mobile"
    class="w-auto h-screen px-5 py-13 bg-blue-800/55 backdrop-blur-xs fixed right-0 top-0 flex flex-col justify-start items-center z-30 transition-all translate-x-full">
    <div class="w-full h-auto mb-10 flex justify-between items-center">
        <a href="{{ url('/') }}" class="decoration-0">
            <img src="{{ asset('images/logo_pions.svg') }}" class="w-13 h-auto max-w-full">
        </a>
        <i onclick="web()"
            class="fa-solid fa-xmark text-2xl py-3 px-3 rounded-lg bg-white text-blue-800 cursor-pointer"></i>
    </div>
    <div class="w-full h-auto mb-10 gap-3 flex flex-col justify-center items-start">
        <a href="{{ route('home') }}"
            class="text-lg text-black w-full h-auto px-3 py-2 bg-white font-medium decoration-0 rounded-md capitalize">Home</a>
        <a href="{{ route('news.index') }}"
            class="text-lg text-black w-full h-auto px-3 py-2 bg-white font-medium decoration-0 rounded-md capitalize">News</a>
        <a href="{{ route('event.index') }}"
            class="text-lg text-black w-full h-auto px-3 py-2 bg-white font-medium decoration-0 rounded-md capitalize">Event</a>

        <a href="{{ route('apply') }}"
            class="text-lg text-black w-full h-auto px-3 py-2 bg-white font-medium decoration-0 rounded-md capitalize">Apply</a>

        {{-- DROPDOWN About Us (Mobile) --}}
        <div class="text-lg text-black w-full h-auto px-3 py-2 bg-white font-medium decoration-0 rounded-md capitalize" x-data="{ open: false }" @click.outside="open = false">
            <a href="#" @click.prevent="open = !open">
                About Us
            </a>

            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute left-0 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="{{ route('department', 'media') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Media Division</a>
                    <a href="{{ route('department', 'education') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Education Division</a>
                    <a href="{{ route('department', 'event') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Event Division</a>
                    <a href="{{ route('department', 'ubudiyyah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Ubudiyyah Division</a>
                    <a href="{{ route('department', 'pr') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Public Relation Division</a>
                    <a href="{{ route('department', 'sports') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sports Division</a>
                    <a href="{{ route('department', 'cleanliness') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Cleanliness Division</a>
                    <gs href="{{ route('votings.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Votings</gs>
                </div>
            </div>
        </div>

        <a href="{{ route('feedback') }}"
            class="text-lg text-black w-full h-auto px-3 py-2 bg-white font-medium decoration-0 rounded-md capitalize">Feedback</a>
    </div>
    <div class="w-full h-auto gap-5 flex justify-start items-center">
        @auth
            @if (auth()->user()->hasAnyRole(['super_admin', 'PIONS']))
                <a href="/admin"
                    class="px-10 py-2 border-4 border-blue-950 rounded-full bg-blue-950 hover:bg-transparent text-md shadow-sm shadow-black/50 text-white font-medium capitalize transition-all">Admin
                    Panel</a>
            @endif
        @else
            <a href=" {{ route('login') }}"
                class="px-10 py-2 border-4 border-blue-950 rounded-full bg-blue-950 hover:bg-transparent text-md shadow-sm shadow-black/50 text-white font-medium capitalize transition-all">login</a>
            <a href="{{ route('register') }}"
                class="px-10 py-2 border-4 border-blue-600 rounded-full bg-blue-600 hover:bg-transparent text-md shadow-sm shadow-black/50 text-white font-medium capitalize transition-all">register</a>
        @endauth
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-10 py-2 border-4 border-blue-950 rounded-full bg-blue-950 hover:bg-transparent text-md shadow-sm shadow-black/50 text-white font-medium capitalize transition-all">Logout</button>
            </form>
        @endauth
    </div>
</div>

<script>
    const mobile = document.getElementById("mobile");

    function responsif() {
        mobile.classList.remove('translate-x-full')
    }

    function web() {
        mobile.classList.add('translate-x-full')
        // Saat menu mobile ditutup, pastikan dropdown "About Us" di dalamnya juga tertutup
        const mobileAboutUsDropdown = document.querySelector('#mobile .relative[x-data]');
        if (mobileAboutUsDropdown && mobileAboutUsDropdown.__alpine) {
            mobileAboutUsDropdown.__alpine.$data.open = false;
        }
    }
</script>
