<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'seller')->latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    // Catatan: Untuk fitur ini, Anda perlu menambahkan kolom status (misal: is_active)
    // ke tabel users melalui file migrasi baru.
    public function toggleStatus(User $user)
    {
        $user->update(['is_active' => !$user->is_active]);
        return back()->with('success', 'Status pengguna berhasil diubah.');
        
        // Alternatif sederhana: Hapus pengguna (bisa diimplementasikan dengan Soft Deletes)
        $user->delete();
        return back()->with('success', 'Pengguna berhasil diblokir/dihapus.');
    }
}