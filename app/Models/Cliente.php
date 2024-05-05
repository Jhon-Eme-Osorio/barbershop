<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cliente extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
    ];

    // relacion 1:N

    public function citas(){
        return $this->hasMany(Cita::class, 'id');
    }
}
