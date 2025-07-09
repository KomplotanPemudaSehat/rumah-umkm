@extends('layouts.app')
@section('title', 'Tambah Kategori Baru')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Tambah Kategori Baru</h1>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto border border-soft-navy/20">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-soft-navy">Nama Kategori</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-muted-teal hover:bg-opacity-80">Simpan</button>
            </div>
        </form>
    </div>
@endsection
