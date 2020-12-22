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
                <a class="nav-link" href="{{ route('alumno.horarioAlumno',Auth::user()->grupo_id) }}">
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

<div class="container"  onload="cuestionario4();">
<script src="{{ asset('js/preguntas4.js') }}"></script>
  <div class="row justify-content-md-center">
    <div class="col-md-12">

        <div class="card-body">
            <form method="post" action="{{ route('alumno.storeEvaluacion4') }}" >
                {{ csrf_field() }}

                <div id="div_registro" class="form-group row">
                    <div id="labels" class="col-sm-8 row"></div>
                    <div  id='selects' class="col-sm-4 row"></div>
                </div>

                <div id="div_registro" class="form-group row" hidden>
                    <div class="col-sm-8">
                        <input id="registro-input" class="form-control" type="text" name="grupo_id" value='{{ Auth::user()->grupo_id }}' >
                        @if(empty($resultadoExistente))
                        <input id="registro-input" class="form-control" type="text" name="resultadoAnterior" value='{{ $resultadoTemporal}}' >
                        @endif 
                        @if(!empty($resultadoExistente))  
                        <input id="registro-input" class="form-control" type="text" name="resultadoAnterior" value='{{ $resultadoExistente->resultado }}' >
                        @endif
                    </div>
                </div>

                <div id="div_registro" class="form-group row" >
                    <div class="col-sm-8" hidden>
                        <input id="registro-input" class="form-control"  role="select" type="text" name="docente_id" value='{{ $docente}}' >
                    </div>
                    <button id="button_registro" class="btn btn-outline-primary col-sm-4 " type="submit">
                        CONTINUAR <i class="fas fa-arrow-right"></i>
                        <a  id="button_cancelar"   href="" role="button">
                        </a>   
                    </button> 
                </div>
         
            </form> 
        </div>

    </div>
  </div>
</div>
@endsection