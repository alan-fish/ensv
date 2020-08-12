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
                <li class="nav-item">
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
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.horario') }}">
                        <i class="fas fa-sign-in-alt"></i>Crear horario</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>  DATOS GENERALES </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.createLicenciatura') }}">
                        <i class="fas fa-sign-in-alt"></i> Registrar</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.consutarDatosLicenciatura') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar</a>
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
<script src="{{ asset('js/show_form.js') }}"></script>
    <div class="row justify-content-md-center">
        <div class="col-sm-10">
        @if(session('info'))  
        <div  class="alert alert-success alert-dismissible fade show">
            {{session('info')}}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>                              
        @endif   
        <div class="card-header">
        <h3 style="font-weight: bold">AÑADIR DATOS GENERALES</h3>
        </div>
         
         <div class="card-body">

            <div id="div_registro"  class="form-group row">
                <div  class="col-sm-5">
                    <select onChange="mostrarForm(this.value);"  class="custom-select">
                        <option selected="true" disabled="disabled">¿Qué información deseas añadir?</option>
                        <option value="cic">Añadir una ciclo escolar</option>
                        <option value="licen">Añadir una licenciatura</option>
                        <option value="mate">Añadir una materia</option>
                        <option value="grp">Añadir un grupo</option>
                    </select>
                </div>
            </div>
            <br>

            <form id="agregarCiclo" method="post" action="{{ route('admin.storeDatos') }}" class="form-inline" style="display: none;">   
            {{ csrf_field() }}
                <label id="div_registro" for="ciclo" class="col-form-label col-sm-3">CICLO ESCOLAR:</label>
                <input id="registro-input" class="form-control col-sm-4" type="text" name="ciclo">
                <button id="button_busqueda" class="btn btn-outline-primary col-sm-2" type="submit">
                <i class="fas fa-save"></i> Guardar
                </button>      
            </form>

            <form id="agregarLicenciatura" method="post" action="{{ route('admin.storeDatos') }}" class="form-inline" style="display: none;">   
            {{ csrf_field() }}
                <label id="div_registro" for="licenciatura" class="col-form-label col-sm-2">LICENCIATURA:</label>
                <input id="registro-input" class="form-control col-sm-6" type="text" name="licenciatura">
                <button id="button_busqueda" class="btn btn-outline-primary col-sm-2" type="submit">
                <i class="fas fa-save"></i> Guardar
                </button>      
            </form>

            <form id="agregarGrupo" method="post" action="{{ route('admin.storeDatos') }}" class="form-inline" style="display: none;">   
            {{ csrf_field() }}
                <label id="div_registro" for="grupo" class="col-form-label col-sm-2">GRUPO:</label>
                <input id="registro-input" class="form-control col-sm-4" type="text" name="grupo">
                <button id="button_busqueda" class="btn btn-outline-primary col-sm-2" type="submit">
                <i class="fas fa-save"></i> Guardar
                </button>      
            </form>

            <form id="agregarMateria" method="post" action="{{ route('admin.storeDatos') }}"  style="display: none;">   
            {{ csrf_field() }}

                <div id="div_registro" class="form-group row">
                    <label for="licenciatura" class="col-form-label col-sm-2">LICENCIATURA:</label>         
                    <div class="col-sm-8">
                        <select style="width:280px" class="custom-select" id="licenciatura" name="licenciatura_id">
                            <option selected="true" disabled="disabled"></option>
                            @foreach($licenciaturas as $licenciatura)
                            <option value="{{$licenciatura->id}}">
                                {{$licenciatura->carrera}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="div_registro" class="form-group row">
                    <label  for="materia" class="col-form-label col-sm-2">MATERIA:</label>
                    <div class="col-sm-8">
                        <input id="registro-input" class="form-control col-sm-6" type="text" name="materia">
                    </div>
                </div>

                <div id="div_registro" class="form-group row">
                    <label  for="semestre" class="col-form-label col-sm-2">SEMESTRE:</label>        
                    <div class="col-sm-8">
                    <select style="width:280px" class="custom-select"  name="semestre">
                        <option selected="true" disabled="disabled"></option>
                        <option value="Primero">Primer semestre</option>
                        <option value="Segundo">Segundo semestre</option>
                        <option value="Tercero">Tercer semestre</option>
                        <option value="Cuarto">Cuarto semestre</option>
                        <option value="Quinto">Quinto semestre</option>
                        <option value="Sexto">Sexto semestre</option>
                        <option value="Septimo">Séptimo semestre</option>
                        <option value="Octavo">Octavo semestre</option>
                        <option value="Noveno">Noveno semestre</option>                    
                     </select>
                    </div>
                </div>
                <div id="div_registro" class="form-group row">
                    <button id="button_busqueda" class="btn btn-outline-primary col-sm-2" type="submit">
                        <i class="fas fa-save"></i> Guardar
                    </button> 
                </div>     
            </form>
           


         </div>
        </div>
    </div>
</div>
@endsection

