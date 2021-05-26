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
<br>
<br><br>
<div class="container" >
  <div class="row justify-content-md-center">
    <div class="col-md-12">

        <table class="table-responsive table table-hover">
                <thead>      
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Nombre(s)</th>
                    <th>ACCIÓN</th>
                </thead>
                    <tbody>
                        @foreach($evaluar as $docente)

                        <tr>
                            <td>
                                {{ $docente->apellido1 }}
                            </td>

                            <td>
                                {{ $docente->apellido2}}
                            </td>
                            <td>
                                {{ $docente-> nombre}}
                            </td>
                            <td>
                                  {{ $docente-> id}}
                            <a href="{{ route('alumno.evaluarDocente', [Auth::user()->grupo_id, $docente-> id]) }}" class="btn btn-warning btn-sm"> 
                                <i class="fas fa-edit"></i>
                                    EVALUAR
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
          
        
            </div>

    </div>
  </div>
</div>
@endsection