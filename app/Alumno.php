<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Alumno  extends Authenticatable
{
    use Notifiable;

    protected $guard = 'alumno';

    protected $fillable = [
        'apellido1', 'apellido2', 'nombre', 'matricula', 'sexo', 'curp', 'licenciatura_id','grupo_id',
        'email', 'password', 
    ];

    protected $hidden = ['password'];


    public function alum()
    {
        return $this->belongsTo('App\Grupo', 'grupo_id');
    }

    public function alumnoLicenciatura()
    {
        return $this->belongsTo('App\Licenciatura', 'licenciatura_id');
    }

    public function scopeNombres($query, $name)
    {
        if($name)
        {
            return $query = DB::table('grupos')
                                ->join('alumnos', 'alumnos.grupo_id', '=', 'grupos.id')
                                ->where (\DB::raw("CONCAT (nombre, ' ', apellido1, ' ', apellido2)"), 'LIKE', "%$name%" );
        }
    }

    public function scopeGrupos($query, $grupo)
    {
        if($grupo)
        {
            return $query = DB::table('grupos')
                                ->join('alumnos', 'alumnos.grupo_id', '=', 'grupos.id')
                                ->where ('grupo_id',$grupo);
        }
    }
    
    public function scopeMatriculas($query, $matricula)
    {
        if($matricula)
        {
            return $query = DB::table('grupos')
                            ->join('alumnos', 'alumnos.grupo_id', '=', 'grupos.id')
                            ->where ('matricula', '=', "$matricula");
        }
    }
} 