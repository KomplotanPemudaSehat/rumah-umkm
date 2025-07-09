@extends('layouts.app')
@section('title', 'Ubah Profil Toko')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Profil Toko</h1>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto border border-soft-navy/20">
        {{-- PENTING: Tambahkan enctype untuk upload file --}}
        <form action="{{ route('seller.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 gap-6">
                
                <!-- Foto Profil -->
                <div>
                    <label class="block text-sm font-medium text-soft-navy">Foto Profil Toko</label>
                    <div class="mt-2 flex items-center gap-4">
                        <img src="{{ Auth::user()->store_image_path ? asset('storage/' . Auth::user()->store_image_path) : 'https://placehold.co/100x100/F5F5F7/64748B?text=Toko' }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover">
                        <input type="file" name="store_image" id="store_image" class="text-sm text-soft-navy file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cloud-white file:text-muted-teal hover:file:bg-muted-teal/10">
                    </div>
                    @if(Auth::user()->store_image_path)
                    <div class="mt-2">
                        <label for="delete_store_image" class="inline-flex items-center">
                            <input type="checkbox" id="delete_store_image" name="delete_store_image" class="rounded border-soft-navy text-coral-red shadow-sm focus:ring-coral-red">
                            <span class="ml-2 text-sm text-coral-red">Hapus foto profil saat ini</span>
                        </label>
                    </div>
                    @endif
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-soft-navy">Nama Penjual</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm">
                </div>
                 <div>
                    <label for="store_name" class="block text-sm font-medium text-soft-navy">Nama Toko/UMKM</label>
                    <input type="text" name="store_name" id="store_name" value="{{ old('store_name', $user->store_name) }}" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm">
                </div>
                <div>
                    <label for="whatsapp_number" class="block text-sm font-medium text-soft-navy">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $user->whatsapp_number) }}" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm">
                </div>
                <div>
                    <label for="store_description" class="block text-sm font-medium text-soft-navy">Deskripsi Toko</label>
                    <textarea name="store_description" id="store_description" rows="4" class="mt-1 block w-full rounded-md border-soft-navy shadow-sm">{{ old('store_description', $user->store_description) }}</textarea>
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-muted-teal text-white border border-transparent rounded-md font-semibold hover:bg-opacity-80">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
