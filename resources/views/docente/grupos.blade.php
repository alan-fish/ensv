@extends('layouts.main-docente')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="{{ route('docente.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
        </a>  
        <a class="navbar-brand" href="{{ route('docente.menu') }}">
            <b>ENSV</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
              
        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('docente.menu') }}"><b>INICIO</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('docente.perfil') }}"><b>PERFIL</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('docente.gruposDocente', Auth::user()->id) }}"><b>HORARIOS Y LISTAS</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><b>EVALUACIÓN</b></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                       <b>{{ Auth::user()->nombre }}</b> 
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('docente.logout') }}" class="nav-link"><i class="fas fa-power-off"></i> <b>CERRAR SESIÓN</b> </a>
                </li>  
            </ul>
        </div>
    </div>
</nav>

<div class="container" id="container-resgistrodocente">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card-header">
                <h2><b>LISTA DE ALUMNOS</b></h2>
            </div>
            <div class="card-body">
            <div class="tabcontent table-responsive">
                &nbsp;
                    <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>APELLIDO PATERNO</th>
                            <th>APELLIDO MATERNO</th>
                            <th>NOMBRE</th>
                            <th>MATRÍCULA</th>
                        </thead>                
                        <tbody >
                            @foreach ($grupos as $grupos)
                            <tr>
                                <td>{{ $grupos->apellido1}}</td>
                                <td>{{ $grupos->apellido2}}</td>
                                <td>{{ $grupos->nombre}}</td>
                                <td>{{ $grupos->matricula}}</td>
                                <td>{{ $grupos->id}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection