@extends('layouts.app')
@section('title', 'Tambah Produk Baru')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Tambah Produk Baru</h1>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto border border-soft-navy/20">
        <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-soft-navy">Nama Produk</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <label for="category_id" class="block text-sm font-medium text-soft-navy">Kategori</label>
                    <select name="category_id" id="category_id" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-soft-navy">Harga (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                    @error('price')
                        <p class="text-sm text-coral-red mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-soft-navy">Deskripsi</label>
                    <textarea name="description" id="description" rows="5" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-sm text-coral-red mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="images" class="block text-sm font-medium text-soft-navy">Foto Produk (bisa lebih dari satu, maks. 2MB per foto)</label>
                    <input type="file" name="images[]" id="images" multiple required class="mt-1 block w-full text-sm text-soft-navy file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cloud-white file:text-muted-teal hover:file:bg-muted-teal/10">
                    {{-- PERUBAHAN: Menampilkan pesan error untuk gambar --}}
                    @error('images')
                        <p class="text-sm text-coral-red mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-muted-teal border border-transparent rounded-md font-semibold text-white hover:bg-opacity-80">Simpan Produk</button>
            </div>
        </form>
    </div>
@endsection
