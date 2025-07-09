<x-guest-layout>
    <div class="font-poppins text-2xl text-deep-graphite mb-4">
        Masuk ke Akun Anda
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Email" class="text-soft-navy" />
            <x-text-input id="email" class="block mt-1 w-full border-soft-navy bg-cloud-white/50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" class="text-soft-navy" />
            <x-text-input id="password" class="block mt-1 w-full border-soft-navy bg-cloud-white/50"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-soft-navy text-muted-teal shadow-sm focus:ring-muted-teal" name="remember">
                <span class="ms-2 text-sm text-soft-navy">Ingat saya</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-soft-navy hover:text-muted-teal rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif

            <x-primary-button class="ms-3 bg-muted-teal hover:bg-opacity-80">
                Masuk
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
