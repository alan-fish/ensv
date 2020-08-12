@extends('layouts.admin-vistas')

@section('content')

     <!--Navbar-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="{{ route('admin.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
            </a>  
            <a class="navbar-brand" href="{{ route('admin.menu') }}">ENSV</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active ">
                <a class="nav-link" href="{{ route('admin.menu') }}"><b>INICIO</b></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b> DOCENTE</b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.list') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar docentes</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.createdocente') }}">
                        <i class="fas fa-sign-in-alt"></i> Registar docente</a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b> ALUMNO </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.lista') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar alumno</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.create') }}">
                        <i class="fas fa-sign-in-alt"></i> Registo alumno</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>  HORARIO </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.consultarhorario') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i>Crear horario</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                    <b> EVALUACIÓN DOCENTE
                    </b>
                    </a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a href="#" class="nav-link" >
                        {{ Auth::user()->nombre }} 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" class="nav-link"><i class="fas fa-power-off"></i> Cerrar sesión</a>
                    </li>  
                    </ul>
            </div>
        </div>
     </nav>


<div class="container" id="container-resgistroalumno">
  
    <link rel="stylesheet" href="{{ asset('css/horari.css') }}" />
    <script src="{{ asset('js/horariojs.js') }}"></script>
   


    <div class="row justify-content-md-center">
        <div class="col-sm-10">
        @if(session('info'))  
        <div  class="alert alert-success alert-dismissible fade show">
            {{session('info')}}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>                              
        @endif   
            <div class="card mb-4 shadow-sm">
            <div class="card-header">
            <h4 class="my-0 font-weight-normal"><b>CREAR HORARIO</b></h4>
            @include ('layouts.error')
            </div>
            
            <div class="card-body">
                
                  <div id="div_registro" class="form-group row">
                        <label for="licenciatura" class="col-form-label col-md-4">Selecciona una licenciatura</label>
                         <div class="col-md-8">
                        <label>  
                        <select style="width:280px" class="select-css" id="licenciatura" >
                            <option selected="true" disabled="disabled"></option>
                            @foreach($licenciaturas as $licenciatura)
                            <option value="{{$licenciatura->id}}">
                            {{$licenciatura->carrera}}
                                </option>
                            @endforeach
                        </select></label>
                        </div>

                    </div>

                    <div id="div_registro" class="form-group row">
                        <label for="semestre" class="col-form-label col-md-4">Selecciona un semestre</label>
                        <div class="col-sm-8">
                        <label>
                        <select style="width:280px" class="select-css" id="semestre" >
                            <option selected="true" disabled="disabled" value>Semestre</option>
                            <option value="Primero">Primer semestre</option>
                            <option value="Segundo">Segundo semestre</option>
                            <option value="Tercero">Tercer semestre</option>
                            <option value="Cuarto">Cuarto semestre</option>
                            <option value="Quinto">Quinto semestre</option>
                            <option value="Sexto">Sexto semestre</option>
                            <option value="Septimo">Séptimo semestre</option>
                            <option value="Octavo">Octavo semestre</option>
                            <option value="Noveno">Noveno semestre</option>     
                        </select></label>
                        </div>

                    </div>


            <div id="div_registro" class="form-group row">
                <label for="ciclo" class="col-form-label col-md-4">Selecciona el ciclo</label>
                <div class="col-md-8">
                <label>
                <select name="ciclo_id" style="width:280px" class="select-css" id="ciclo" onchange="ciclo();">
                    <option selected="true" disabled="disabled">Ciclo...</option>
                    @foreach($ciclos as $ciclo)
                       <option value="{{$ciclo->id}}">
                       {{$ciclo->ciclo}}
                        </option>
                    @endforeach
                </select></label>
                </div>
            </div>
    
            <div id="div_registro" class="form-group row">
                <label for="grupo" class="col-form-label col-md-4">Selecciona un grupo</label>
                <div class="col-md-8">
                <label>
                <select name="grupo_id" style="width:280px" class="select-css" id="grupo" onchange="grupo();">
                    <option selected="true" disabled="disabled">Grupos ...</option>
                    @foreach($grupos as $grupo)
                       <option value="{{$grupo->id}}">
                       {{$grupo->grupo}}
                        </option>
                    @endforeach
                </select></label>
                </div>
            </div>

            <div  id="div_registro" class="form-group row">
                 <label for="dia" class="col-form-label col-md-4">Selecciona el día</label>
                 <div class="col-md-8">
                 <label>
                 <select name='dia' style="width:280px" class="select-css" id="dia" onchange="dia();">
                    <option selected="true" disabled="disabled">Día ...</option>
                    <option>Lunes</option>
                    <option>Martes</option>
                    <option>Miercoles</option>
                    <option>Jueves</option>
                    <option>Viernes</option>
                </select></label>
                </div>
            </div>

            <div id="div_registro" class="form-group row">
                <label for="hora" class="col-form-label col-md-4">Selecciona la hora</label>
                <div class="col-md-8">
                <label>
                <select  style="width:280px" class="select-css" id="hora" onchange="hora();">
                    <option selected="true" disabled="disabled">Horas...</option>
                    <option>8:00-10:00</option>
                    <option>10:30-12:30</option>
                    <option>12:30-14:30</option>
                    <option>15:00-17:00</option>
                </select></label>
                </div>
            </div>
    
            <div id="div_registro" class="form-group row">
                <label for="materia" class="col-form-label col-md-4">Selecciona la materia</label>
                <div class="col-md-8">
                <label>
                <select name='materia_id' style="width:280px" class="select-css" id="materia" onchange="materia();">

                </select></label>
                </div>
            </div>

            <div id="div_registro" class="form-group row">
                <label for="docente" class="col-form-label col-md-4">Selecciona el docente</label>
                <div class="col-md-8">
                <label>
                <select name='docente_id' style="width:280px" class="select-css" id="docente" onchange="docente();">
                    <option selected="true" disabled="disabled">Docentes...</option>
                    @foreach($docentes as $docente)
                       <option value="{{$docente->id}}">
                       {{$docente->apellido1}}
                       {{$docente->apellido2}}
                       {{$docente->nombre}}
                        </option>
                    @endforeach
                </select></label>
                </div>
            </div>
            
            <br>

            <form method="post" action="{{ route('admin.horario_store') }}" >
                 @csrf

                 <div id="div_registro" class="form-group row">
                    <label for="ciclo_escolar" class="col-form-label col-sm-4"> LICENCIATURA:</label>
                    <div class="col-sm-8">
                        <input  id="lic" class="form-control" type="text"  style="background-color:transparent" readonly>
                        <input name="licenciatura_id" id="lic_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div>


                <div id="div_registro" class="form-group row">
                    <label for="ciclo_escolar" class="col-form-label col-sm-4"> CICLO ESCOLAR:</label>
                    <div class="col-sm-8">
                        <input  id="ciclos" class="form-control" type="text"  style="background-color:transparent" readonly>
                        <input name="ciclo_id" id="ciclos_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div>

                <div id="div_registro" class="form-group row">
                    <label for="grupo" class="col-form-label col-sm-4"> GRUPO:</label>
                    <div class="col-sm-8">
                        <input id="grupos"  class="form-control" type="text" style="background-color:transparent" readonly>
                        <input name="grupo_id" id="grupos_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <label for="di" class="col-form-label col-sm-4"> DIA:</label>
                    <div class="col-sm-8">
                        <input id="dias" name="dia" class="form-control" type="text"  style="background-color:transparent" readonly>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <label for="hor" class="col-form-label col-sm-4"> HORA:</label>
                    <div class="col-sm-8">
                        <input id="horas"  name="hora" class="form-control" type="text"  style="background-color:transparent" readonly>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <label for="mat" class="col-form-label col-sm-4"> MATERIA:</label>
                    <div class="col-sm-8">
                        <input id="materias"  class="form-control" type="text"  style="background-color:transparent" readonly>
                        <input name="materia_id" id="materias_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <label for="doc" class="col-form-label col-sm-4"> DOCENTE:</label>
                    <div class="col-sm-8">
                        <input id="docentes"  class="form-control" type="text"  style="background-color:transparent" readonly>
                        <input name="docente_id" id="docentes_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div> 



                <div id="div_registro" class="form-group row">
                    <button id="button_registro" class="btn btn-outline-primary col-sm-6" type="submit">
                         <i class="fas fa-save"></i> CREAR HORARIO
                    </button>
                    <div class="col-md-6">                  
                        <a  id="button_cancelar" class="form-control btn btn-outline-danger"  href="{{ route('admin.menu') }}" role="button">
                            <i class="fas fa-window-close"></i>   Cancelar
                        </a>
                    </div>      
                </div>
            </form>
            </div>
        </div> 
    </div>         
</div>  
@endsection

