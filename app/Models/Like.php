<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Especificar la tabla si no sigue la convención de nombres de Laravel
    protected $table = 'likes';

    // Definir las relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

  
    protected $fillable = [
        'user_id',
        'product_id',
    ];

}
