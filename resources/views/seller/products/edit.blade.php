@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Edit Produk: {{ $product->name }}</h1>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto border border-soft-navy/20">
        <form action="{{ route('seller.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-soft-navy">Nama Produk</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <label for="category_id" class="block text-sm font-medium text-soft-navy">Kategori</label>
                    <select name="category_id" id="category_id" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-soft-navy">Harga (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-soft-navy">Deskripsi</label>
                    <textarea name="description" id="description" rows="5" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">{{ old('description', $product->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                 {{-- Catatan: Logika pembaruan gambar bisa lebih kompleks. Untuk saat ini, kita fokus pada validasi. --}}
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-muted-teal border border-transparent rounded-md font-semibold text-white hover:bg-opacity-80">Perbarui Produk</button>
            </div>
        </form>
    </div>
@endsection
