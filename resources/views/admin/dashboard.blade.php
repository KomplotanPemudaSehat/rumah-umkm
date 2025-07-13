@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Dashboard Admin</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
            <h3 class="text-lg font-medium text-soft-navy">Total Penjual</h3>
            <p class="text-3xl font-poppins font-bold mt-2 text-muted-teal">{{ $userCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
            <h3 class="text-lg font-medium text-soft-navy">Total Produk</h3>
            <p class="text-3xl font-poppins font-bold mt-2 text-muted-teal">{{ $productCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
            <h3 class="text-lg font-medium text-soft-navy">Total Artikel</h3>
            <p class="text-3xl font-poppins font-bold mt-2 text-muted-teal">{{ $articleCount }}</p>
        </div>
    </div>
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
        <h2 class="text-xl font-poppins font-bold mb-4 text-deep-graphite">Menu Manajemen</h2>
        <div class="flex flex-wrap gap-4 items-center">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-aqua-glow text-deep-graphite rounded-md hover:bg-opacity-80 text-sm font-medium transition">Kelola Pengguna</a>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-stone-green text-white rounded-md hover:bg-opacity-80 text-sm font-medium transition">Kelola Produk</a>
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-soft-lilac text-white rounded-md hover:bg-opacity-80 text-sm font-medium transition">Kelola Kategori</a>
            <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 bg-coral-red text-white rounded-md hover:bg-opacity-80 text-sm font-medium transition">Kelola Artikel</a>
            <a href="{{ route('admin.notifications.index') }}" class="px-4 py-2 bg-coral-red text-white rounded-md hover:bg-opacity-80 text-sm font-medium transition">Lihat OTP Masuk</a>
            <a href="{{ route('password.change') }}" class="px-4 py-2 bg-coral-red text-white rounded-md hover:bg-opacity-80 text-sm font-medium transition">Ganti Password</a>
            
            <button id="test-notification-btn" class="px-4 py-2 bg-yellow-400 text-deep-graphite rounded-md hover:bg-yellow-500 text-sm font-medium transition">Tes Notifikasi</button>
        </div>
    </div>
@endsection
