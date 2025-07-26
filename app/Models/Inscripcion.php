<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones'; 

    protected $fillable = [
        'curso_id',
        'estudiante_id',
        'fecha_hora',
    ];

     public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function curso(){
        return $this->belongsTo(Cursos::class, 'curso_id');
    }

}
