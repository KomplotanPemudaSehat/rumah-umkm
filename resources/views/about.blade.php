@extends('layouts.app')
@section('title', 'Tentang Rumah UMKM')

@section('content')
{{-- Menambahkan kelas 'text-center' di container utama --}}
<div class="bg-white p-8 rounded-lg shadow-md max-w-4xl mx-auto border border-soft-navy/20 text-center">
    
    <!-- Bagian Header -->
    <div class="border-b border-soft-navy/10 pb-8 mb-8">
        <h1 class="text-4xl font-poppins font-bold text-deep-graphite">Tentang UMKMin</h1>
        <p class="mt-4 text-lg text-soft-navy max-w-3xl mx-auto">
            UMKMin (Usaha Mikro Kecil Menengah Indonesia) adalah sebuah platform katalog digital yang dibuat untuk membantu pelaku UMKM lokal dalam memasarkan produk mereka secara online.
        </p>
    </div>

    <!-- Bagian Deskripsi Utama -->
    {{-- Menghapus kelas 'prose' agar perataan tengah bisa diterapkan --}}
    <div class="prose-lg max-w-none text-soft-navy">
        <p>
            Di UMKMin, pengguna bisa menemukan berbagai produk lokal seperti makanan, kerajinan, fashion, dan jasa kreatif, lalu langsung menghubungi penjualnya melalui WhatsApp.
        </p>
        <p>
            Kami percaya bahwa setiap UMKM memiliki potensi besar untuk berkembang. Dengan menghadirkan UMKMin, kami ingin menjadi jembatan yang menghubungkan para pelaku usaha dengan pembeli secara lebih mudah, cepat, dan dekat.
        </p>
    </div>

    <!-- Bagian Misi Kami -->
    <div class="mt-12">
        <h2 class="text-3xl font-poppins font-bold text-deep-graphite mb-6">Misi Kami</h2>
        <div class="grid md:grid-cols-2 gap-6">
            {{-- Menambahkan 'text-center' di setiap kotak misi --}}
            <div class="bg-cloud-white p-6 rounded-lg border border-soft-navy/10 text-center">
                <h3 class="font-poppins font-semibold text-muted-teal">Mendorong Digitalisasi</h3>
                <p class="mt-2 text-sm text-soft-navy">Mendorong digitalisasi UMKM secara praktis dan gratis.</p>
            </div>
            <div class="bg-cloud-white p-6 rounded-lg border border-soft-navy/10 text-center">
                <h3 class="font-poppins font-semibold text-muted-teal">Menyediakan Ruang Promosi</h3>
                <p class="mt-2 text-sm text-soft-navy">Menyediakan ruang promosi sederhana dan mudah diakses.</p>
            </div>
            <div class="bg-cloud-white p-6 rounded-lg border border-soft-navy/10 text-center">
                <h3 class="font-poppins font-semibold text-muted-teal">Menemukan Produk Lokal</h3>
                <p class="mt-2 text-sm text-soft-navy">Membantu konsumen menemukan produk lokal terbaik di sekitarnya.</p>
            </div>
            <div class="bg-cloud-white p-6 rounded-lg border border-soft-navy/10 text-center">
                <h3 class="font-poppins font-semibold text-muted-teal">Memberi Dampak Nyata</h3>
                <p class="mt-2 text-sm text-soft-navy">Memberi dampak nyata bagi pelaku usaha kecil di seluruh Indonesia.</p>
            </div>
        </div>
    </div>

    <!-- Bagian Tim Pengembang -->
    <div class="mt-12">
        <h2 class="text-3xl font-poppins font-bold text-deep-graphite mb-2">Tim Pengembang</h2>
        <p class="mb-4">UMKMin dikembangkan oleh mahasiswa KKN Digital 2025 dari Universitas Islam Negeri Siber Syekh Nurjati Cirebon dalam rangka mendukung UMKM di wilayah Kota & Kabupaten Cirebon.</p>
        <h3 class="font-semibold text-deep-graphite mb-8">Anggota tim:</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $team = [
                    ['name' => 'Ananda Riffan Fachrizki', 'role' => 'Ketua', 'photo' => 'ananda.jpg'],
                    ['name' => 'Roro Naifah Kamila', 'role' => 'Sekretaris', 'photo' => 'roro.png'],
                    ['name' => 'Moh Hardyansyah Lazuardi', 'role' => 'Bendahara', 'photo' => 'hardy.jpg'],
                    ['name' => 'Galih Aulia Azzahra', 'role' => 'Humas', 'photo' => 'galih.jpg'],
                    ['name' => 'Widi Ardiyansyah', 'role' => 'Sie Dokumentasi', 'photo' => 'widi.jpg'],
                    ['name' => 'Diah Ayu Nurlestari', 'role' => 'Sie Desain Grafis', 'photo' => 'diah.jpg'],
                ];
            @endphp
            
            @foreach($team as $member)
            <div x-data="{ show: false }" x-intersect.once="show = true">
                <div x-show="show" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform translate-y-5" x-transition:enter-end="opacity-100 transform translate-y-0" class="bg-white p-6 rounded-lg shadow-lg text-center border border-soft-navy/20 flex flex-col items-center h-full">
                    <img src="{{ asset('images/team/' . $member['photo']) }}" onerror="this.src='https://placehold.co/150x150/5EAAA8/F5F5F7?text={{ substr($member['name'], 0, 1) }}'" alt="{{ $member['name'] }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover ring-4 ring-muted-teal/20">
                    <h4 class="font-poppins font-semibold text-lg text-deep-graphite">{{ $member['name'] }}</h4>
                    <p class="text-sm text-muted-teal">{{ $member['role'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bagian Kontak & Afiliasi -->
    <div class="mt-12 border-t border-soft-navy/10 pt-8">
        <h3 class="text-2xl font-poppins font-bold text-deep-graphite">Kontak dan Sosial Media</h3>
        <p class="text-soft-navy mt-2">
            Instagram: <a href="https://www.instagram.com/umkminofficial/" target="_blank" class="text-muted-teal hover:underline">@umkminofficial</a> | Email: <a href="mailto:di.umkm.in@gmail.com" class="text-muted-teal hover:underline">di.umkm.in@gmail.com</a>
        </p>
        <div class="mt-8 bg-blush-rose/30 p-4 rounded-lg">
            <h4 class="font-semibold text-deep-graphite">Afiliasi</h4>
            <p class="text-sm text-soft-navy">
                Website ini merupakan bagian dari program KKN Digital Universitas Islam Negeri Siber Syekh Nurjati Cirebon. Program ini juga didukung oleh mitra lokal dari UMKM di wilayah Kota dan Kabupaten Cirebon.
            </p>
        </div>
    </div>

</div>
@endsection
