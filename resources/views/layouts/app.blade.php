<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rumah UMKM')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Scripts (Menggunakan Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-poppins { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-cloud-white text-deep-graphite antialiased">
    
    @include('partials.navbar')

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    <footer class="bg-deep-graphite text-cloud-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Rumah UMKM. Platform Digital untuk UMKM Indonesia.</p>
            <a href="#" class="hover:text-blush-rose transition-colors">Kebijakan Privasi</a>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
