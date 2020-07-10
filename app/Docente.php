<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Docente  extends Authenticatable
{
    use Notifiable;

    protected $guard = 'docente';

    protected $fillable = [
        'apellido1', 'apellido2', 'nombre','estado','fecha_ingreso',
        'licenciatura','licenciatura1','licenciatura2',
        'maestria','maestria1','maestria2',
        'doctorado','doctorado1','doctorado2',
        'tipo_de_contratacion',
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

    public function scopeEstado($query, $estado)
    {
        if($estado)
        {
            return $query->where ('estado', 'LIKE', "%$estado%");
        }
    }
    
} 