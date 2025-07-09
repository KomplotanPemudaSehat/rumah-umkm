<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('seller.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:20',
            'store_description' => 'nullable|string',
            'store_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Validasi untuk foto profil
        ]);

        // Update data teks
        $user->update([
            'name' => $request->name,
            'store_name' => $request->store_name,
            'store_slug' => Str::slug($request->store_name), // Buat slug dari nama toko
            'whatsapp_number' => $request->whatsapp_number,
            'store_description' => $request->store_description,
        ]);

        // Logika untuk upload foto profil baru
        if ($request->hasFile('store_image')) {
            // Hapus foto lama jika ada
            if ($user->store_image_path) {
                Storage::disk('public')->delete($user->store_image_path);
            }
            // Simpan foto baru dan update path di database
            $path = $request->file('store_image')->store('store-profiles', 'public');
            $user->update(['store_image_path' => $path]);
        }

        // Logika untuk menghapus foto profil
        if ($request->has('delete_store_image')) {
            if ($user->store_image_path) {
                Storage::disk('public')->delete($user->store_image_path);
                $user->update(['store_image_path' => null]);
            }
        }

        return redirect()->route('seller.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
