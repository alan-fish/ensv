<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $table = 'ciclos';

    protected $fillable = [
        'ciclo'
    ];

    public function horario()
    {
        return $this->belongsTo('App\Horario', 'ciclo_id');
    }
}
