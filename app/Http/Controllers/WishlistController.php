<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistedProducts = Auth::user()->wishlistedProducts()->with('mainImage', 'category')->get();
        return view('wishlist.index', compact('wishlistedProducts'));
    }

    public function toggle(Product $product)
    {
        Auth::user()->wishlistedProducts()->toggle($product->id);
        return back()->with('success', 'Status wishlist berhasil diperbarui.');
    }
}