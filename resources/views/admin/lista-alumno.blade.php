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
                <li class="nav-item  ">
                <a class="nav-link" href="{{ route('admin.menu') }}"><b>INICIO</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>   DOCENTE</b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.list') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar docentes</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.createdocente') }}"> 
                        <i class="fas fa-sign-in-alt"></i> Registar docente</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>   ALUMNO</b>
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
                    <b>    HORARIO </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="#"> 
                        <i class="fas fa-sign-in-alt"></i> Crear horario</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#"><b>EVALUACIÓN DOCENTE</b></a>
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
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class="card-header">
          <h2><B>ALUMNOS ENSV</B></h2>

        <div class="card-body">
            <nav>
                <form id="busqueda" class="form-inline"  method="get" action="{{ route('admin.lista') }}" role="search">
                    <input id="input_busqueda" type="text" name="buscar_grupo" class="form-control col-form-label col-sm-2" placeholder="Grupo"> 
                    <input id="input_busqueda" type="text" name="buscar_matricula" class="form-control col-form-label col-sm-2" placeholder="Matricula">
                    <input id="input_busqueda" type="text" name="buscar_nombre" class="form-control col-form-label col-sm-3" placeholder="Nombre completo">                     
                    <button id="button_busqueda" class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                    <a id="button_busqueda"  class="float-right btn btn-outline-primary" href="{{ route('admin.lista') }}" role="button">
                        <i class="fas fa-redo"></i>   Refrescar lista
                        </a>
                </form>
            </nav>
          <table class="table-responsive table table-hover">
            <thead>      
                <th>GRUPO</th>  
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombre(s)</th>
                <th>Matricula</th>
                <th>Editar</th>
                
            </thead>
                <tbody>
                    @foreach($alumnos as $alumno)

                    <tr>
                      <td>
                            {{ $alumno-> grupo}}                        
                        </td>
                        <td>
                            {{ $alumno->apellido1 }}
                        </td>

                        <td>
                            {{ $alumno->apellido2}}
                        </td>
                        <td>
                            {{ $alumno-> nombre}}                         
                        </td>
                        <td>
                            {{ $alumno-> matricula}}                        
                        </td>
                        <td>
                        <a href="{{ route('admin.edit_alumno', $alumno->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i>Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        {{ $alumnos->links()}} 
        
        </div>
        
      </div>
    </div>
  </div>
</div>

    
@endsection