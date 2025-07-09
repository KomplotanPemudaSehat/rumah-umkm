@extends('layouts.app')
@section('title', $product->name)
@section('content')
<div class="bg-white p-6 md:p-8 rounded-lg shadow-md border border-soft-navy/20">
    <div class="grid md:grid-cols-2 gap-8">
        <div>
            <img src="{{ optional($product->mainImage)->image_path ? asset('storage/' . $product->mainImage->image_path) : 'https://placehold.co/600x400' }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-lg mb-4">
            <div class="grid grid-cols-4 gap-2">
                @foreach($product->images as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="thumbnail" class="w-full h-24 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-muted-teal">
                @endforeach
            </div>
        </div>

        <div>
            <span class="text-sm font-semibold text-muted-teal">{{ optional($product->category)->name }}</span>
            <h1 class="text-3xl md:text-4xl font-poppins font-bold text-deep-graphite mt-2">{{ $product->name }}</h1>
            
            {{-- PERUBAHAN: Menampilkan foto dan nama toko sebagai link --}}
            @if($product->user && !empty($product->user->store_slug))
                {{-- Jika slug ada, tampilkan sebagai link --}}
                <a href="{{ route('stores.show', $product->user) }}" class="group inline-flex items-center gap-3 mt-4">
                    <img src="{{ $product->user->store_image_path ? asset('storage/' . $product->user->store_image_path) : 'https://placehold.co/50x50/F5F5F7/64748B?text=Toko' }}" alt="{{ $product->user->store_name }}" class="w-12 h-12 rounded-full object-cover border-2 border-cloud-white group-hover:border-muted-teal transition-colors">
                    <span class="text-lg font-semibold text-deep-graphite group-hover:text-muted-teal transition-colors">
                        {{ optional($product->user)->store_name }}
                    </span>
                </a>
            @elseif($product->user)
                {{-- Jika slug tidak ada, tampilkan sebagai teks biasa --}}
                <div class="inline-flex items-center gap-3 mt-4">
                     <img src="{{ $product->user->store_image_path ? asset('storage/' . $product->user->store_image_path) : 'https://placehold.co/50x50/F5F5F7/64748B?text=Toko' }}" alt="{{ $product->user->store_name }}" class="w-12 h-12 rounded-full object-cover border-2 border-cloud-white">
                    <p class="text-lg font-semibold text-deep-graphite">
                        {{ optional($product->user)->store_name }}
                    </p>
                </div>
            @endif
            
            <p class="text-4xl font-poppins font-extrabold text-muted-teal my-6">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

            <div class="prose max-w-none mt-4 text-soft-navy">
                <h3 class="font-semibold text-lg text-deep-graphite">Deskripsi Produk</h3>
                {!! nl2br(e($product->description)) !!}
            </div>
            
            @php
                $message = "Halo, saya tertarik dengan produk \"" . $product->name . "\" Anda di Rumah UMKM.";
                $whatsappUrl = "https://wa.me/" . preg_replace('/[^0-9]/', '', optional($product->user)->whatsapp_number) . "?text=" . urlencode($message);
            @endphp

            <a href="{{ $whatsappUrl }}" target="_blank" class="mt-8 w-full bg-green-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-600 transition duration-300 flex items-center justify-center text-lg">
                <svg class="h-6 w-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.269.655 4.547 1.963 6.488l-1.522 4.479 4.554-1.183z"/></svg>
                Hubungi via WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection
