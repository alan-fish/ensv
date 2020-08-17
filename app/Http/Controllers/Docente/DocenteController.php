<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Alumnopassword;


use Auth;
use Hash;
use App\Docente;
use App\Horario;
use App\Grupo;
use App\Alumno;
class DocenteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:docente');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function menu()
    {
        return view('/docente/menudocente');
    }

    public function perfil()
    {
        return view('/docente/perfil-docente');
    }

    public function password()
    {
        return View('/docente/update_password');
    }
                
    public function updatePassword(Alumnopassword $request)
    {
        if (Hash::check($request->mypassword, Auth::user()->password)){
            $Docente = new Docente;
            $Docente->where('email', '=', Auth::user()->email)
                 ->update(['password' => bcrypt($request->password),'changedpassword' => 1]);
           
                 return View('/docente/menudocente');
        }
        else
        {
            return redirect()->back()
            ->withInput()
            ->withErrors([
                 'mypassword' => 'La contraseña actual es incorrecta',
            ]);
        }
    }

    public function horarioGrupo($id)
    {   
        $horarios = Horario::where('docente_id', '=', $id)
                    ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                    ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                    ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                    ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                    ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                    ->select('grupos.id',
                            'licenciaturas.carrera',
                            'grupos.grupo', 
                            'horarios.dia',
                            'horarios.hora',
                            'materias.materia')
                            ->where('horarios.dia', '=','Lunes')
                            ->get();

        $horariosMartes = Horario::where('docente_id', '=', $id)
                        ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                        ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                        ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                        ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                        ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                        ->select('grupos.id',
                                'licenciaturas.carrera',
                                'grupos.grupo', 
                                'horarios.dia',
                                'horarios.hora',
                                'materias.materia')
                                ->where('horarios.dia', '=','Martes')
                                ->orderBy('id')
                                ->get();

        $horariosMiercoles = Horario::where('docente_id', '=', $id)
                        ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                        ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                        ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                        ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                        ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                        ->select('grupos.id',
                                'licenciaturas.carrera',
                                'grupos.grupo', 
                                'horarios.dia',
                                'horarios.hora',
                                'materias.materia')
                                ->where('horarios.dia', '=','Miercoles')
                                ->orderBy('id')
                                ->get();

        $horariosJueves = Horario::where('docente_id', '=', $id)
                        ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                        ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                        ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                        ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                        ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                        ->select('grupos.id',
                                'licenciaturas.carrera',
                                'grupos.grupo', 
                                'horarios.dia',
                                'horarios.hora',
                                'materias.materia')
                                ->where('horarios.dia', '=','Jueves')
                                ->orderBy('id')
                                ->get();

        $horariosViernes = Horario::where('docente_id', '=', $id)
                        ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                        ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                        ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                        ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                        ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                        ->select('grupos.id',
                                'licenciaturas.carrera',
                                'grupos.grupo', 
                                'horarios.dia',
                                'horarios.hora',
                                'materias.materia')
                                ->where('horarios.dia', '=','Viernes')
                                ->orderBy('id')
                                ->get();

        return View('/docente/horario')->with(['horarios' => $horarios, 'horariosMartes' => $horariosMartes,
                                                'horariosMiercoles' => $horariosMiercoles,
                                                'horariosJueves' => $horariosJueves,
                                                'horariosViernes' => $horariosViernes
                                                ]);
    }

    public function grupos($id)
    {  
        $grupos = Grupo::join('alumnos', 'grupos.id', '=', 'alumnos.grupo_id')
                ->where('grupos.id', '=', $id)
                ->select(
                'alumnos.apellido1', 
                'alumnos.apellido2',
                'alumnos.nombre',
                'alumnos.matricula',
                'grupos.grupo')
                ->get(); 

       return View('/docente/grupos',['grupos' => $grupos]);
    }

}
