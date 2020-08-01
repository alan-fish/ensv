<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminRequest1;
use App\Http\Requests\AdminDocenteRequest;

use App\Docente;
use App\Alumno;
use App\Admin;
use App\Ciclo;
use App\Grupo;
use App\Materia;
use App\Horario;
use App\Licenciatura;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function menu()
    {
        return view('/admin/menu');
    }
//Alumno

    public function create()
    {
        return view ('/admin/registro-alumno');
    }

    public function store(AdminRequest $request)
    {

        $data = request()->all();

         Alumno::create([
        'apellido1' => $data['apellido1'],
        'apellido2' => $data['apellido2'],
        'nombre' => $data['nombre'],
        'matricula' => $data['matricula'],
        'sexo' => $data['sexo'],
        'curp' => $data['curp'],
        'licenciatura' => $data['licenciatura'],
        'grupo' => $data['grupo'],
        'email' => $data['email'],
        'password' => bcrypt($data['password'])

       ]);
       $message="Alumno registrado exitosamente";
       return view ('/admin/registro-alumno',compact('message'));
    }


    public function lista(Request $request)
    {
        $name = $request->get('buscar_nombre');
        $matricula = $request->get('buscar_matricula');
        $grupo = $request->get('buscar_grupo');
       
        $alumnos = Alumno::nombres($name)->grupos($grupo)->matriculas($matricula)->paginate(4);

        return view('/admin/lista-alumno')->with('alumnos', $alumnos);        
    }
   

    public function editalumno($id)
    {
        $alumno = Alumno::findOrFail($id);
       
        return view('/admin/edit-alumno')->with('alumno', $alumno);
    }

    public function  updatealumno(AdminRequest1 $request, $id)
    {
        $datosalumno= request()->except(['_token', '_method', 'password']);
        
        Alumno::where('id', '=', $id)->update( $datosalumno);

        $alumno = Alumno::findOrFail($id);
        $message="Información actualizada correctamente";
        return view('/admin/edit-alumno',compact('message'))->with('alumno', $alumno);
    }

//Docente
    public function createdocente()
    {
        return view ('/admin/registro-docente');
    }

    public function storedocente(AdminDocenteRequest $request)
    {

        $datadocente = request()->all();

         Docente::create([
        'apellido1' => $datadocente['apellido1'],
        'apellido2' => $datadocente['apellido2'],
        'nombre' => $datadocente['nombre'],
        'estado' => $datadocente['estado'],
        'fecha_ingreso' => $datadocente['fecha_ingreso'],
        'licenciatura' => $datadocente['licenciatura'],
        'licenciatura1' => $datadocente['licenciatura1'],
        'licenciatura2' => $datadocente['licenciatura2'],
        'maestria' => $datadocente['maestria'],
        'maestria1' => $datadocente['maestria1'],
        'maestria2' => $datadocente['maestria2'],
        'doctorado' => $datadocente['doctorado'],
        'doctorado1' => $datadocente['doctorado1'],
        'doctorado2' => $datadocente['doctorado2'],
        'tipo_de_contratacion' => $datadocente['tipo_de_contratacion'],
        'email' => $datadocente['email'],
        'password' => bcrypt($datadocente['password'])

       ]);
       $message="Docente registrado exitosamente";
       return view ('/admin/registro-docente',compact('message'));
    }

    public function list(Request $request)
    {
        $name = $request->get('buscar_nombre');
        $estado = $request->get('buscar_estado');

        $docentes = Docente::nombres($name)->estado($estado)->paginate(4);
         return view('/admin/list')->with('docentes', $docentes); 
    }


    public function edit_docente($id)
    {
        $docentes = Docente::findOrFail($id);
       
        return view('/admin/edit-docente')->with('docentes', $docentes);
    }

/*Tengo que hacer el request para este metodo*/

    public function  update_docente(Request $request, $id)
    {
        $datos_docente= request()->except(['_token', '_method', 'password']);
        
        Docente::where('id', '=', $id)->update( $datos_docente);
        $message="Información actualizada correctamente";
        $docentes = Docente::findOrFail($id);
        return view('/admin/edit-docente',compact('message'))->with('docentes', $docentes);
    }

//Horarios

    public function horario()
    {
        $licenciaturas = Licenciatura::all();
        $ciclos = Ciclo::all();
        $grupos = Grupo::all();
        //$materias = Materia::all();
        $docentes = Docente::all();

        return view ('admin.horario')->with(['licenciaturas'=> $licenciaturas, 'ciclos'=> $ciclos, 'grupos' => $grupos,
                                             'docentes' => $docentes]);
     
    }

    public function getMaterias($licenciaturas_id){
    
        return Materia::where('licenciatura_id', $licenciaturas_id)->get();
 
    }

    public function createhorario(Request $request)
    {   

        $horario = request()->all();
        
           horario::create([
           'licenciatura_id' => $horario ['licenciatura_id'],
           'ciclo_id' => $horario ['ciclo_id'],
           'grupo_id' => $horario ['grupo_id'],
           'dia' => $horario ['dia'],
           'hora' => $horario ['hora'],
           'materia_id' => $horario ['materia_id'],
           'docente_id' => $horario ['docente_id'],
           ]);

        return redirect()->route('admin.horario')->with('info', '¡Horario creado exitosamente!');
    }

    public function consultarhorario(Request $request)
    {   
        $ciclos = Ciclo::all();
        $grupos = Grupo::all();
        $licenciaturas = Licenciatura::all();

          $cic =$request->get('c');
          $grp =$request->get('g');
          $carrera =$request->get('carrera');

        if((isset ($cic)) && (isset ($grp)) && (isset ($carrera)) ){
        $data = [$cic, $grp, $carrera];
        $horarios = Horario::horarios($data)->paginate(10);
        return view ('admin.consultarhorario',['ciclos'=> $ciclos, 'grupos' => $grupos, 'licenciaturas'=> $licenciaturas])->with('horarios', $horarios);
        }
        else{
            return view ('admin.consultarhorario',['ciclos'=> $ciclos, 'grupos' => $grupos, 'licenciaturas'=> $licenciaturas]);
        }
        
    }

}

