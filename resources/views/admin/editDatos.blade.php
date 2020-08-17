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
                <li class="nav-item dropdown ">
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
                <li class="nav-item dropdown active">
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

            <form id="agregarCiclo" method="post"  action="/admin/{{$ciclos->id}}/editDatos" class="form-inline">   
             @method('put')
             {{ csrf_field() }}
                <label id="div_registro" for="ciclo" class="col-form-label col-sm-3">CICLO ESCOLAR:</label>
                <input id="registro-input" class="form-control col-sm-4" type="text" name="ciclo" value="{{ $ciclos->ciclo }}">
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

