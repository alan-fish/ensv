@extends('layouts.mainalumno')

@section('content')


<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="{{ route('alumno.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:38px;">
            </a>  
            <a class="navbar-brand" href="{{ route('alumno.menu') }}"><b>ENSV</b>  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link " href="{{ route('alumno.menu') }}">
                <b>INICIO</b>  
                </a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{ route('alumno.perfilAlumno', Auth::user()->id) }}">
                <b>PERFIL</b>  
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('alumno.horarioAlumno', [Auth::user()->grupo_id, Auth::user()->licenciatura_id] ),  }}">
                <b>HORARIO</b>  
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">
                <b>
                EVALUACIÓN DOCENTE
                </b>  
                </a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                         <a href="{{ route('alumno.perfilAlumno', Auth::user()->id) }}" class="nav-link" >
                         <b>   {{ Auth::user()->nombre }} </b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('alumno.logout') }}" class="nav-link"><i class="fas fa-power-off"></i> <b>Cerrar sesión</b></a>
                    </li>  
                </ul>
            </div>
        </div>
     </nav>

<link rel="stylesheet" href="{{ asset('css/menu.css') }}" />
<script src="{{ asset('js/horariojs.js') }}"></script>
<script src="{{ asset('js/menus.js') }}"></script>
<h1>MENÚ ALUMNO</h1>

<div class="accordion">

  <div class="accordion-item">
    <div class="accordion-item-header">
      <img src="{{ URL::to('assets\img\perfil.png') }}"  alt="" width="70" height="70" />
      PERFIL
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        <a id="button_a"class="btn btn-lg btn-block" href="{{ route('alumno.perfilAlumno', Auth::user()->id) }}" role="button">
          <i class="fas fa-sign-in-alt"></i>VER PERFIL
        </a>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <div class="accordion-item-header"> <img src="{{ URL::to('assets\img\horario.png') }}"  alt="" width="70" height="70" />
      HORARIO
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        <a id="button_a" class="btn btn-lg btn-block" href="{{ route('alumno.horarioAlumno', [Auth::user()->grupo_id, Auth::user()->licenciatura_id] ),  }}" role="button">
          <i class="fas fa-sign-in-alt"></i>  CONSULTAR HORARIO
        </a>    
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <div class="accordion-item-header"> <img src="{{ URL::to('assets\img\evaluacion.png') }}"  alt="" width="70" height="70" />
      EVALUACIÓN DOCENTE
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        <a id="button_a" class="btn btn-lg btn-block" href="{{ route('alumno.evaluacion',[Auth::user()->grupo_id, Auth::user()->licenciatura_id] ) }}" role="button">
          <i class="fas fa-sign-in-alt"></i>  EVALUACIÓN DOCENTE
        </a>    
      </div>
    </div>
  </div>
</div>
@endsection