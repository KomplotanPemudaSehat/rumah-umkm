@extends('layouts.app')
@section('title', 'Semua Produk')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Jelajahi Produk UMKM</h1>
    
    <div class="mb-8 p-4 bg-white rounded-lg shadow border border-soft-navy/20">
        <form action="{{ route('products.index') }}" method="GET" class="grid sm:grid-cols-1 md:grid-cols-6 gap-4 items-end">
            <div class="md:col-span-2">
                <label for="search" class="block text-sm font-medium text-soft-navy">Cari Produk</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Contoh: Kopi Gayo" class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-soft-navy">Kategori</label>
                <select name="category" id="category" class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-2">
                 <div>
                    <label for="min_price" class="block text-sm font-medium text-soft-navy">Harga Min</label>
                    <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" placeholder="Rp 0" class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                </div>
                 <div>
                    <label for="max_price" class="block text-sm font-medium text-soft-navy">Harga Max</label>
                    <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="Rp 1.000.000" class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                </div>
            </div>
            
            {{-- PERUBAHAN: Menambahkan dropdown untuk urutan --}}
            <div>
                <label for="sort_by" class="block text-sm font-medium text-soft-navy">Urutkan</label>
                <select name="sort_by" id="sort_by" class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                    <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Harga: Tertinggi</option>
                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Harga: Terendah</option>
                </select>
            </div>

            <div>
                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-muted-teal hover:bg-opacity-80">Filter</button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            @include('partials.product_card', ['product' => $product])
        @empty
            <p class="col-span-full text-center text-soft-navy py-10">Produk tidak ditemukan.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
@endsection
