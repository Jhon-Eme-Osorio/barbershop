<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    //relacion 1:N inversa

    protected $fillable = [
        'fecha_cita',
        'hora_cita',
        'estado',
        'id_cliente',
        'id_servicio',
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function servicio(){
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
