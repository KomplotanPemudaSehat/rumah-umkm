<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('mainImage', 'category', 'user');

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        // Filter by search term
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by minimum price
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        // Filter by maximum price
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // PERUBAHAN: Logika untuk mengurutkan produk
        if ($request->filled('sort_by')) {
            if ($request->sort_by == 'price_desc') {
                $query->orderByDesc('price');
            } elseif ($request->sort_by == 'price_asc') {
                $query->orderBy('price');
            } else {
                $query->latest(); // Default atau jika sort_by = 'latest'
            }
        } else {
            $query->latest(); // Default jika tidak ada parameter sort_by
        }

        $products = $query->paginate(12)->withQueryString();
        
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->increment('views');
        $product->load('images', 'category', 'user');
        return view('products.show', compact('product'));
    }
}
