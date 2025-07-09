@extends('layouts.app')
@section('title', 'Dashboard Penjual')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Dashboard Penjual</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
            <h3 class="text-lg font-medium text-soft-navy">Total Produk</h3>
            <p class="text-3xl font-poppins font-bold mt-2 text-muted-teal">{{ $productCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
            <h3 class="text-lg font-medium text-soft-navy">Total Dilihat</h3>
            <p class="text-3xl font-poppins font-bold mt-2 text-muted-teal">{{ $totalViews }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md border border-soft-navy/20 flex flex-col justify-center items-center">
            <h3 class="text-lg font-medium text-soft-navy">Pesan Masuk</h3>
            <p class="text-3xl font-poppins font-bold mt-2 text-soft-navy/50">Segera Hadir</p>
        </div>
    </div>

    <div class="mt-12 bg-white p-6 rounded-lg shadow-md border border-soft-navy/20">
        <h2 class="text-xl font-poppins font-bold mb-4 text-deep-graphite">Akses Cepat</h2>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('seller.products.index') }}" class="px-4 py-2 bg-muted-teal text-white rounded-md hover:bg-opacity-80 text-sm font-medium transition">Kelola Produk</a>
            <a href="{{ route('seller.profile.edit') }}" class="px-4 py-2 bg-blush-rose text-deep-graphite rounded-md hover:bg-opacity-80 text-sm font-medium transition">Ubah Profil Toko</a>
        </div>
    </div>
@endsection
