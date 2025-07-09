<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Menyimpan review baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari formulir
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        // Buat dan simpan review baru
        Review::create($request->all());

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Terima kasih atas ulasan Anda!');
    }
}
