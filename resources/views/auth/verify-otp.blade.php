<x-guest-layout>
    <div class="font-poppins text-2xl text-deep-graphite mb-4 text-center">
        Verifikasi Kode OTP
    </div>

    <!-- Instruksi baru untuk menghubungi Instagram -->
    <div class="text-center text-sm text-soft-navy mb-4 p-4 border border-muted-teal/20 bg-muted-teal/10 rounded-lg">
        <p class="font-semibold text-deep-graphite mb-2">Hubungi Admin untuk Kode OTP</p>
        <p>
            Untuk mendapatkan kode verifikasi Anda, silakan kirim pesan (DM) ke akun Instagram kami.
        </p>
        <a href="https://www.instagram.com/umkminofficial/" target="_blank" class="mt-3 inline-block bg-muted-teal text-white font-bold text-xs py-2 px-4 rounded-lg shadow-md hover:bg-opacity-90 transition-shadow duration-300">
            <i class="fab fa-instagram mr-1"></i> <!-- Ikon opsional, pastikan Font Awesome dimuat -->
            Hubungi @umkminofficial
        </a>
        <p class="mt-3">
            Setelah mendapatkan kode dari admin, masukkan pada kolom di bawah ini.
        </p>
    </div>

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf
        <input type="hidden" name="email" value="{{ session('email') }}">

        <div>
            <x-input-label for="otp" value="Kode OTP" class="text-soft-navy" />
            <x-text-input id="otp" class="block mt-1 w-full border-soft-navy bg-cloud-white/50 text-center tracking-[8px] font-poppins" type="text" name="otp" required autofocus />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>
        
        @if (session('error'))
            <div class="mt-2 text-sm text-red-600">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full justify-center bg-muted-teal hover:bg-opacity-80">
                Verifikasi
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
