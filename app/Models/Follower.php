<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    // Si la tabla no sigue la convención de nombres
    protected $table = 'followers';

    // Campos asignables en masa
    protected $fillable = [
        'follower_id',
        'followed_id'
    ];

    /**
     * Relación con el modelo User (follower)
     */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    /**
     * Relación con el modelo User (followed)
     */
    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_id');
    }
}
