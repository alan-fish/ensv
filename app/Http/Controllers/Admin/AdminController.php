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
use DB;

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

    public function create(Request $request)
    {
        $grupos = Grupo::all();
        $licenciaturas = Licenciatura::all();

        return view ('/admin/registro-alumno')->with(['licenciaturas'=> $licenciaturas,  'grupos' => $grupos]);
    }

    public function store(AdminRequest $request)
    {
        $grupos = Grupo::all();
        $licenciaturas = Licenciatura::all();
        $data = request()->all();

         Alumno::create([
        'apellido1' => $data['apellido1'],
        'apellido2' => $data['apellido2'],
        'nombre' => $data['nombre'],
        'matricula' => $data['matricula'],
        'sexo' => $data['sexo'],
        'curp' => $data['curp'],
        'licenciatura_id' => $data['licenciatura_id'],
        'grupo_id' => $data['grupo_id'],
        'email' => $data['email'],
        'password' => bcrypt($data['password'])
       ]);

       $message="Alumno registrado exitosamente";
       return view ('/admin/registro-alumno',compact('message'))->with(['licenciaturas'=> $licenciaturas,  'grupos' => $grupos]);
    }


    public function lista(Request $request)
    {   
        $grupos = Grupo::all();

        $name = $request->get('buscar_nombre');
        $matricula = $request->get('buscar_matricula');
        $grupo = $request->get('buscar_grupo');

        if((isset ($name))){
            $alumnos = Alumno::nombres($name)->paginate(4);
            return view('/admin/lista-alumno',['grupos' => $grupos])->with('alumnos', $alumnos);
        }
        if((isset ($matricula))){
            $alumnos = Alumno::matriculas($matricula)->paginate(4);
            return view('/admin/lista-alumno',['grupos' => $grupos])->with('alumnos', $alumnos);
        }
        if((isset ($grupo))){
            $alumnos = Alumno::grupos($grupo)->paginate(4);
            return view('/admin/lista-alumno',['grupos' => $grupos])->with('alumnos', $alumnos);
        }
        return view('/admin/lista-alumno',['grupos' => $grupos]);
    }
   

    public function editalumno (Request $request, $id)
    {
       $grupos = Grupo::all();
       $licenciaturas = Licenciatura::all();

       $alumno = Alumno::findOrFail($id);
       $alum = $alumno->alum;
       $alumnoLicenciatura = $alumno->alumnoLicenciatura;
        
        return view('/admin/edit-alumno', compact('alumno','alum', 'alumnoLicenciatura'))->with(['licenciaturas'=> $licenciaturas,  
                                                                                                'grupos' => $grupos]);
    }

    public function  updatealumno(AdminRequest1 $request, $id)
    {   
        //En esta función necesito checar las reglas y sus mensajes
        $datosalumno= request()->except(['_token', '_method', 'password']);

        Alumno::where('id', '=', $id)->update( $datosalumno);
        $message="Información actualizada correctamente";

        $alumno = Alumno::findOrFail($id);
        //Este es la manera en como puedo llamar a las relaciones para actualizar
        //Para consultar su grupo
        $alum = $alumno->alum;
        //Para consultar su licenciatura
        $alumnoLicenciatura = $alumno->alumnoLicenciatura;
        $grupos = Grupo::all();
        $licenciaturas = Licenciatura::all();
        
        return view('/admin/edit-alumno',compact('message'))->with(['alumno'=> $alumno,'alum' =>$alum, 'alumnoLicenciatura' => $alumnoLicenciatura,  
                                                                    'grupos' => $grupos, 'licenciaturas'=> $licenciaturas,]);

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

    public function getMaterias($licenciaturas_id,$semestre ){

        return Materia::where('licenciatura_id', $licenciaturas_id)
                        ->where('semestre', $semestre)
                        ->get();
 
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
        return view ('admin.consultarhorario',['ciclos'=> $ciclos, 'grupos' => $grupos, 'licenciaturas'=> $licenciaturas])
                    ->with('horarios', $horarios);
        }
        else{
            return view ('admin.consultarhorario',['ciclos'=> $ciclos, 'grupos' => $grupos, 'licenciaturas'=> $licenciaturas]);
        }
        
    }
    //Datos para cada carrera 
    public function createLicenciatura(Request $request)
    {
        $licenciaturas = Licenciatura::all();
        return view ('/admin/datosLicenciatura')->with('licenciaturas', $licenciaturas);
    }

    public function storeLicenciatura(Request $request)
    {   
        //Para el ciclo
        $cic =$request->get('ciclo');
        //Para el grupo
        $grp =$request->get('grupo');
        //Para la licenciatura
        $licen = $request->get('licenciatura');
        //Para la materias con sus licenciatura y semestre
        $licen_id = $request->get('licenciatura_id');
        $mate = $request->get('materia');
        $sem = $request->get('semestre');
        

        
        if((isset ($cic))){
            ciclo::create(['ciclo' => $cic]);
            return redirect()->route('admin.createLicenciatura')->with('info', '¡Ciclo escolar guardado correctamente!');
        }
        if((isset ($grp))){
            grupo::create(['grupo' => $grp]);
            return redirect()->route('admin.createLicenciatura')->with('info', '¡Grupo guardado correctamente!');
        }
        if((isset ($licen))){
            Licenciatura::create(['carrera' => $licen]);
            return redirect()->route('admin.createLicenciatura')->with('info', '¡Licenciatura guardada correctamente!');
        }
        if((isset ($licen_id)) && (isset ($mate)) && (isset ($sem)) ){
            Materia::create(['licenciatura_id' => $licen_id,
                             'materia' => $mate,
                             'semestre' => $sem]);
            return redirect()->route('admin.createLicenciatura')->with('info', '¡Materia guardada correctamente!'); 
        }
    }

    public function consultartDatosLicenciatura(Request $request)
    {   

        //Para el ciclo
        $consulta =$request->get('buscarConsulta');
        
        if($consulta == 'Ciclo'){
            $ciclos = Ciclo::paginate(4);            
            return view ('admin/consultarDatos')->with(['ciclos' => $ciclos]);
        }

        if($consulta == 'Grupo'){
            $grupos = Grupo::paginate(4);
            return view ('admin/consultarDatos')->with(['grupos' => $grupos ]);;
        }

        if($consulta == 'Licenciatura'){
            $licenciaturas = Licenciatura::paginate(4);
            return view ('admin/consultarDatos')->with(['licenciaturas' => $licenciaturas]);
        }  
        if($consulta == 'Materias'){
            $materias = DB::table('licenciaturas')
                           ->join('materias', 'materias.licenciatura_id', '=', 'licenciaturas.id')
                           ->paginate(5);
            return view ('admin/consultarDatos')->with(['materias' => $materias]);
        }          
       
        return view ('admin/consultarDatos');
    
    }

    public function editDatos($id)
    {
        $ciclos = Ciclo::findOrFail($id);
        return view('/admin/editDatos')->with('ciclos', $ciclos);
    }

    public function  updateDatos(Request $request, $id)
    {
        $ciclo= request()->except(['_token', '_method']);
        
        Ciclo::where('id', '=', $id)->update( $ciclo);
        $message="Información actualizada correctamente";
        $ciclo = Ciclo::findOrFail($id);
        return view('/admin/editDatos',compact('message'))->with('ciclos', $ciclo);
    }

    public function editLic($id)
    {
        $licenciatura = Licenciatura::findOrFail($id);
        return view('/admin/editLic')->with('licenciatura', $licenciatura);
    }

    public function  updateLic(Request $request, $id)
    {
        $lic= request()->except(['_token', '_method']);
        
        Licenciatura::where('id', '=', $id)->update( $lic);
        $message="Información actualizada correctamente";
        $licenciatura = Licenciatura::findOrFail($id);
        return view('/admin/editLic',compact('message'))->with('licenciatura', $licenciatura);
    }

    public function editGrup($id)
    {
        $grupo = Grupo::findOrFail($id);
        return view('/admin/editGrup')->with('grupo', $grupo);
    }

    public function  updateGrup(Request $request, $id)
    {
        $grp= request()->except(['_token', '_method']);
        
        Grupo::where('id', '=', $id)->update( $grp);
        $message="Información actualizada correctamente";
        $grupo = Grupo::findOrFail($id);
        return view('/admin/editGrup',compact('message'))->with('grupo', $grupo);
    }


    public function editMat (Request $request, $id)
    {
       $licenciaturas = Licenciatura::all();

       $materia = Materia::findOrFail($id);
       $matLicenciatura = $materia->licen;
    
        return view('/admin/editMat', compact('materia','matLicenciatura'))->with('licenciaturas', $licenciaturas);
    }

    public function  updateMat(Request $request, $id)
    {   
        //En esta función necesito checar las reglas y sus mensajes
        $datosMat= request()->except(['_token', '_method']);

        Materia::where('id', '=', $id)->update( $datosMat);
        $message="Información actualizada correctamente";

        $materia = Materia::findOrFail($id);
        //Ento al modelo para buscar la funcion que contiene la relacion de la licenciatura
        $matLicenciatura = $materia->licen;
        //Hago otra vez la consulta pra mandar la información de dicha consulta otra vez a la vista
        $licenciaturas = Licenciatura::all();
        
        return view('/admin/editMat',compact(['message','materia','matLicenciatura']))->with('licenciaturas',$licenciaturas);

    }

}

