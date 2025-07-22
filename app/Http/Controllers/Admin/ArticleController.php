<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image_path' => 'nullable|image|max:20480',
            'status' => 'required|in:draft,published',
        ]);

        $path = null;
        if ($request->hasFile('featured_image_path')) {
            $path = $request->file('featured_image_path')->store('articles', 'public');
        }

        Auth::user()->articles()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'content' => $request->content,
            'featured_image_path' => $path,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image_path' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $path = $article->featured_image_path;
        if ($request->hasFile('featured_image_path')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('featured_image_path')->store('articles', 'public');
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image_path' => $path,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->featured_image_path) {
            Storage::disk('public')->delete($article->featured_image_path);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}