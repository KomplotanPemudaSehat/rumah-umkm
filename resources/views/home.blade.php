@extends('layouts.app')
@section('title', 'Selamat Datang di Rumah UMKM')
@section('content')
    <div class="text-center py-12 bg-white rounded-lg shadow-md mb-12 border border-soft-navy/10">
        <h1 class="text-4xl font-poppins font-bold text-deep-graphite">Rumah UMKM</h1>
        <p class="text-xl text-soft-navy mt-2">Etalase Digital untuk Produk Lokal Terbaik Indonesia</p>
        <div class="mt-8">
            <a href="{{ route('products.index') }}" class="inline-block py-3 px-8 bg-muted-teal text-white font-semibold rounded-lg shadow-md hover:bg-opacity-80 transition-all">Jelajahi Produk</a>
            @guest
            <a href="{{ route('register') }}" class="ml-4 inline-block py-3 px-8 bg-blush-rose text-deep-graphite font-semibold rounded-lg shadow-md hover:bg-opacity-80 transition-all">Daftar Sekarang</a>
            @endguest
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($popularSellers as $seller)
                @include('partials.store_card', ['seller' => $seller])
            @empty
                <p class="col-span-full text-center text-soft-navy py-10">Belum ada UMKM untuk ditampilkan.</p>
            @endforelse
        </div>
        {{-- PERUBAHAN: Menghapus link paginasi karena tidak digunakan --}}
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
