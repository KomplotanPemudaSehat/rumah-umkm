<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus semua akun admin yang lama untuk memastikan kebersihan data
        User::where('role', 'admin')->delete();

        // Daftar nama-nama admin baru
        $admins = [
            'Riffan',
            'Roro',
            'Widi',
            'Hardy',
            'Galih',
            'Diah',
            'Qorisa'
        ];

        // Loop untuk membuat setiap akun admin
        foreach ($admins as $adminName) {
            User::create([
                'name' => $adminName,
                // Membuat email unik berdasarkan nama, contoh: riffan@rumahumkm.com
                'email' => Str::lower($adminName) . '@rumahumkm.com',
                // Semua admin akan memiliki password default 'password'
                'password' => Hash::make('password'),
                'role' => 'admin',
                'whatsapp_number' => '6281234567890', // Nomor default
                'store_name' => 'Admin ' . $adminName, // Nama toko default
                'store_slug' => Str::slug('Admin ' . $adminName),
            ]);
        }
    }
}
