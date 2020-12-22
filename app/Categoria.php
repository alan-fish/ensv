<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'categoria'
    ];

    public function scopeCategorias($query, $BuscarCategoria)
    {
        if($BuscarCategoria)
        {
            return $query = DB::table('preguntas')
                    ->join('categorias', 'categorias.id', '=', 'preguntas.categoria_id')
                    ->select('categorias.categoria',
                             'preguntas.pregunta',
                             'preguntas.id')
                    ->where ('preguntas.categoria_id', '=', "$BuscarCategoria");
                            
        }
    }
}
