@extends('layouts.app')
@section('title', 'Blog & Artikel Edukasi')
@section('content')
    <h1 class="text-3xl font-poppins font-bold text-deep-graphite mb-8">Blog & Artikel Edukasi</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($articles as $article)
            @include('partials.article_card', ['article' => $article])
        @empty
            <p class="col-span-full text-center text-soft-navy py-10">Belum ada artikel untuk ditampilkan.</p>
        @endforelse
    </div>
    <div class="mt-8">
        {{ $articles->links() }}
    </div>
@endsection
