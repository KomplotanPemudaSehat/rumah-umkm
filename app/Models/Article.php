<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'content', 'featured_image_path', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}