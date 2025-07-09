@extends('layouts.app')
@section('title', 'Tulis Artikel Baru')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Tulis Artikel Baru</h1>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto border border-soft-navy/20">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-soft-navy">Judul Artikel</label>
                    <input type="text" name="title" id="title" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-soft-navy">Konten</label>
                    <textarea name="content" id="content" rows="10" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50"></textarea>
                    <p class="mt-2 text-xs text-soft-navy">
                <div>
                    <label for="featured_image_path" class="block text-sm font-medium text-soft-navy">Gambar Utama</label>
                    <input type="file" name="featured_image_path" id="featured_image_path" class="mt-1 block w-full text-sm text-soft-navy file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cloud-white file:text-muted-teal hover:file:bg-muted-teal/10">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-soft-navy">Status</label>
                    <select name="status" id="status" required class="mt-1 block w-full rounded-md border-soft-navy shadow-sm focus:border-muted-teal focus:ring-muted-teal text-deep-graphite bg-cloud-white/50">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-muted-teal border border-transparent rounded-md font-semibold text-white hover:bg-opacity-80">Simpan Artikel</button>
            </div>
        </form>
    </div>
@endsection
