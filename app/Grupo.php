<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    
    protected $table = 'grupos';

    protected $fillable = [
        'grupo'
    ];

    
    public function horario()
    {
        return $this->belongsToMany('App\Horario', 'id');
    }

    public function alum()
    {
        return $this->belongsTo('App\Alumno', 'grupo_id');
    }

}
