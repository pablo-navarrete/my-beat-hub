<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RRSSFooter extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook',
        'instagram',
        'youtube',
        'status_facebook',
        'status_instagram',
        'status_youtube'
    ];

}
