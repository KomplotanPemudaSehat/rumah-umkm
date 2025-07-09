<x-guest-layout>
    <div class="font-poppins text-2xl text-deep-graphite mb-4">
        Verifikasi Kode OTP
    </div>
    <p class="text-sm text-soft-navy mb-4">
        Kami telah mengirimkan kode 6 digit ke email Anda: <strong>{{ session('email') }}</strong>. Silakan masukkan kode tersebut di bawah ini.
    </p>

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
