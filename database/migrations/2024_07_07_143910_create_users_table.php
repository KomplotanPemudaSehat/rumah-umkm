<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('whatsapp_number')->nullable()->comment('Nomor WhatsApp untuk dihubungi pembeli');
            $table->string('store_name')->nullable()->comment('Nama Toko atau UMKM');
            $table->text('store_description')->nullable()->comment('Deskripsi singkat toko');
            $table->enum('role', ['admin', 'seller'])->default('seller');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};