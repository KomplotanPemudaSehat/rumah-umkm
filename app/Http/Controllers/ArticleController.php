<?php

namespace App\Http\Controllers;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')->latest()->paginate(9);
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        if ($article->status !== 'published') {
            abort(404);
        }
        return view('articles.show', compact('article'));
    }
}