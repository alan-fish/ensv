<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Alumno  extends Authenticatable
{
    use Notifiable;

    protected $guard = 'alumno';

    protected $fillable = [
        'apellido1', 'apellido2', 'nombre', 'matricula', 'sexo', 'curp', 'licenciatura','grupo',
        'email', 'password', 
    ];

    protected $hidden = ['password'];

    public function scopeNombres($query, $name)
    {
        if($name)
        {
            return $query->where (\DB::raw("CONCAT (nombre, ' ', apellido1, ' ', apellido2)"), 'LIKE', "%$name%" );
        }
    }

    public function scopeGrupos($query, $grupo)
    {
        if($grupo)
        {
            return $query->where ('grupo', 'LIKE', "%$grupo%");
        }
    }
    public function scopeMatriculas($query, $matricula)
    {
        if($matricula)
        {
            return $query->where ('matricula', '=', "$matricula");
        }
    }
} 