{{-- Ini adalah file partial, bukan komponen. Tidak ada @props. --}}
<div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300 group border border-soft-navy/10 h-full">
    {{-- Pastikan slug ada sebelum membuat link --}}
    @if(isset($seller) && $seller->store_slug)
    <a href="{{ route('stores.show', $seller) }}" class="block p-4 h-full flex flex-col">
    @else
    <div class="block p-4 h-full flex flex-col">
    @endif
        @if(isset($seller))
        <div class="flex items-center gap-4">
            <img src="{{ $seller->store_image_path ? asset('storage/' . $seller->store_image_path) : 'https://placehold.co/100x100/F5F5F7/64748B?text=Toko' }}" alt="{{ $seller->store_name }}" class="w-20 h-20 rounded-full object-cover border-2 border-cloud-white shadow">
            <div class="flex-1">
                <h3 class="font-poppins font-semibold text-deep-graphite group-hover:text-muted-teal transition-colors">{{ $seller->store_name }}</h3>
                <div class="flex items-center mt-1">
                    @if($seller->reviews_avg_rating)
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= round($seller->reviews_avg_rating))
                                <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            @else
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            @endif
                        @endfor
                        <span class="ml-2 text-xs text-soft-navy">({{ number_format($seller->reviews_avg_rating, 1) }})</span>
                    @else
                        <span class="text-xs text-soft-navy">Belum ada rating</span>
                    @endif
                </div>
                <span class="text-xs text-soft-navy mt-1 block">{{ $seller->reviews_count }} ulasan</span>
            </div>
        </div>
        @else
        <p class="text-coral-red">Data penjual tidak ditemukan.</p>
        @endif
    {{-- Menutup tag <a> atau <div> --}}
    @if(isset($seller) && $seller->store_slug)
    </a>
    @else
    </div>
    @endif
</div>
