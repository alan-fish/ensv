<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $fillable = [
        'licenciatura_id', 'ciclo_id', 'grupo_id',
        'dia', 'hora',
        'materia_id', 'docente_id' 
    ];


    public function ciclos()
    {
        return $this->hasmany('App\Ciclo');
    }

    public function grupos()
    {
        return $this->hasmany('App\Grupos');
    }

    public function materias()
    {
        return $this->hasmany('App\Materia');
    }

    public function docentes()
    {
        return $this->hasmany('App\Docente');
    }

    public function scopeHorarios($query, $data)
    { 
        
        if($data)
        {   
            $cic = $data ['0'];
            $grp = $data ['1'];
            $carrera =  $data ['2'];

            return $query = DB::table('horarios')
            ->leftjoin('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                      ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                      ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                      ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                      ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                      //->where ('ciclo_id', '=', "$ciclo", 'AND', 'grupo_id', '=', "$grupo");
                      ->where ('ciclo_id',$cic)
                      ->where ('horarios.licenciatura_id', $carrera)
                      ->where ('grupo_id',$grp);
       }    
    }
}
