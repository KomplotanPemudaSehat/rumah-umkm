@extends('layouts.app')
@section('title', 'Kelola Kategori')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-poppins font-bold text-deep-graphite">Kelola Kategori</h1>
        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-muted-teal text-white rounded-md font-semibold text-xs uppercase hover:bg-opacity-80 transition">Tambah Kategori</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-soft-navy/20">
        <table class="min-w-full divide-y divide-cloud-white">
            <thead class="bg-cloud-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Nama Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-soft-navy uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-cloud-white">
                @forelse($categories as $category)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-deep-graphite">{{ $category->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-soft-navy">{{ $category->slug }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-muted-teal hover:underline">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline ml-4" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-coral-red hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-soft-navy">Belum ada kategori.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $categories->links() }}</div>
@endsection
