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
                  <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fas fa-power-off"></i> 
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

      <div class="card-header">
          <h2><B>ALUMNOS ENSV</B></h2>
          <h5>Buscar por...</h5>
          <nav>
                <form id="busqueda" class="form-inline"  method="get" action="{{ route('admin.lista') }}" role="search">
                    <select name="buscar_grupo" class=" form-control custom-select">
                        <option selected="true" disabled="disabled">Grupo</option>
                        @foreach($grupos as $grupo)
                        <option value="{{$grupo->id}}">
                        {{$grupo->grupo}}
                        </option>
                        @endforeach
                    </select>
                    <input id="input_busqueda" type="text" name="buscar_matricula" class="form-control col-form-label col-sm-2" placeholder="Matricula">
                    <input id="input_busqueda" type="text" name="buscar_nombre" class="form-control col-form-label col-sm-4" placeholder="Nombre completo">                     
                    <button id="button_busqueda" class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                    <a id="button_busqueda"  class="float-right btn btn-outline-primary" href="{{ route('admin.lista') }}" role="button">
                        <i class="fas fa-redo"></i> Refrescar 
                        </a>
                </form>
            </nav>
        <div class="card-body">
        @isset($message)
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>{{$message}}</strong>
            </div>
        @endif
        @if(isset($alumnos))  
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
                            {{ $alumno-> id}}                             
                        </td>
                        <td>
                        <a href="{{ route('admin.edit_alumno', $alumno->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i>Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        {{ $alumnos->links()}} 
        @endif 
        </div>
        
      </div>
    </div>
  </div>
</div>

    
@endsection