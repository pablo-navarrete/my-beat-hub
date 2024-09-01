<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'description',
        'image_url',
        'audio_url',
        'license_id',
        'copyright_id',
        'price',
        'tempo',
        'key',
        'user_id',
        'status',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    // Relación con los "likes"
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

