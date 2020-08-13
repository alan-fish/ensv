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

    
    public function horarioLicenciatura()
    {
        return $this->belongsTo('App\Licenciatura', 'licenciatura_id');
    }
    

    public function horarioCiclo()
    {
        return $this->belongsTo('App\Ciclo', 'ciclo_id');
    }

    public function horarioGrupo()
    {
        return $this->belongsTo('App\Grupo', 'grupo_id');
    }

    public function horarioMateria()
    {
        return $this->belongsTo('App\Materia', 'materia_id');
    }

    public function horarioDocente()
    {
        return $this->belongsTo('App\Docente', 'docente_id');
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
                      ->select( 'horarios.id',
                                'licenciaturas.carrera','ciclos.ciclo', 
                                'grupos.grupo', 'horarios.dia',
                                'horarios.hora','materias.materia',
                                'docentes.apellido1', 'docentes.apellido2',
                                'docentes.nombre')
                      ->where ('ciclo_id',$cic)
                      ->where ('horarios.licenciatura_id', $carrera)
                      ->where ('grupo_id',$grp);
       }    
    }
}
