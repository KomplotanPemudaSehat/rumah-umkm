<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $productCount = $user->products()->count();
        
        // Menghitung jumlah 'views' dari semua produk milik pengguna.
        // Ini memerlukan kolom 'views' di tabel 'products'.
        $totalViews = $user->products()->sum('views'); 

        $recentProducts = $user->products()->latest()->take(5)->get();

        return view('seller.dashboard', compact('productCount', 'totalViews', 'recentProducts'));
    }
}
