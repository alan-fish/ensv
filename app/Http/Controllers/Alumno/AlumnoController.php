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
use App\Pregunta;
use App\Docente;
use App\Resultado;
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
    public function horarioAlumno($id,$lic)
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
                            ->where('horarios.licenciatura_id', '=',$lic)
                            ->orderBy('id')
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
                            ->where('horarios.licenciatura_id', '=',$lic)
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
                            ->where('horarios.licenciatura_id', '=',$lic)
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
                            ->where('horarios.licenciatura_id', '=',$lic)
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
                                                    ->where('horarios.licenciatura_id', '=',$lic)
                                                    ->orderBy('id')
                                                    ->get();

        return View('/alumno/Horario')->with(['horarios' => $horarios, 'horariosMartes' => $horariosMartes,
                                              'horariosMiercoles' => $horariosMiercoles,
                                              'horariosJueves' => $horariosJueves,
                                              'horariosViernes' => $horariosViernes
                                              ]);
    }



    public function evaluacion($id, $lic)
    {
        //Tengo que checar que no se repitan los grupos con las licenciaturas estoy poniendo los filtros, pero debo de tener cuidado con eso 
        //Para que no se repitan, igual debo de corregir el inicio de sesión la matrícula o el correo de los alumnos
        //Tengo que ver que no se repitan muchas veces los nombres de los docentes de la tabla de horarios, o tendré que hacer una tabla

        $evaluar = Horario::where('grupo_id', '=', $id)
                    ->join('licenciaturas', 'horarios.licenciatura_id', '=', 'licenciaturas.id')
                    ->join('ciclos', 'horarios.ciclo_id', '=', 'ciclos.id')
                    ->join('grupos', 'horarios.grupo_id', '=', 'grupos.id')
                    ->join('materias', 'horarios.materia_id', '=', 'materias.id')
                    ->join('docentes', 'horarios.docente_id', '=', 'docentes.id')
                    ->where('horarios.licenciatura_id', '=',$lic)
                    ->select('docentes.apellido1','docentes.apellido2',
                            'docentes.nombre', 'docentes.id')
                    ->groupBy('docentes.apellido1','docentes.apellido2',
                    'docentes.nombre', 'docentes.id')
                    ->havingRaw('count(horarios.docente_id) > ?', [0])
                    ->get();

        //return $evaluar;
        return view('/alumno/evaluacionListaDocentes')->with('evaluar' , $evaluar);   
    }

    public function getPreguntas(){

        return Pregunta::join('categorias', 'preguntas.categoria_id', '=', 'categorias.id')
                            ->select('categorias.id', 'preguntas.pregunta','categorias.categoria')
                            ->where('categorias.id', '=', '1')
                            ->get();
 
    }

    public function getPreguntas2(){

        return Pregunta::join('categorias', 'preguntas.categoria_id', '=', 'categorias.id')
                            ->select('categorias.id', 'preguntas.pregunta','categorias.categoria')
                            ->where('categorias.id', '=', '2')
                            ->get();
 
    }
        
    public function getPreguntas3(){

        return Pregunta::join('categorias', 'preguntas.categoria_id', '=', 'categorias.id')
                            ->select('categorias.id', 'preguntas.pregunta','categorias.categoria')
                            ->where('categorias.id', '=', '3')
                            ->get();

    }
  
    public function getPreguntas4(){

        return Pregunta::join('categorias', 'preguntas.categoria_id', '=', 'categorias.id')
                            ->select('categorias.id', 'preguntas.pregunta','categorias.categoria')
                            ->where('categorias.id', '=', '4')
                            ->get();
 
    }

    public function getPreguntas5(){

        return Pregunta::join('categorias', 'preguntas.categoria_id', '=', 'categorias.id')
                            ->select('categorias.id', 'preguntas.pregunta','categorias.categoria')
                            ->where('categorias.id', '=', '5')
                            ->get();
 
    }
    
    public function evaluacionDocente($id, $grupo)
    {   

        //IMPORTANTE todo los cambios realizados en evaluacionDocente y storeEvaluacionDocente pegarlos en los demás metodos
        //CON RESPECTO A SUS DATOS

        //Esto solo aplica cuando un docente ya ha sido evaluado una vez por un alumno de un grupo en esta categoría
        //Entonces para evitar que si se realizará la evaluación por primera vez, tenga que verificar si hay un registo o no
        // Si es el caso de que hay un registro se realiza la consulta de caso contrario se manda con un valor cero
        //La variable resultado hace la busqueda en si ya se hizo dicha evaluación

        $resultado = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                    ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                    ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                    ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                    ->select('resultados.resultado')
                    ->where('categorias.id', '=', '1')
                    ->where('docentes.id', '=', $id)
                    ->where('grupos.id', '=', $grupo)
                    ->first();
        
        //La diferencia entre el if y el else es que dentro del if se manda como valor predeterminado 0, mientras que 
        //en el else se le mandará si hay ya un valor existente
        if ($resultado === null) { 
            $resultadoTemporal= 0;
            $docente = Docente::select('docentes.apellido1','docentes.apellido2','docentes.nombre', 'docentes.id')
                                ->where('docentes.id', '=', $id)
                                ->get();
            return view('/alumno/cuestionario1')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
           //return ['ha entrado al if',$resultado];
           
        }else{
            $docente = Docente::select('docentes.apellido1','docentes.apellido2','docentes.nombre', 'docentes.id')
            ->where('docentes.id', '=', $id)
            ->get();
            return view('/alumno/cuestionario1')->with(['resultado' => $resultado , 'docente' => $docente] ); 
        }
    }

    public function storeEvaluacionDocente(Request $request)
    {
        $data = request()->all();

        $datos= request()->except(['_token', '_method','grupo_id', 'docente_id', 'resultadoAnterior' ]);

        $respuestas = count($datos);
        
        //Hacer if para cada tipo de pregunta

        if($respuestas == 1 ){
            $resultado = $datos[0];
        }

        if($respuestas == 2){
            $resultado = $datos[0]+$datos[1];
        }
        
        if($respuestas == 3 ){
            $resultado = $datos[0]+$datos[1]+$datos[2];
        }

        if($respuestas == 4 ){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3];
        }
        if($respuestas == 5){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4];
        }
        if($respuestas == 6){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5];
        }
        if($respuestas == 7){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6];
        }
        if($respuestas == 8){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7];
        }
        if($respuestas == 9){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8];
        }
        if($respuestas == 10){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9];
        }
        if($respuestas == 11){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                         +$datos[10];
        }
        if($respuestas == 12){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11];
        }
        if($respuestas == 13){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12];
        }
        if($respuestas == 14){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13];
        }
        if($respuestas == 15){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14];
         
        }
        if($respuestas == 16){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14]+$datos[15];
        }

        $docente = $data['docente_id'];
        $grupo = $data['grupo_id'];
        $resultadoAnterior =$data['resultadoAnterior'];

        /* Antes de hacer este create debo de verificar si ya hay un registro de esta evaluación con 
            el docente, grupo y ciclo, en el caso de que no exista un registro se crea de caso contrario
            se actualiza la consulta si arroja verdadero a esa consulta */

        //De igual manera se debe de checar lo de hacer referencia al ciclo id o al ciclo como tal del cual se hace la 
        //evaluación haciendo que corresponda a dicho ciclo escolar

        // Con esto ya lo puedo pasar a las demás vistas    
        $verificar = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                    ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                    ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                    ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                    ->select('resultados.id')
                    ->where('categorias.id', '=', '1')
                    ->where('docentes.id', '=', $docente)
                    ->where('grupos.id', '=', $grupo)
                    ->first();

        if ($verificar === null) { 
            Resultado::create([
                        'resultado' => $resultado,
                        'categoria_id' => '1',
                        'ciclo_id' => '1',
                        'grupo_id' => $data['grupo_id'],
                        'docente_id' => $data['docente_id'],
                        ]);
            //Si se crea se debe de hacer una preconsulta de la siguiente categoría pasa saber si dicha categoria
            //Ya tienen una evaluación hecha
            $resultadoExistente = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                            ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                            ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                            ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                            ->select('resultados.resultado')
                            ->where('categorias.id', '=', '2')
                            ->where('docentes.id', '=', $docente)
                            ->where('grupos.id', '=', $grupo)
                            ->first();

            if ($resultadoExistente === null) { 
                $resultadoTemporal = 0;
                return view('/alumno/cuestionario2')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
            }else{
                return view('/alumno/cuestionario2')->with(['resultadoExistente' => $resultadoExistente , 'docente' => $docente] ); 
            }                

        } else {
            $resultadoAcutalizado = $resultadoAnterior + $resultado;

            Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                        ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                        ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                        ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                        ->where('categorias.id', '=', '1')
                        ->where('docentes.id', '=', $docente)
                        ->where('grupos.id', '=', $grupo)
                        ->update(['resultados.resultado'=>$resultadoAcutalizado]);

            $resultadoExistente = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                        ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                        ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                        ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                        ->select('resultados.resultado')
                        ->where('categorias.id', '=', '2')
                        ->where('docentes.id', '=', $docente)
                        ->where('grupos.id', '=', $grupo)
                        ->first();

            if ($resultadoExistente === null) { 
                    $resultadoTemporal = 0;
                    return view('/alumno/cuestionario2')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
            }else{
                    return view('/alumno/cuestionario2')->with(['resultadoExistente' => $resultadoExistente , 'docente' => $docente] ); 
            }   
    
        }                  
       
                    
    }


    public function storeEvaluacionDocente2(Request $request)
    {
        $data = request()->all();

        $datos= request()->except(['_token', '_method','grupo_id', 'docente_id', 'resultadoAnterior' ]);

        $respuestas = count($datos);
        
        //Hacer if para cada tipo de pregunta
        if($respuestas == 1 ){
            $resultado = $datos[0];
        }

        if($respuestas == 2){
            $resultado = $datos[0]+$datos[1];
        }
        
        if($respuestas == 3 ){
            $resultado = $datos[0]+$datos[1]+$datos[2];
        }
        if($respuestas == 4 ){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3];
             return $resultado;
        }
        if($respuestas == 5){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4];
            return $resultado;
        }
        if($respuestas == 6){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5];
            return $resultado;
        }
        if($respuestas == 7){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6];
            return $resultado;
        }
        if($respuestas == 8){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7];
            return $resultado;
        }
        if($respuestas == 9){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8];
            return $resultado;
        }
        if($respuestas == 10){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9];
            return $resultado;
        }
        if($respuestas == 11){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                         +$datos[10];
            return $resultado;
        }
        if($respuestas == 12){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11];
            return $resultado;
        }
        if($respuestas == 13){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12];
            return $resultado;
        }
        if($respuestas == 14){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13];
        }
        if($respuestas == 15){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14];
         
        }
        if($respuestas == 16){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14]+$datos[15];
        }

        $docente = $data['docente_id'];
        $grupo = $data['grupo_id'];
        $resultadoAnterior =$data['resultadoAnterior'];

        $verificar = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                    ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                    ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                    ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                    ->select('resultados.id')
                    ->where('categorias.id', '=', '2')
                    ->where('docentes.id', '=', $docente)
                    ->where('grupos.id', '=', $grupo)
                    ->first();

        if ($verificar === null) { 
            Resultado::create([
                        'resultado' => $resultado,
                        'categoria_id' => '2',
                        'ciclo_id' => '1',
                        'grupo_id' => $data['grupo_id'],
                        'docente_id' => $data['docente_id'],
                        ]);
            //Si se crea se debe de hacer una preconsulta de la siguiente categoría pasa saber si dicha categoria
            //Ya tienen una evaluación hecha
           $resultadoExistente = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                                        ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                                        ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                                        ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                                        ->select('resultados.resultado')
                                        ->where('categorias.id', '=', '3')
                                        ->where('docentes.id', '=', $docente)
                                        ->where('grupos.id', '=', $grupo)
                                        ->first();
            
            if ($resultadoExistente === null) { 
                $resultadoTemporal = 0;
                return view('/alumno/cuestionario3')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
            }else{
                return view('/alumno/cuestionario3')->with(['resultadoExistente' => $resultadoExistente , 'docente' => $docente] ); 
            }                
            } else {
                $resultadoAcutalizado = $resultadoAnterior + $resultado;
            
                Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                            ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                            ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                            ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                            ->where('categorias.id', '=', '2')
                            ->where('docentes.id', '=', $docente)
                            ->where('grupos.id', '=', $grupo)
                            ->update(['resultados.resultado'=>$resultadoAcutalizado]);
                //Si se crea se debe de hacer una preconsulta de la siguiente categoría pasa saber si dicha categoria
                //Ya tienen una evaluación hecha
                $resultadoExistente = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                                                ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                                                ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                                                ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                                                ->select('resultados.resultado')
                                                ->where('categorias.id', '=', '3')
                                                ->where('docentes.id', '=', $docente)
                                                ->where('grupos.id', '=', $grupo)
                                                ->first();
            
                if ($resultadoExistente === null) { 
                    $resultadoTemporal = 0;
                    return view('/alumno/cuestionario3')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
                }else{
                    return view('/alumno/cuestionario3')->with(['resultadoExistente' => $resultadoExistente , 'docente' => $docente] ); 
                }   
                
            } 
    }

    public function storeEvaluacionDocente3(Request $request)
    {
        $data = request()->all();

        $datos= request()->except(['_token', '_method','grupo_id', 'docente_id', 'resultadoAnterior' ]);

        $respuestas = count($datos);
        
        
        //Hacer if para cada tipo de pregunta
        if($respuestas == 1 ){
            $resultado = $datos[0];
        }

        if($respuestas == 2){
            $resultado = $datos[0]+$datos[1];
        }
        
        if($respuestas == 3 ){
            $resultado = $datos[0]+$datos[1]+$datos[2];
        }
        if($respuestas == 4 ){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3];
             return $resultado;
        }
        if($respuestas == 5){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4];
            return $resultado;
        }
        if($respuestas == 6){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5];
            return $resultado;
        }
        if($respuestas == 7){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6];
            return $resultado;
        }
        if($respuestas == 8){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7];
            return $resultado;
        }
        if($respuestas == 9){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8];
            return $resultado;
        }
        if($respuestas == 10){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9];
            return $resultado;
        }
        if($respuestas == 11){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                         +$datos[10];
            return $resultado;
        }
        if($respuestas == 12){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11];
            return $resultado;
        }
        if($respuestas == 13){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12];
            return $resultado;
        }
        if($respuestas == 14){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13];
        }
        if($respuestas == 15){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14];
         
        }
        if($respuestas == 16){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14]+$datos[15];
        }

        $docente = $data['docente_id'];
        $grupo = $data['grupo_id'];
        $resultadoAnterior =$data['resultadoAnterior'];

        $verificar = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                    ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                    ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                    ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                    ->select('resultados.id')
                    ->where('categorias.id', '=', '3')
                    ->where('docentes.id', '=', $docente)
                    ->where('grupos.id', '=', $grupo)
                    ->first();

        if ($verificar === null) { 
            Resultado::create([
                        'resultado' => $resultado,
                        'categoria_id' => '3',
                        'ciclo_id' => '1',
                        'grupo_id' => $data['grupo_id'],
                        'docente_id' => $data['docente_id'],
                        ]);
            //Si se crea se debe de hacer una preconsulta de la siguiente categoría pasa saber si dicha categoria
            //Ya tienen una evaluación hecha
            $resultadoExistente = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                                            ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                                            ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                                            ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                                            ->select('resultados.resultado')
                                            ->where('categorias.id', '=', '4')
                                            ->where('docentes.id', '=', $docente)
                                            ->where('grupos.id', '=', $grupo)
                                            ->first();
                        
                if ($resultadoExistente === null) { 
                    $resultadoTemporal = 0;
                    return view('/alumno/cuestionario4')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
                }else{
                    return view('/alumno/cuestionario4')->with(['resultadoExistente' => $resultadoExistente , 'docente' => $docente] ); 
                }

            } else {
                $resultadoAcutalizado = $resultadoAnterior + $resultado;
                        
                Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                            ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                            ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                            ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                            ->where('categorias.id', '=', '3')
                            ->where('docentes.id', '=', $docente)
                            ->where('grupos.id', '=', $grupo)
                            ->update(['resultados.resultado'=>$resultadoAcutalizado]);
                //Si se crea se debe de hacer una preconsulta de la siguiente categoría pasa saber si dicha categoria
                //Ya tienen una evaluación hecha
                $resultadoExistente = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                                                ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                                                ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                                                ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                                                ->select('resultados.resultado')
                                                ->where('categorias.id', '=', '4')
                                                ->where('docentes.id', '=', $docente)
                                                ->where('grupos.id', '=', $grupo)
                                                ->first();
                        
                    if ($resultadoExistente === null) { 
                            $resultadoTemporal = 0;
                            return view('/alumno/cuestionario4')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
                    }else{
                            return view('/alumno/cuestionario4')->with(['resultadoExistente' => $resultadoExistente , 'docente' => $docente] ); 
                    }                   
            }    
                  
    }

    public function storeEvaluacionDocente4(Request $request)
    {
        $data = request()->all();

        $datos= request()->except(['_token', '_method','grupo_id', 'docente_id', 'resultadoAnterior' ]);

        $respuestas = count($datos);
        
        //Hacer if para cada tipo de pregunta
        if($respuestas == 1 ){
            $resultado = $datos[0];
        }

        if($respuestas == 2){
            $resultado = $datos[0]+$datos[1];
        }
        
        if($respuestas == 3 ){
            $resultado = $datos[0]+$datos[1]+$datos[2];
        }
        if($respuestas == 4 ){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3];
             return $resultado;
        }
        if($respuestas == 5){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4];
            return $resultado;
        }
        if($respuestas == 6){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5];
            return $resultado;
        }
        if($respuestas == 7){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6];
            return $resultado;
        }
        if($respuestas == 8){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7];
            return $resultado;
        }
        if($respuestas == 9){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8];
            return $resultado;
        }
        if($respuestas == 10){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9];
            return $resultado;
        }
        if($respuestas == 11){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                         +$datos[10];
            return $resultado;
        }
        if($respuestas == 12){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11];
            return $resultado;
        }
        if($respuestas == 13){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12];
            return $resultado;
        }
        if($respuestas == 14){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13];
        }
        if($respuestas == 15){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14];
         
        }
        if($respuestas == 16){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14]+$datos[15];
        }

        $docente = $data['docente_id'];
        $grupo = $data['grupo_id'];
        $resultadoAnterior =$data['resultadoAnterior'];

        $verificar = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                    ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                    ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                    ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                    ->select('resultados.id')
                    ->where('categorias.id', '=', '4')
                    ->where('docentes.id', '=', $docente)
                    ->where('grupos.id', '=', $grupo)
                    ->first();

                    if ($verificar === null) { 
                        Resultado::create([
                                    'resultado' => $resultado,
                                    'categoria_id' => '4',
                                    'ciclo_id' => '1',
                                    'grupo_id' => $data['grupo_id'],
                                    'docente_id' => $data['docente_id'],
                                    ]);
                        //Si se crea se debe de hacer una preconsulta de la siguiente categoría pasa saber si dicha categoria
                        //Ya tienen una evaluación hecha
                        $resultadoExistente = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                                                        ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                                                        ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                                                        ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                                                        ->select('resultados.resultado')
                                                        ->where('categorias.id', '=', '5')
                                                        ->where('docentes.id', '=', $docente)
                                                        ->where('grupos.id', '=', $grupo)
                                                        ->first();
                                    
                            if ($resultadoExistente === null) { 
                                $resultadoTemporal = 0;
                                return view('/alumno/cuestionario5')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
                            }else{
                                return view('/alumno/cuestionario5')->with(['resultadoExistente' => $resultadoExistente , 'docente' => $docente] ); 
                            }
            
                        } else {
                            $resultadoAcutalizado = $resultadoAnterior + $resultado;
                                    
                            Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                                        ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                                        ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                                        ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                                        ->where('categorias.id', '=', '4')
                                        ->where('docentes.id', '=', $docente)
                                        ->where('grupos.id', '=', $grupo)
                                        ->update(['resultados.resultado'=>$resultadoAcutalizado]);
                            //Si se crea se debe de hacer una preconsulta de la siguiente categoría pasa saber si dicha categoria
                            //Ya tienen una evaluación hecha
                            $resultadoExistente = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                                                            ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                                                            ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                                                            ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                                                            ->select('resultados.resultado')
                                                            ->where('categorias.id', '=', '5')
                                                            ->where('docentes.id', '=', $docente)
                                                            ->where('grupos.id', '=', $grupo)
                                                            ->first();
                                    
                                if ($resultadoExistente === null) { 
                                        $resultadoTemporal = 0;
                                        return view('/alumno/cuestionario5')->with(['resultadoTemporal' => $resultadoTemporal , 'docente' => $docente] ); 
                                }else{
                                        return view('/alumno/cuestionario5')->with(['resultadoExistente' => $resultadoExistente , 'docente' => $docente] ); 
                                }                   
                        }   
                 
    }

    public function storeEvaluacionDocente5(Request $request)
    {
        $data = request()->all();

        $datos= request()->except(['_token', '_method','grupo_id', 'docente_id', 'resultadoAnterior' ]);

        $respuestas = count($datos);
        
        
        //Hacer if para cada tipo de pregunta
        if($respuestas == 1 ){
            $resultado = $datos[0];
        }

        if($respuestas == 2){
            $resultado = $datos[0]+$datos[1];
        }
        
        if($respuestas == 3 ){
            $resultado = $datos[0]+$datos[1]+$datos[2];
        }
        if($respuestas == 4 ){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3];
             return $resultado;
        }
        if($respuestas == 5){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4];
            return $resultado;
        }
        if($respuestas == 6){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5];
            return $resultado;
        }
        if($respuestas == 7){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6];
            return $resultado;
        }
        if($respuestas == 8){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7];
            return $resultado;
        }
        if($respuestas == 9){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8];
            return $resultado;
        }
        if($respuestas == 10){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9];
            return $resultado;
        }
        if($respuestas == 11){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                         +$datos[10];
            return $resultado;
        }
        if($respuestas == 12){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11];
            return $resultado;
        }
        if($respuestas == 13){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12];
            return $resultado;
        }
        if($respuestas == 14){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13];
        }
        if($respuestas == 15){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14];
         
        }
        if($respuestas == 16){
            $resultado = $datos[0]+$datos[1]+$datos[2]+$datos[3]+$datos[4]+$datos[5]+$datos[6]+$datos[7]+$datos[8]+$datos[9]
                        +$datos[10]+$datos[11]+$datos[12]+$datos[13]+$datos[14]+$datos[15];
        }

        $docente = $data['docente_id'];
        $grupo = $data['grupo_id'];
        $resultadoAnterior =$data['resultadoAnterior'];

        $verificar = Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                    ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                    ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                    ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                    ->select('resultados.id')
                    ->where('categorias.id', '=', '5')
                    ->where('docentes.id', '=', $docente)
                    ->where('grupos.id', '=', $grupo)
                    ->first();

        if ($verificar === null) { 
            Resultado::create([
                            'resultado' => $resultado,
                            'categoria_id' => '5',
                            'ciclo_id' => '1',
                            'grupo_id' => $data['grupo_id'],
                            'docente_id' => $data['docente_id'],
                           ]);
            //return 'creado';
            return view('/alumno/menualumno');      
        } else {
            $resultadoAcutalizado = $resultadoAnterior+$resultado;
            Resultado::join('categorias', 'resultados.categoria_id', '=', 'categorias.id')
                        ->join('ciclos', 'resultados.ciclo_id', '=', 'ciclos.id' )
                        ->join('grupos', 'resultados.grupo_id', '=', 'grupos.id' )
                        ->join('docentes', 'resultados.docente_id', '=', 'docentes.id')
                        ->where('categorias.id', '=', '5')
                        ->where('docentes.id', '=', $docente)
                        ->where('grupos.id', '=', $grupo)
                        ->update(['resultados.resultado'=>$resultadoAcutalizado]);

           // return $resultadoAcutalizado;
           return view('/alumno/menualumno');     
        } 
                 
    }

    
}

