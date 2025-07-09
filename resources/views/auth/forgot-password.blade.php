<x-guest-layout>
    <div class="mb-4 text-sm text-soft-navy">
        Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan email berisi kode OTP 6 digit.
    </div>

    {{-- Menampilkan pesan sukses --}}
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    {{-- PERUBAHAN: Menangkap pesan error yang lebih eksplisit dari session --}}
    @if (session('error_message'))
        <div class="mb-4 font-medium text-sm text-red-600">
            {{ session('error_message') }}
        </div>
    @endif

    <!-- Menampilkan error validasi standar (sebagai cadangan) -->
    @if ($errors->any())
        <div class="mb-4">
            <div class="font-medium text-red-600">Oops! Ada yang salah.</div>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('otp.send') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Email" class="text-soft-navy"/>
            <x-text-input id="email" class="block mt-1 w-full border-soft-navy bg-cloud-white/50" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full justify-center bg-muted-teal hover:bg-opacity-80">
                Kirim Kode OTP
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
