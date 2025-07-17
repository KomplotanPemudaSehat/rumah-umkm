<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'UMKMin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700|inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- PERUBAHAN: Menambahkan div utama dengan background image dan overlay --}}
        <body class="font-sans text-gray-900 antialiased">
        {{-- PERUBAHAN: Memisahkan background dan konten untuk efek blur --}}
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cloud-white relative overflow-hidden">
            
            <!-- Background Image dengan Efek Blur -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/auth-bg.jpg') }}" alt="Latar Belakang" class="w-full h-full object-cover filter blur-sm scale-105">
                <!-- Overlay Gelap -->
                <div class="absolute inset-0 bg-gelap opacity-50"></div>
            </div>
            <div class="relative z-10 w-full flex flex-col items-center px-4">
                {{-- PERUBAHAN: Mengganti teks dengan komponen logo --}}
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Perusahaan Anda" style="width: 200px; height: auto;">
                 </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/80 backdrop-blur-md shadow-2xl overflow-hidden sm:rounded-lg border border-white/20">
                    {{ $slot }}
            </div>
        </div>
    </body>
</html>
