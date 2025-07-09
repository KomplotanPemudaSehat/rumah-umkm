<nav class="bg-cloud-white shadow-sm sticky top-0 z-50" x-data="{ open: false }">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 -ml-4">
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Perusahaan Anda" style="width: 150px; height: auto;">
                </a>
            </div>
            <div class="hidden sm:flex sm:space-x-8 sm:flex-grow sm:justify-center transform -translate-x-3">
                <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-muted-teal' : 'border-transparent' }} text-sm font-medium text-deep-graphite hover:border-muted-teal hover:text-muted-teal transition-colors">Beranda</a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('products.*') ? 'border-muted-teal' : 'border-transparent' }} text-sm font-medium text-deep-graphite hover:border-muted-teal hover:text-muted-teal transition-colors">Produk</a>
                <a href="{{ route('articles.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('articles.*') ? 'border-muted-teal' : 'border-transparent' }} text-sm font-medium text-deep-graphite hover:border-muted-teal hover:text-muted-teal transition-colors">Blog</a>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-soft-navy hover:text-muted-teal transition-colors">Masuk</a>
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
            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                    <svg class="h-6 w-6" :class="{'hidden': open, 'block': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg class="h-6 w-6" :class="{'block': open, 'hidden': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>
</nav>
