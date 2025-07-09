<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StoreProfileController extends Controller
{
    public function show(User $user)
    {
        // Pastikan user yang diakses adalah seorang penjual
        if ($user->role !== 'seller') {
            abort(404);
        }

        // Ambil produk milik user dengan paginasi
        $products = $user->products()->with('mainImage', 'category')->latest()->get();
        
        // PERUBAHAN: Ambil SEMUA review, urutkan dari yang terbaru
        $reviews = $user->reviews()->latest()->get(); 
        
        $averageRating = $user->averageRating();

        return view('stores.show', compact('user', 'products', 'reviews', 'averageRating'));
    }
}
