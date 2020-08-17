@extends('layouts.admin-vistas')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
  
        <a class="navbar-brand" href="">
          <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
          </a>  
          <a class="navbar-brand" href="">ENSV</a>
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('admin.menu') }}">
                        <b>INICIO</b>
                    </a>  
                </li>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <B>DOCENTE</B>
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdown07">
                    <a class="dropdown-item" href="{{ route('admin.list') }}"><i class="fas fa-sign-in-alt"></i> 
                      CONSULTAR
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.createdocente') }}"><i class="fas fa-sign-in-alt"></i> 
                      REGISTRAR
                    </a>
                  </div>
                  </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown active">
                    <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <B>ALUMNO</B>
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdown07">
                    <a class="dropdown-item" href="{{ route('admin.lista') }}"><i class="fas fa-sign-in-alt"></i> 
                      CONSULTAR
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.create') }}"><i class="fas fa-sign-in-alt"></i> 
                      REGISTRAR
                    </a>
                  </div>
                  </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <B>HORARIOS</B>
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdown07">
                    <a class="dropdown-item" href="{{ route('admin.consultarhorario') }}"><i class="fas fa-sign-in-alt"></i> 
                      CONSULTAR
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.horario') }}"><i class="fas fa-sign-in-alt"></i> 
                      CREAR
                    </a>
                  </div>
                  </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <B>DATOS GENERALES</B>
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdown07">
                    <a class="dropdown-item" href="{{ route('admin.consutarDatosLicenciatura') }}"><i class="fas fa-sign-in-alt"></i> 
                      CONSULTAR
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.createLicenciatura') }}"><i class="fas fa-sign-in-alt"></i> 
                      REGISTRAR
                    </a>
                  </div>
                  </li>
                </ul>

            </ul>
			      <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown ">
                  <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <B> {{ Auth::user()->nombre }}</B>
                  </a>
                <div class="dropdown-menu " aria-labelledby="dropdown07">
                  <a class="dropdown-item"  href="{{ route('admin.logout') }}"><i class="fas fa-power-off"></i> 
                    CERRAR SESIÓN
                  </a>
                </div>
              </li>
            </ul>
        </div>
      </div>
    </nav>
<br>
<br>
<br>


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
        </div>          
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
                        <label for="sexo" class="col-form-label col-sm-4">Sexo:</label>
                        <div class="col-sm-8">
                            <select id="sexo" name="sexo"  class="custom-select">
                                    <option selected="true" disabled="disabled" value="{{ $alumno->sexo }}" >{{ $alumno->sexo }}</option>
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
                                <select  name="licenciatura_id"  class="custom-select" >
                                        <option selected="true" disabled="disabled" value='{{ $alumno->licenciatura_id }}'>{{ $alumnoLicenciatura->carrera }}</option>
                                        @foreach($licenciaturas as $licenciatura)
                                        <option value="{{$licenciatura->id}}">
                                        {{$licenciatura->carrera}}
                                        </option>
                                        @endforeach
                                </select>
                            </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                            <label for="licenciatura" class="col-form-label col-sm-4">Grupo:</label>
                            <div class="col-sm-8">
                                <select  name="grupo_id"  class="custom-select" >
                                        <option selected="true" disabled="disabled" value='{{ $alumno->grupo_id }}'>{{ $alum->grupo }}</option>
                                        @foreach($grupos as $grupo)
                                        <option value="{{$grupo->id}}">
                                        {{$grupo->grupo}}
                                        </option>
                                        @endforeach
                                </select>
                            </div>
                    </div>
  
                    <div id="div_registro" class="form-group row">
                            <label for="email" class="col-form-label col-sm-4">Correo electrónico:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="email" name="email" value="{{ $alumno->email }}">
                            </div>
                    </div>

                    <div id="div_registro">
                        <a  id="button_cancelar" class=" form-control btn btn-outline-danger col-sm-4 mx-1"  href="{{ route('admin.lista') }}" role="button">
                            <i class="fas fa-window-close"></i> REGRESAR
                        </a>        
                        <button id="button_registro" class="btn btn-outline-primary col-sm-4 " type="submit">
                            <i class="fas fa-save"></i>  ACTUALIZAR
                        </button> 
                    </div>

            </form>
        </div>
    </div>
  </div>
</div>


@endsection