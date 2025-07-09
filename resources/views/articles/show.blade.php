@extends('layouts.app')
@section('title', $article->title)
@section('content')
    <div class="bg-white p-6 md:p-8 rounded-lg shadow-md max-w-4xl mx-auto border border-soft-navy/20">
        <img src="{{ $article->featured_image_path ? asset('storage/' . $article->featured_image_path) : 'https://placehold.co/1200x600' }}" alt="{{ $article->title }}" class="w-full rounded-lg shadow-lg mb-8">
        <h1 class="text-3xl md:text-4xl font-poppins font-bold text-deep-graphite">{{ $article->title }}</h1>
        <p class="text-soft-navy mt-2 mb-6">Dipublikasikan pada {{ $article->created_at->format('d F Y') }}</p>
        <div class="prose prose-lg max-w-none text-deep-graphite">
            {!! $article->content !!}
        </div>
    </div>
@endsection
