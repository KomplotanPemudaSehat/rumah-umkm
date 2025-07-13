<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rumah UMKM')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
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
            <div class="mt-2 text-sm space-x-4">
                <a href="#" class="hover:text-blush-rose transition-colors">Kebijakan Privasi</a>
                <span>&bull;</span>
                <a href="{{ route('about') }}" class="hover:text-blush-rose transition-colors">Tentang Kami</a>
            </div>
        </div>
    </footer>

    @auth
    @if(Auth::user()->isAdmin())
    <script>
        function showDesktopNotification(message) {
            if (!("Notification" in window)) {
                console.error("Browser ini tidak mendukung notifikasi desktop.");
                return;
            }
            if (Notification.permission === "granted") {
                new Notification('Permintaan OTP Baru!', {
                    body: message,
                    icon: "{{ asset('favicon.ico') }}"
                });
            } else if (Notification.permission !== "denied") {
                Notification.requestPermission().then(permission => {
                    if (permission === "granted") {
                        showDesktopNotification(message);
                    }
                });
            }
        }

        function initializeEchoListener() {
            if (typeof window.Echo !== 'undefined') {
                console.log('Echo is ready. Subscribing to PRIVATE channel: admin-notifications');

                window.Echo.private('admin-notifications')
                    .listen('OtpRequested', (e) => {
                        console.log('%cEvent "OtpRequested" received:', 'color: green; font-weight: bold;', e);
                        showDesktopNotification(e.message);
                    });
            } else {
                setTimeout(initializeEchoListener, 500);
            }
        }

        document.addEventListener('DOMContentLoaded', initializeEchoListener);
    </script>
    @endif
@endauth


</body>
</html>
