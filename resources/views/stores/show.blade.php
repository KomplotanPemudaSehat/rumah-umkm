@extends('layouts.app')
@section('title', $user->store_name)

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md border border-soft-navy/20">
    <!-- Header Profil Toko -->
    <div class="flex flex-col sm:flex-row items-center gap-8">
        <img src="{{ $user->store_image_path ? asset('storage/' . $user->store_image_path) : 'https://placehold.co/150x150/F5F5F7/64748B?text=Toko' }}" alt="{{ $user->store_name }}" class="w-36 h-36 rounded-full object-cover border-4 border-cloud-white shadow-lg">
        <div>
            <h1 class="text-4xl font-poppins font-bold text-deep-graphite">{{ $user->store_name }}</h1>
            <p class="text-soft-navy mt-2">{{ $user->store_description }}</p>
            <div class="flex items-center mt-4 gap-4">
                <div class="flex items-center text-yellow-500">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= round($averageRating))
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        @else
                            <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        @endif
                    @endfor
                    <span class="ml-2 text-soft-navy text-sm">({{ number_format($averageRating, 1) }} dari {{ $user->reviews->count() }} ulasan)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk dari Toko Ini -->
    <div class="mt-12">
        <h2 class="text-2xl font-poppins font-bold text-deep-graphite mb-6">Produk dari {{ $user->store_name }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                @include('partials.product_card', ['product' => $product])
            @empty
                <p class="col-span-full text-center text-soft-navy py-10">Toko ini belum memiliki produk.</p>
            @endforelse
        </div>
    </div>

    <!-- Testimoni & Rating -->
    <div class="mt-12">
        <h2 class="text-2xl font-poppins font-bold text-deep-graphite mb-6">Testimoni Pelanggan</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Form Tambah Testimoni -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
                <h3 class="font-poppins font-semibold text-lg text-deep-graphite mb-4">Beri Ulasan Anda</h3>
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="space-y-4">
                        <div>
                            <label for="customer_name" class="block text-sm font-medium text-soft-navy">Nama Anda</label>
                            <input type="text" name="customer_name" id="customer_name" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal">
                        </div>
                        <div x-data="{ rating: 0, hoverRating: 0 }">
                            <label class="block text-sm font-medium text-soft-navy">Rating</label>
                            <div class="flex mt-1" @mouseleave="hoverRating = 0">
                                <template x-for="i in 5">
                                    <svg @mouseenter="hoverRating = i" @click="rating = i" class="w-6 h-6 cursor-pointer" :class="hoverRating >= i ? 'text-yellow-400' : (rating >= i ? 'text-yellow-500' : 'text-gray-300')" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                </template>
                            </div>
                            <input type="hidden" name="rating" x-model="rating" required>
                        </div>
                        <div>
                            <label for="comment" class="block text-sm font-medium text-soft-navy">Ulasan Anda</label>
                            <textarea name="comment" id="comment" rows="4" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal"></textarea>
                        </div>
                        <button type="submit" class="w-full py-2 px-4 bg-muted-teal text-white rounded-md hover:bg-opacity-80">Kirim Ulasan</button>
                    </div>
                </form>
            </div>
            <!-- Daftar Testimoni -->
            {{-- PERUBAHAN: Menambahkan div dengan tinggi tetap dan scroll --}}
            <div class="h-96 overflow-y-auto space-y-6 pr-4">
                @forelse($reviews as $review)
                    <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
                        <div class="flex items-center justify-between">
                            <h4 class="font-poppins font-semibold text-deep-graphite">{{ $review->customer_name }}</h4>
                            <div class="flex items-center text-yellow-500">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    @else
                                        <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <p class="text-soft-navy mt-2">{{ $review->comment }}</p>
                    </div>
                @empty
                    <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20 text-center text-soft-navy">
                        Belum ada testimoni untuk toko ini.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
