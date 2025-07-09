@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Admin</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-medium text-gray-600">Total Penjual</h3>
            <p class="text-3xl font-bold mt-2 text-indigo-600">{{ $userCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-medium text-gray-600">Total Produk</h3>
            <p class="text-3xl font-bold mt-2 text-indigo-600">{{ $productCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-medium text-gray-600">Total Artikel</h3>
            <p class="text-3xl font-bold mt-2 text-indigo-600">{{ $articleCount }}</p>
        </div>
    </div>
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Menu Manajemen</h2>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Kelola Pengguna</a>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Kelola Produk</a>
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Kelola Kategori</a>
            <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">Kelola Artikel</a>
        </div>
    </div>
@endsection