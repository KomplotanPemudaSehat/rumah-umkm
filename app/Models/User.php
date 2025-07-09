<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'whatsapp_number', 'store_name', 'store_description', 'role', 'store_slug',
        'store_image_path',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function wishlistedProducts()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Helper untuk menghitung rata-rata rating
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}