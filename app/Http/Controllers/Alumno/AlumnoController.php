<?php

namespace App\Http\Controllers\Alumno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Alumnopassword;

use Auth;
use Hash;

use App\Alumno;
use App\Ciclo;
use App\Grupo;
use App\Materia;
use App\Horario;
use App\Licenciatura;
use DB;

class AlumnoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:alumno');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function menu()
    {
        return view('/alumno/menualumno');   
    }

    public function perfil($id)
    {
        $alumno = Alumno::join('licenciaturas', 'alumnos.licenciatura_id', '=', 'licenciaturas.id')
                        ->join('grupos', 'alumnos.grupos_id', '=', 'grupos.id')
                        ->where('alumnos.id', '=', $id)
                        ->select('grupos.grupo', 'licenciaturas.carrera')
                        ->first();
        return $alumno;
        //return view('/alumno/perfil-alumno')->with('alumno', $alumno);
    }
    public function perfilAlumno($id)
    {
        $alumno = Alumno::join('licenciaturas', 'alumnos.licenciatura_id', '=', 'licenciaturas.id')
                            ->join('grupos', 'alumnos.grupo_id', '=', 'grupos.id')
                            ->where('alumnos.id', '=', $id)
                            ->select('alumnos.apellido1',
                                     'alumnos.apellido2',
                                     'alumnos.nombre',
                                     'alumnos.matricula',
                                     'alumnos.sexo',
                                     'alumnos.curp',
                                     'alumnos.email',
                                     'grupos.grupo', 'licenciaturas.carrera')
                            ->first();
        //return $alumno;
        return view('/alumno/perfil-alumno')->with('alumno', $alumno);
    }


            
    public function password()
    {
        return View('/alumno/update_password');
    }
                
    public function updatePassword(Alumnopassword $request)
    {
        if (Hash::check($request->mypassword, Auth::user()->password)){
            $Alumno = new Alumno;
            $Alumno->where('email', '=', Auth::user()->email)
                 ->update(['password' => bcrypt($request->password),'changedpassword' => 1]);
           
                 return View('/alumno/menualumno');
        }
        else
        {
            return redirect()->back()
             ->withInput()
             ->withErrors([
            'mypassword' => 'Contraseña incorrecta',
        ]);
        }
    }
    public function horarioAlumno($id)
    {
        $horarios = Horario::where('grupo_id', '=', $id)
                            ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
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
                            ->where('horarios.dia', '=','Lunes')
                            ->get();

        $horariosMartes = Horario::where('grupo_id', '=', $id)
                    ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                    ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                    ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                    ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                    ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                    ->select('horarios.id',
                            'licenciaturas.carrera',
                            'grupos.grupo', 
                            'horarios.dia',
                            'horarios.hora',
                            'materias.materia',
                            'docentes.apellido1','docentes.apellido2',
                            'docentes.nombre')
                            ->where('horarios.dia', '=','Martes')
                            ->orderBy('id')
                            ->get();

        $horariosMiercoles = Horario::where('grupo_id', '=', $id)
                            ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                            ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                            ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                            ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                            ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                            ->select('horarios.id',
                                    'licenciaturas.carrera',
                                    'grupos.grupo', 
                                    'horarios.dia',
                                    'horarios.hora',
                                    'materias.materia',
                                    'docentes.apellido1','docentes.apellido2',
                                    'docentes.nombre')
                                    ->where('horarios.dia', '=','Miercoles')
                                    ->orderBy('id')
                                    ->get();

        $horariosJueves = Horario::where('grupo_id', '=', $id)
                                    ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                                    ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                                    ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                                    ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                                    ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                                    ->select('horarios.id',
                                            'licenciaturas.carrera',
                                            'grupos.grupo', 
                                            'horarios.dia',
                                            'horarios.hora',
                                            'materias.materia',
                                            'docentes.apellido1','docentes.apellido2',
                                            'docentes.nombre')
                                            ->where('horarios.dia', '=','Jueves')
                                            ->orderBy('id')
                                            ->get();

        $horariosViernes = Horario::where('grupo_id', '=', $id)
                                            ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                                            ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                                            ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                                            ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                                            ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                                            ->select('horarios.id',
                                                    'licenciaturas.carrera',
                                                    'grupos.grupo', 
                                                    'horarios.dia',
                                                    'horarios.hora',
                                                    'materias.materia',
                                                    'docentes.apellido1','docentes.apellido2',
                                                    'docentes.nombre')
                                                    ->where('horarios.dia', '=','Viernes')
                                                    ->orderBy('id')
                                                    ->get();

        return View('/alumno/Horario')->with(['horarios' => $horarios, 'horariosMartes' => $horariosMartes,
                                              'horariosMiercoles' => $horariosMiercoles,
                                              'horariosJueves' => $horariosJueves,
                                              'horariosViernes' => $horariosViernes
                                              ]);
    }

}

