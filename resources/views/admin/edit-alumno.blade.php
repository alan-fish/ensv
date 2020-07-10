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
                     DOCENTE
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
                    <b> ALUMNO</b>
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
                    <a class="nav-link" href="#"> <b> EVALUACIÓN DOCENTE</b></a>
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
        @isset($message)
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>{{$message}}</strong>
            </div>
        @endif
      <div class="card-header">
          <h3 style="font-weight: bold">DATOS DEL ALUMNO</h3>          
            <div class="card-body">
              
                @include ('layouts.error')

                <form  action="/admin/{{$alumno->id}}/edit-alumno" method="post">
                    @method('put')
                    {{ csrf_field() }}
                    
                    <div id="div_registro" class="form-group row">
                             <label for="apellido1" class="col-form-label col-sm-4">Primer apellido:</label>
                             <div class="col-sm-8">
                                 <input id="registro-input" class="form-control" type="text" name="apellido1" value="{{ $alumno->apellido1 }}" >
                             </div>
                    </div>
                   
                    <div id="div_registro"  class="form-group row">
                            <label for="apellido2" class="col-form-label col-sm-4">Segundo apellido:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="apellido2"  value="{{ $alumno->apellido2 }}">
                            </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                            <label for="nombre" class="col-form-label col-sm-4">Nombre(s):</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="nombre" value="{{ $alumno->nombre }}">
                            </div>
                    </div>

                    

                    <div id="div_registro" class="form-group row">
                            <label for="matricula" class="col-form-label col-sm-4">Matrícula:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="matricula" value="{{ $alumno->matricula }}">
                            </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                         <label for="sexo" class="col-form-label col-sm-4">Sexo</label>
                         <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" value="{{ $alumno->sexo }}"disabled>
                        </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                        <label for="sexo" class="col-form-label col-sm-4">Sexo:</label>
                        <div class="col-sm-8">
                            <select id="sexo" name="sexo"  class="custom-select"  onchange="ShowSelected();">
                                    <option>Seleecione una opción</option>
                                    <option value="M">Mujer</option>
                                    <option value="H">Hombre</option>
                            </select>
                            </div>
                    </div>
                    
                    
                    <div id="div_registro" class="form-group row">
                            <label for="curp" class="col-form-label col-sm-4">Curp:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="curp" value="{{ $alumno->curp }}">
                            </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                            <label for="licenciatura" class="col-form-label col-sm-4">Licenciatura:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="licenciatura" value="{{ $alumno->licenciatura }}">
                            </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                            <label for="grupo" class="col-form-label col-sm-4">Grupo:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="grupo" value="{{ $alumno->grupo }}">
                            </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                            <label for="email" class="col-form-label col-sm-4">Correo electrónico:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="email" name="email" value="{{ $alumno->email }}">
                            </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                        <button id="button_registro" class="btn btn-outline-primary col-sm-5" type="submit">Actualizar información</button>
                        <div class="col-md-6">                  
                            <a  id="button_cancelar" class=" form-control btn btn-outline-danger"  href="{{ route('admin.menu') }}" role="button">
                                Cancelar
                            </a>
                        </div>      
                    </div>

                    </form>
            </div>
      </div>
    </div>
  </div>
</div>


@endsection