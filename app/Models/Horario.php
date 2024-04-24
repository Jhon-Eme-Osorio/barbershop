<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'Dia',
        'Apertura_mañana',
        'Cierre_mañana',
        'Apertura_tarde',
        'Cierre_tarde',
        'Activo',
    ];
}
