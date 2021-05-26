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
                <li class="nav-item ">
                <a class="nav-link " href="{{ route('alumno.menu') }}">
                <b>INICIO</b>  
                </a>
                </li>
                <li class="nav-item active ">
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

<div class="container" id="container-perfil">
     <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >             
                            <img src="{{ URL::to('assets\img\perfil-male.png') }}" class="img-fluid" alt="foto de perfil" id="fotoperfil">                      
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table  class="table table-hover">
                                <tr>
                                    <td><b>Primer apellido</b>:</td>
                                    <td>{{$alumno->apellido1 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Segundo apellido</b>:</td>
                                    <td>{{$alumno->apellido2 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Nombre(s):<b></td>
                                    <td>{{ $alumno->nombre }}</td>
                                </tr>
                                <tr>
                                    <td><b>Licenciatura</b></td>
                                    <td>{{ $alumno->carrera }}</td>
                                </tr>
                                <tr>
                                    <td><b>Grupo</b></td>
                                    <td>{{ $alumno->grupo }}</td>
                                </tr>
                                <tr>
                                    <td><b>Matrícula</b></td>
                                    <td>{{$alumno->matricula }}</td>
                                </tr>
                                <tr>
                                    <td><b>Sexo</b></td>
                                    <td>{{ $alumno->sexo }}</td>
                                </tr>

                                <tr>
                                    <td><b>Curp</b></td>
                                    <td>{{ $alumno->curp }}</td>
                                </tr>
                                <tr>
                                    <td><b>Correo electrónico</b></td>
                                    <td>{{ $alumno->email}}</td>
                                </tr>
                                </table>
                        </div>           
                    </div>
            </div>
        </div>

        </div>

    </div>

    </div>



    @endsection