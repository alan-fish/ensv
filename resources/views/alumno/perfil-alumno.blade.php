@extends('layouts.mainalumno')

@section('content')

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="{{ route('alumno.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
            </a>  
            <a class="navbar-brand" href="{{ route('alumno.menu') }}">ENSV</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                <a class="nav-link" href="{{ route('alumno.menu') }}">INICIO</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('alumno.perfil') }}">PERFIL</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">HORARIO</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">EVALUACIÓN DOCENTE</a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                         <a href="#" class="nav-link" >
                        {{ Auth::user()->nombre }} 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('alumno.logout') }}" class="nav-link"><i class="fas fa-power-off"></i> Cerrar sesión</a>
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
                                    <td>{{ Auth::user()->apellido1 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Segundo apellido</b>:</td>
                                    <td>{{ Auth::user()->apellido2 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Nombre(s):<b></td>
                                    <td>{{ Auth::user()->nombre }}</td>
                                </tr>
                                <tr>
                                    <td><b>Sexo</b></td>
                                    <td>{{ Auth::user()->sexo }}</td>
                                </tr>
                                <tr>
                                    <td><b>Matrícula</b></td>
                                    <td>{{ Auth::user()->matricula }}</td>
                                </tr>
                                <tr>
                                    <td><b>Curp</b></td>
                                    <td>{{ Auth::user()->curp }}</td>
                                </tr>
                                <tr>
                                    <td><b>Licenciatura</b></td>
                                    <td>{{ Auth::user()->licenciatura }}</td>
                                </tr>
                                <tr>
                                    <td><b>Correo electrónico</b></td>
                                    <td>{{ Auth::user()->email}}</td>
                                </tr>
                                </table>
                        </div>           
                    </div>
                    <div id="div_registro" class="form-group row">
                            <a id="button_registro" class="form-control btn-outline-warning col-sm-6" href="{{ route('docente.menu') }}" role="button">
                            <i class="fas fa-sign-in-alt"></i> Ir a menú
                            </a>
                            <div class="col-md-6">                  
                                <a  id="button_cancelar" class="form-control btn btn-outline-warning"  href="#" role="button">
                                <i class="fas fa-sign-in-alt"></i> Ir a la ventana Horarios
                                </a>
                            </div>      
                    </div>
            </div>
        </div>

        </div>

    </div>

    </div>



    @endsection