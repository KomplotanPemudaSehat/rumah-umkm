@extends('layouts.app')
@section('title', 'Ganti Password')

@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Ganti Password</h1>

    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto border border-soft-navy/20">
        
        @if (session('status'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('password.change.store') }}">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="current_password" class="block text-sm font-medium text-soft-navy">Password Saat Ini</label>
                    <input id="current_password" name="current_password" type="password" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal">
                    @error('current_password')
                        <p class="text-sm text-coral-red mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-soft-navy">Password Baru</label>
                    <input id="password" name="password" type="password" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal">
                     @error('password')
                        <p class="text-sm text-coral-red mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-soft-navy">Konfirmasi Password Baru</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal">
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-muted-teal text-white border border-transparent rounded-md font-semibold hover:bg-opacity-80">
                    Simpan Password Baru
                </button>
            </div>
        </form>
    </div>
@endsection
