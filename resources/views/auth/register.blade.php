<x-guest-layout>
    <div class="font-poppins text-2xl text-deep-graphite mb-4">
        Buat Akun Baru
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nama Lengkap" class="text-soft-navy" />
            <x-text-input id="name" class="block mt-1 w-full border-soft-navy bg-cloud-white/50" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" class="text-soft-navy" />
            <x-text-input id="email" class="block mt-1 w-full border-soft-navy bg-cloud-white/50" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" class="text-soft-navy" />
            <x-text-input id="password" class="block mt-1 w-full border-soft-navy bg-cloud-white/50"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Password" class="text-soft-navy" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-soft-navy bg-cloud-white/50"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-soft-navy hover:text-muted-teal rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                Sudah punya akun?
            </a>

            <x-primary-button class="ms-4 bg-muted-teal hover:bg-opacity-80">
                Daftar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
