@php
    // Logika untuk menentukan warna berdasarkan nama kategori
    $categoryName = optional($product->category)->name;
    $categoryColorClass = 'text-soft-navy'; // Warna default
    if (str_contains($categoryName, 'Makanan')) {
        $categoryColorClass = 'text-coral-red';
    } elseif (str_contains($categoryName, 'Kerajinan')) {
        $categoryColorClass = 'text-stone-green';
    } elseif (str_contains($categoryName, 'Fashion')) {
        $categoryColorClass = 'text-soft-lilac';
    } elseif (str_contains($categoryName, 'Jasa')) {
        $categoryColorClass = 'text-aqua-glow';
    }
@endphp

<div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300 group border border-soft-navy/10">
    <a href="{{ route('products.show', $product) }}" class="block">
        <img src="{{ optional($product->mainImage)->image_path ? asset('storage/' . $product->mainImage->image_path) : 'https://placehold.co/600x400/e2e8f0/adb5bd?text=Produk' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
    </a>
    <div class="p-4">
        <span class="text-sm font-semibold {{ $categoryColorClass }}">{{ $categoryName }}</span>
        <h3 class="text-lg font-poppins font-semibold text-deep-graphite truncate mt-1">
            <a href="{{ route('products.show', $product) }}" class="hover:text-muted-teal">{{ $product->name }}</a>
        </h3>
        <p class="text-sm text-soft-navy mt-1">oleh {{ optional($product->user)->store_name }}</p>
        <div class="mt-4 flex justify-between items-center">
            <p class="text-xl font-bold text-muted-teal">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            @auth
            <form action="{{ route('wishlist.toggle', $product) }}" method="POST">
                @csrf
                <button type="submit" class="text-blush-rose hover:text-coral-red">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="{{ Auth::user()->wishlistedProducts()->where('product_id', $product->id)->exists() ? 'currentColor' : 'none' }}" stroke="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            @endauth
        </div>
    </div>
</div>
