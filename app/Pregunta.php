<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function scopeCategorias($query, $BuscarCategoria)
    {
        if($BuscarCategoria)
        {
            return $query = DB::table('categorias')
                    ->join('preguntas', 'preguntas.categoria_id', '=', 'categorias.id')
                    ->select('categorias.categoria',
                             'preguntas.pregunta',
                             'preguntas.id')
                    ->where ('categoria', '=', "$BuscarCategoria");
                            
        }
    }
}
