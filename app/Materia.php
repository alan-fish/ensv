<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Materia extends Model
{
    protected $table = 'materias';

    protected $fillable = [
        'materia', 'semestre', 'licenciatura_id'
    ];

    public function licenciaturas()
    {
        return $this->hasmany('App\Licenciatura');
    }

    public function licen()
    {
        return $this->belongsTo('App\Licenciatura', 'licenciatura_id');
    }

    public function horario()
    {
        return $this->belongsTo('App\Horario' , 'materia_id');
    }

    public function scopeMaterias($query, $data)
    { 
        
    
            $licenciatura = $data ['0'];
            $semestre = $data ['1'];

            return $query = DB::table('materias')
                           ->join('licenciaturas', 'materias.licenciatura_id', '=', 'licenciaturas.id')
                           ->where ('licenciaturas.id',$licenciatura)
                           ->where ('materias.semestre', $semestre);
       
    }

}
