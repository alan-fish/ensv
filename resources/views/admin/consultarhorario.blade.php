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
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.horario') }}">
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


<div class="container" id="container-resgistrodocente">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
        @isset($message) 
        <div  class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{$message}}</strong>
        </div>                              
        @endif  
      <div class="card-header">
          <h2><b>CONSULTAR HORARIO</b></h2>
        </div>
          <div class="card-body">
             <nav>
                <form id="busqueda" class="form-inline"  method="get" action="{{ route('admin.consultarhorario') }}">
                <div id= "">
                <label>
                <select name="carrera" style="width:280px" class="select-css" >
                    <option selected="true" disabled="disabled">Selecciona la licenciatura</option>
                    @foreach($licenciaturas as $licenciatura)
                       <option value="{{$licenciatura->id}}">
                       {{$licenciatura->carrera}}
                        </option>
                    @endforeach
                </select></label>
                </div>

                <div id= "">
                    <label>
                    <select name="c" style="width:280px" class="select-css">
                    <option selected="true" disabled="disabled">Selecciona el ciclo escolar</option>
                    @foreach($ciclos as $ciclo)
                       <option value="{{$ciclo->id}}">
                       {{$ciclo->ciclo}}
                        </option>
                    @endforeach
                    </select></label>
                </div>
        
                <div id= "">
                    <label>
                    <select name="g" style="width:280px" class="select-css">
                        <option selected="true" disabled="disabled">Selecciona el grupo...</option>
                        @foreach($grupos as $grupo)
                        <option value="{{$grupo->id}}">
                        {{$grupo->grupo}}
                            </option>
                        @endforeach
                    </select></label>
                </div>

                    <button id="button_busqueda" class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </form>
            </nav>

        @if(isset($horarios)) 
            <table class="table-responsive table table-hover">
                <thead>
                    <th>LICENCIATURA</th>
                    <th>CICLO ESCOLAR</th>
                    <th>GRUPO</th>
                    <th>DÍA</th>
                    <th>HORA</th>
                    <th>MATERIA</th>
                    <th>DOCENTE</th>
                    <th></th>
                </thead>                
                    <tbody>
                    @foreach($horarios as $horario) 
                        <tr>
                            <td  style="width:100px">
                            {{$horario->carrera}}  
                            </td>
                            <td  style="width:150px">
                            {{$horario->ciclo}}  
                            </td>
                            <td  style="width:50px">
                            {{$horario->grupo}}  
                            </td>
                            <td style="width:50px">
                            {{ $horario->dia}}  
                            </td>
                            <td style="width:100px">
                            {{ $horario->hora}}  
                            </td>
                            <td style="width:150px">
                            {{ $horario->materia}}  
                            </td>
                            <td style="width:200px">
                            {{ $horario->apellido1}}
                            {{ $horario->apellido2}}
                            {{ $horario->nombre}}      
                            </td>
                            <td> {{ $horario->id}}  </td>
                            <td>
                            <a href="{{ route('admin.editHorarios', $horario->id) }}" class="btn btn-warning btn-sm"> 
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('admin.borrarHorarios', $horario->id)}}" 
                               onclick="return confirm('¿Quieres eliminar este horario?')" 
                               class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i> 
                               Eliminar
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>  
        @endif 
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

