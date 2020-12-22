<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = 'resultados';

    protected $fillable = [
        'resultado', 'categoria_id',
        'ciclo_id', 'grupo_id', 
        'docente_id'
    ];
    
}
