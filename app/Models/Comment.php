<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Define el nombre de la tabla si no sigue la convención de nombres
    protected $table = 'comments';

    // Especifica los campos que se pueden llenar masivamente
    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
    ];



    /**
     * Define la relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define la relación con el modelo Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
