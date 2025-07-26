<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cursos extends Model
{
    use HasFactory;

    protected $table = 'cursos'; 

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'cupos_disponible',
        'f_inicio',
        'f_fin',
    ];
}
