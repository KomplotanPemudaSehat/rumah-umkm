<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // Foreign key ke UMKM yang diberi review
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('customer_name'); // Nama pelanggan yang memberi review
            $table->unsignedTinyInteger('rating'); // Rating dari 1 sampai 5
            $table->text('comment'); // Isi testimoni
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};