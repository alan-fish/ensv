<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';

    protected $fillable = [
        'materia'
    ];

    public function licenciaturas()
    {
        return $this->hasmany('App\Licenciatura');
    }
    
    public function horario()
    {
        return $this->belongsTo('App\Horario' , 'materia_id');
    }
}
