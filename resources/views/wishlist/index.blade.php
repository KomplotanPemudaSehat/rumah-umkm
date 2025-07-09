@extends('layouts.app')
@section('title', 'Wishlist Saya')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Wishlist Saya</h1>
    <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
        @if($wishlistedProducts->isNotEmpty())
            <div class="divide-y divide-cloud-white">
                @foreach($wishlistedProducts as $product)
                    <div class="py-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="{{ optional($product->mainImage)->image_path ? asset('storage/' . $product->mainImage->image_path) : 'https://placehold.co/100x100' }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded-md mr-4 border border-soft-navy/10">
                            <div>
                                <a href="{{ route('products.show', $product) }}" class="font-semibold text-lg text-deep-graphite hover:text-muted-teal">{{ $product->name }}</a>
                                <p class="text-soft-navy">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <form action="{{ route('wishlist.toggle', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-coral-red hover:underline font-medium">Hapus</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-soft-navy py-10">Wishlist Anda masih kosong.</p>
            <div class="text-center mt-4">
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-muted-teal hover:bg-opacity-80">Mulai Belanja</a>
            </div>
        @endif
    </div>
@endsection
