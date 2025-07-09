<x-guest-layout>
    <div class="font-poppins text-2xl text-deep-graphite mb-4">
        Atur Ulang Password
    </div>

    <form method="POST" action="{{ route('password.update.otp') }}">
        @csrf
        <input type="hidden" name="email" value="{{ session('email_for_reset') }}">

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password Baru" class="text-soft-navy" />
            <x-text-input id="password" class="block mt-1 w-full border-soft-navy bg-cloud-white/50" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Password Baru" class="text-soft-navy" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-soft-navy bg-cloud-white/50" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full justify-center bg-muted-teal hover:bg-opacity-80">
                Simpan Password Baru
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
