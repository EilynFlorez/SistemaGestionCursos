<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Rol;

class Usuario extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id_rol',
        'tipo_documento',
        'documento',
        'nombres',
        'papellido',
        'sapellido',
        'edad',
        'genero',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function rol() {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function inscripciones(){
        return $this->hasMany(Inscripcion::class);
    }

    public function cursosInscritos(){
        return $this->belongsToMany(Cursos::class, 'inscripciones', 'estudiante_id', 'curso_id')->withTimestamps()->withPivot('fecha_hora');
    }
}
