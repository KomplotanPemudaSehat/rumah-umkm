<?php

// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan updateOrCreate untuk mencegah duplikasi
        // Ini akan mencari user dengan email 'admin@rumahumkm.com'.
        // Jika tidak ada, ia akan membuatnya. Jika sudah ada, ia akan memastikannya
        // memiliki data yang benar (misal: peran sebagai admin).
        User::updateOrCreate(
            ['email' => 'admin@rumahumkm.com'], // Kunci untuk mencari
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // Ganti dengan password yang kuat
                'role' => 'admin',
                'whatsapp_number' => '6281234567890',
                'store_name' => 'Kantor Pusat Rumah UMKM',
            ]
        );
    }
}
