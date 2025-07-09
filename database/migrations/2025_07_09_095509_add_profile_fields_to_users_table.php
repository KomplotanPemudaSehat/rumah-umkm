<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kolom untuk menyimpan path gambar profil toko
            $table->string('store_image_path')->nullable()->after('store_description');
            // Kolom untuk URL yang ramah (e.g., /toko/nama-toko-keren)
            $table->string('store_slug')->nullable()->unique()->after('store_name');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['store_image_path', 'store_slug']);
        });
    }
};