<div x-data="{
    @if (request()->routeIs('home')) isNavbarVisible: false,
        isSidebarOpen: false,
        lastScrollTop: 0,
        handleScroll() {
            const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
            if (currentScrollTop > 0) {
                this.isNavbarVisible = true;
            } else {
                this.isNavbarVisible = false;
            }
    
            this.lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
        } 
    @else
    isSidebarOpen: false, @endif
}" @scroll.window="handleScroll" class="relative">

    <!-- Navbar -->
    <header @if (request()->routeIs('home')) x-show="isNavbarVisible" x-cloak @endif
        class="fixed w-full bg-[#141652] px-3 py-4 md:px-8 transition-transform duration-500 z-20"
        x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 -translate-y-full"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in-out duration-500"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-full">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <button @click="isSidebarOpen = true" class="text-white mr-5 focus:outline-none">
                    <!-- Hamburger Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div>
                    <a href="/">
                        <x-application-logo class="w-8 h-8 mr-2 fill-current" />
                    </a>
                </div>
                <span class="text-white text-lg font-semibold">DP3A SULUT</span>
            </div>

            <div class="hidden lg:flex items-center space-x-6">
                <nav class="flex space-x-6 text-white">
                    <a href="/" class="hover:border-b border-white ">Beranda</a>
                    <a href="/berita" class="hover:border-b border-white">Berita</a>
                    <a href="/status-laporan" class="hover:border-b border-white">Cek Status Laporan</a>
                </nav>
                <div class="flex space-x-4">
                    <button
                        class="border border-white text-white px-4 py-1 rounded-full hover:bg-white hover:text-[#141652] duration-300">
                        Chat Dengan AI
                    </button>
                    <a href="/laporkan"
                        class="border border-white text-white px-4 py-1 rounded-full hover:bg-white hover:text-[#141652] duration-300">
                        Laporkan Kekerasan
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar Menu -->
    <div x-show="isSidebarOpen" x-cloak @click.away="isSidebarOpen = false"
        class="fixed top-0 left-0 h-full w-64 bg-[#DCE8FF] p-4 shadow-lg transition-transform duration-300 z-20"
        x-transition:enter="transform transition duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transform transition duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
        <div class="flex justify-between items-center mb-4">
            <input type="text" placeholder="Cari Informasi..."
                class="w-full py-1 px-4 rounded-full border-2 border-[#141652] focus:outline-none">
            <button @click="isSidebarOpen = false" class="ml-2 text-[#141652] focus:outline-none">
                <!-- Close Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="flex flex-col space-y-4 text-[#141652]">
            <a href="/" class="font-semibold hover:text-[#708CFF]">Beranda</a>
            <a href="/berita" class="font-semibold hover:text-[#708CFF]">Berita</a>
            <a href="/status-laporan" class="font-semibold hover:text-[#708CFF]">Cek Status Laporan</a>
            <a href="#" class="font-semibold hover:text-[#708CFF]">Chat Dengan AI</a>
            <a href="/laporkan" class="font-semibold hover:text-[#708CFF]">Laporkan Kekerasan</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="bg-[#141652] text-white text-center rounded-full py-1 font-semibold hover:bg-[#708CFF] duration-300">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-[#141652] text-white text-center rounded-full py-1 font-semibold hover:bg-[#708CFF] duration-300">
                        Login
                    </a>
                @endauth
            @endif
        </nav>
    </div>
</div>
