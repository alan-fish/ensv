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
    <div class="row justify-content-md-center">
        <div class="col-sm-10">
        @isset($message)
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>{{$message}}</strong>
            </div>
        @endif
        <div class="card-header">
        <h3 style="font-weight: bold">EDITAR CICLO ESCOLAR</h3>
        </div>
         
         <div class="card-body">

         <form id="agregarLicenciatura" method="post"  action="/admin/{{$grupo->id}}/editGrup" class="form-inline">   
            @method('put')
            {{ csrf_field() }}
                <label id="div_registro" for="licenciatura" class="col-form-label col-sm-2">GRUPO:</label>
                <input id="registro-input" class="form-control col-sm-2" type="text" name="grupo"  value="{{ $grupo->grupo }}">
                <button id="button_busqueda" class="btn btn-outline-primary col-sm-2" type="submit">
                <i class="fas fa-save"></i> Actualizar
                </button>
                <a id="button_busqueda" href="{{ route('admin.consutarDatosLicenciatura') }}" class="btn btn-warning btn-sm-4">
                <i class="fas fa-step-backward"></i> Regresar
                </a>      
         </form>      
         </div>
        </div>
    </div>
</div>
@endsection

