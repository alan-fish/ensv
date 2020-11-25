<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';

    protected $fillable = [
        'pregunta', 'categoria_id'
    ];
    

    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }
}
