<x-guest-layout>
    <div class="mb-4 text-sm text-soft-navy">
        Ini adalah area aman aplikasi. Harap konfirmasikan kata sandi Anda sebelum melanjutkan.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Password" class="text-soft-navy" />
            <x-text-input id="password" class="block mt-1 w-full border-soft-navy bg-cloud-white/50"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button class="ms-4 bg-muted-teal hover:bg-opacity-80">
                Konfirmasi
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
