<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('mainImage', 'category', 'user')->latest()->take(8)->get();
        $latestArticles = Article::where('status', 'published')->latest()->take(3)->get();

        // PERUBAHAN: Mengurutkan berdasarkan rating tertinggi, lalu jumlah review terbanyak.
        $popularSellers = User::where('role', 'seller')
            ->whereNotNull('store_name')
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating') // Urutan pertama: rating tertinggi
            ->orderByDesc('reviews_count')      // Urutan kedua: jumlah review terbanyak
            ->get(); // Mengambil semua data

        return view('home', compact('featuredProducts', 'latestArticles', 'popularSellers'));
    }

    public function about()
    {
        return view('about');
    }
}
