@extends('layouts.app')
@section('title', 'Selamat Datang di UMKMin')
@section('content')
    {{-- PERUBAHAN: Menambahkan background image dan overlay pada hero section --}}
    <div class="relative text-center py-20 lg:py-24 rounded-lg shadow-xl mb-12 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/home-hero-bg.jpg') }}" alt="Latar Belakang UMKM" class="w-full h-full object-cover">
            <!-- Overlay Gelap -->
            <div class="absolute inset-0 bg-gelap/60"></div>
        </div>
        
        <div class="relative z-10 px-4">
            <h1 class="text-4xl lg:text-5xl font-poppins font-bold text-white">UMKMin</h1>
            <p class="text-xl text-cloud-white/90 mt-2">Etalase Digital untuk Produk Lokal Terbaik Indonesia</p>
            <div class="mt-8 flex flex-col space-y-4 px-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 sm:px-0">
                <a href="{{ route('products.index') }}" class="inline-block py-3 px-8 bg-muted-teal text-white font-semibold rounded-lg shadow-md hover:bg-opacity-80 transition-all text-center">Jelajahi Produk</a>
                @guest
                <a href="{{ route('register') }}" class="inline-block py-3 px-8 bg-blush-rose text-white font-semibold rounded-lg shadow-md hover:bg-opacity-80 transition-all text-center">Daftar Sekarang</a>
                @endguest
            </div>
        </div>
    </div>

    <h2 class="text-2xl font-poppins font-bold text-deep-graphite mb-6">Produk Terbaru</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($featuredProducts as $product)
            @include('partials.product_card', ['product' => $product])
        @empty
            <p class="col-span-full text-center text-soft-navy py-10">Belum ada produk untuk ditampilkan.</p>
        @endforelse
    </div>

    <div class="mt-16">
        <h2 class="text-2xl font-poppins font-bold text-deep-graphite mb-6">Daftar UMKM</h2>
        <div x-data="{
                container: null,
                init() {
                    this.container = this.$refs.container;
                },
                scroll(direction) {
                    const scrollAmount = this.container.clientWidth * 0.9;
                    this.container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
                }
            }" class="relative">
            
            <!-- Tombol Navigasi Kiri -->
            <button @click="scroll(-1)" class="absolute -left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white backdrop-blur-sm rounded-full p-2 shadow-lg z-10 transition hidden sm:block">
                 <svg class="w-6 h-6 text-deep-graphite" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <!-- Container Carousel -->
            <div x-ref="container" class="flex overflow-x-auto space-x-6 pb-4 scroll-smooth snap-x snap-mandatory" style="scrollbar-width: none; -ms-overflow-style: none;">
                @forelse($popularSellers as $seller)
                    <div class="snap-start flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
                        @include('partials.store_card', ['seller' => $seller])
                    </div>
                @empty
                    <p class="w-full text-center text-soft-navy py-10">Belum ada UMKM untuk ditampilkan.</p>
                @endforelse
            </div>
             <style>
                /* Sembunyikan scrollbar untuk Chrome, Safari, dan Opera */
                [x-ref="container"]::-webkit-scrollbar {
                    display: none;
                }
            </style>

            <!-- Tombol Navigasi Kanan -->
            <button @click="scroll(1)" class="absolute -right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white backdrop-blur-sm rounded-full p-2 shadow-lg z-10 transition hidden sm:block">
                <svg class="w-6 h-6 text-deep-graphite" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
    </div>

    <h2 class="text-2xl font-poppins font-bold text-deep-graphite mt-12 mb-6">Artikel & Edukasi</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($latestArticles as $article)
            @include('partials.article_card', ['article' => $article])
        @empty
             <p class="col-span-full text-center text-soft-navy py-10">Belum ada artikel untuk ditampilkan.</p>
        @endforelse
    </div>
@endsection
