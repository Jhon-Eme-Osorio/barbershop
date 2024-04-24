<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'apertura_mañana',
        'cierre_mañana',
        'apertura_tarde',
        'cierre_tarde',
        'activo',
    ];
}
