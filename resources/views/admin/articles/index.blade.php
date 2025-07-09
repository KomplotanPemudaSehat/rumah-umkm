@extends('layouts.app')
@section('title', 'Kelola Artikel')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-poppins font-bold text-deep-graphite">Kelola Artikel</h1>
        <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center px-4 py-2 bg-muted-teal text-white rounded-md font-semibold text-xs uppercase hover:bg-opacity-80 transition">Tulis Artikel Baru</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-soft-navy/20">
        <table class="min-w-full divide-y divide-cloud-white">
            <thead class="bg-cloud-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Tanggal Dibuat</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-soft-navy uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-cloud-white">
                @forelse($articles as $article)
                <tr class="hover:bg-cloud-white/50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-deep-graphite">{{ Str::limit($article->title, 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @if($article->status == 'published')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-aqua-glow/20 text-aqua-glow">Published</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-stone-green/20 text-stone-green">Draft</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-soft-navy">{{ $article->created_at->format('d F Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-muted-teal hover:underline">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline ml-4" onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-coral-red hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-soft-navy">Belum ada artikel yang ditulis.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $articles->links() }}</div>
@endsection
