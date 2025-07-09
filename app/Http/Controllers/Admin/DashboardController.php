<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::where('role', 'seller')->count();
        $productCount = Product::count();
        $articleCount = Article::count();
        return view('admin.dashboard', compact('userCount', 'productCount', 'articleCount'));
    }
}