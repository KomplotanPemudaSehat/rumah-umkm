@extends('layouts.app')
@section('title', 'Kelola Produk Saya')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-poppins font-bold text-deep-graphite">Produk Saya</h1>
        <a href="{{ route('seller.products.create') }}" class="inline-flex items-center px-4 py-2 bg-muted-teal text-white rounded-md font-semibold text-xs uppercase hover:bg-opacity-80 transition">Tambah Produk</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-soft-navy/20">
        <table class="min-w-full divide-y divide-cloud-white">
            <thead class="bg-cloud-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-soft-navy uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-cloud-white">
                @forelse($products as $product)
                <tr class="hover:bg-cloud-white/50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-deep-graphite">{{ $product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-soft-navy">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-soft-navy">{{ optional($product->category)->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('seller.products.edit', $product) }}" class="text-muted-teal hover:underline">Edit</a>
                        <form action="{{ route('seller.products.destroy', $product) }}" method="POST" class="inline ml-4" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-coral-red hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-soft-navy">Anda belum memiliki produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $products->links() }}</div>
@endsection
