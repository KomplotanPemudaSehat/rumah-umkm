<div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-1 transition-transform duration-300 group border border-soft-navy/10">
    <a href="{{ route('articles.show', $article) }}" class="block">
        <img src="{{ $article->featured_image_path ? asset('storage/' . $article->featured_image_path) : 'https://placehold.co/600x400/e2e8f0/adb5bd?text=Artikel' }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
    </a>
    <div class="p-4">
        <h3 class="text-lg font-poppins font-semibold text-deep-graphite">
            <a href="{{ route('articles.show', $article) }}" class="hover:text-muted-teal transition-colors">{{ $article->title }}</a>
        </h3>
        <p class="text-sm text-soft-navy mt-2">{{ Str::limit(strip_tags($article->content), 100) }}</p>
        <div class="mt-4">
            <a href="{{ route('articles.show', $article) }}" class="text-sm font-medium text-muted-teal hover:text-opacity-80 transition-colors">Baca Selengkapnya &rarr;</a>
        </div>
    </div>
</div>
