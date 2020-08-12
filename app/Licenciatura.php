<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licenciatura extends Model
{
    protected $table = 'licenciaturas';

    protected $fillable = [
        'carrera'
    ];

    public function licenciatura_materia()
    {
        return $this->belongsTo('App\Materia', 'licenciatura_id');
    }


}
