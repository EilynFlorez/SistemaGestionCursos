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

    public function inscripciones() {
        return $this->hasMany(Inscripcion::class, 'curso_id');
    }

    public function estudiantes() {
        return $this->belongsToMany(Usuario::class, 'inscripciones', 'curso_id', 'estudiante_id')->withPivot('fecha_hora')->withTimestamps();
    }
}
