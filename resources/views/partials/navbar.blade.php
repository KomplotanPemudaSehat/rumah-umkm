<nav class="bg-biru-keren shadow-sm sticky top-0 z-50" x-data="{ open: false }">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                    {{-- PERUBAHAN: Menggunakan tag <img> untuk logo --}}
                    <img class="block h-14 w-auto" src="{{ asset('images/Logo-umkmin.png') }}" alt="Logo Rumah UMKM">
                </a>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-cloud-white' : 'border-transparent' }} text-sm font-medium text-cloud-white hover:border-cloud-white hover:text-cloud-white transition-colors">Beranda</a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('products.*') ? 'border-cloud-white' : 'border-transparent' }} text-sm font-medium text-cloud-white hover:border-cloud-white hover:text-cloud-white transition-colors">Produk</a>
                <a href="{{ route('articles.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('articles.*') ? 'border-cloud-white' : 'border-transparent' }} text-sm font-medium text-cloud-white hover:border-cloud-white hover:text-cloud-white transition-colors">Artikel</a>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-cloud-white hover:text-muted-teal transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-muted-teal hover:bg-opacity-80 transition-colors">Daftar</a>
                @else
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center text-sm font-medium text-soft-navy hover:text-muted-teal transition-colors">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </button>
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" style="display: none;">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-deep-graphite hover:bg-cloud-white hover:text-muted-teal">Dashboard Admin</a>
                            @else
                                <a href="{{ route('seller.dashboard') }}" class="block px-4 py-2 text-sm text-deep-graphite hover:bg-cloud-white hover:text-muted-teal">Dashboard Penjual</a>
                            @endif
                             <a href="{{ route('wishlist.index') }}" class="block px-4 py-2 text-sm text-deep-graphite hover:bg-cloud-white hover:text-muted-teal">Wishlist</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-deep-graphite hover:bg-cloud-white hover:text-muted-teal">Keluar</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
            <!-- Tombol Hamburger untuk Mobile -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-cloud-white hover:text-biru-keren hover:bg-cloud-white/50 focus:outline-none transition">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="h-6 w-6" :class="{'hidden': open, 'block': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg class="h-6 w-6" :class="{'block': open, 'hidden': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile (Responsive) -->
    <div x-show="open" class="sm:hidden" id="mobile-menu"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         style="display: none;">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('home') ? 'border-muted-teal bg-muted-teal/10 text-muted-teal' : 'border-transparent text-deep-graphite hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium">Beranda</a>
            <a href="{{ route('products.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('products.*') ? 'border-muted-teal bg-muted-teal/10 text-muted-teal' : 'border-transparent text-deep-graphite hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium">Produk</a>
            <a href="{{ route('articles.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('articles.*') ? 'border-muted-teal bg-muted-teal/10 text-muted-teal' : 'border-transparent text-deep-graphite hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium">Blog</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
             @auth
                <div class="flex items-center px-4">
                    <div>
                        <div class="text-base font-medium text-deep-graphite">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-soft-navy">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-base font-medium text-deep-graphite hover:text-muted-teal hover:bg-gray-50">Dashboard Admin</a>
                    @else
                        <a href="{{ route('seller.dashboard') }}" class="block px-4 py-2 text-base font-medium text-deep-graphite hover:text-muted-teal hover:bg-gray-50">Dashboard Penjual</a>
                    @endif
                    <a href="{{ route('wishlist.index') }}" class="block px-4 py-2 text-base font-medium text-deep-graphite hover:text-muted-teal hover:bg-gray-50">Wishlist</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-deep-graphite hover:text-muted-teal hover:bg-gray-50">Keluar</button>
                    </form>
                </div>
            @else
                <div class="space-y-1">
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-deep-graphite hover:text-muted-teal hover:bg-gray-50">Masuk</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-base font-medium text-deep-graphite hover:text-muted-teal hover:bg-gray-50">Daftar</a>
                </div>
            @endguest
        </div>
    </div>
</nav>
