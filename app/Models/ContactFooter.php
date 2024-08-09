<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFooter extends Model
{
    use HasFactory;
    protected $fillable = [
        'correo',
        'celular',
        'whatsapp',
        'status_correo',
        'status_celular',
        'status_whatsapp'
    ];

}
