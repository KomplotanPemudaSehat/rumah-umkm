@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Produk: {{ $product->name }}</h1>
    <div class="bg-white p-8 rounded-lg shadow-md">
        <form action="{{ route('seller.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- Form fields are similar to create.blade.php, but pre-filled with $product data -->
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="category_id" id="category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ $product->price }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" rows="5" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $product->description }}</textarea>
                </div>
                 <!-- Note: Image update logic can be more complex, e.g., deleting old ones. This is a simplified version. -->
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">Perbarui Produk</button>
            </div>
        </form>
    </div>
@endsection