@extends('layouts.main-docente')
@section('content')
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="{{ route('docente.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
        </a>  
        <a class="navbar-brand" href="{{ route('docente.menu')}}">
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
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('docente.perfil') }}"><b>PERFIL</b></a>
                </li>
                <li class="nav-item">
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

<div class="container" id="container-perfil">
<script src="{{ asset('js/perfil.js') }}"></script>
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >             
                    <img src="{{ URL::to('assets\img\perfil.png') }}" class="img-fluid" alt="foto de perfil" id="fotoperfil">                      
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table  class="table table-hover">
                                <tr>
                                    <td><b>APELLIDO PATERNO<b></td>
                                    <td> {{ Auth::user()->apellido1 }}</td>
                                </tr>
                                <tr>
                                    <td><b>APELLIDO MATERNO<b></td>
                                    <td>{{ Auth::user()->apellido2 }}</td>
                                </tr>
                                <tr>
                                    <td><b>NOMBRE(s):<b></td>
                                    <td>{{ Auth::user()->nombre }}</td>
                                </tr>
                                <tr>
                                    <td><b>ESTADO LABORAL:<b></td>
                                    <td>{{ Auth::user()->estado }}</td>
                                </tr>
                                <tr>
                                    <td><b>TIPO DE CONTRATACIÓN:<b></td>
                                    <td>{{ Auth::user()->tipo_de_contratacion}}</td>
                                </tr>
                                <tr>
                                    <td><b>CORREO ELECTRÓNICO:<b></td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>FECHA DE INGRSO AL PLANTEL<b></td>
                                    <td>{{ Auth::user()->fecha_ingreso }}</td>
                                </tr>
                                <tr>
                                    <td><b>PERFIL ACADEMICO<b></td>
                                    <td>        
                                        <select id="selectFocus" onChange="mostrarTR(this.value);" class="custom-select">
                                            <option value="">¿Qué información deseas ver?</option>
                                            <option value="licenciatura">VER LICENCIATURAS</option>
                                            <option value="maestria">VER MAESTRÍAS</option>
                                            <option value="doctorado">VER DOCTORADOS</option>
                                        </select>
                                    </td>
                                </tr>
                                    <tr id="licenciatura" style="display: none;">
                                        <td><b>LICENCIATURA:<b></td>
                                        <td>{{ Auth::user()->licenciatura }}</td>
                                    </tr>
                                    <tr id="licenciatura1" style="display: none;">
                                        <td></td>
                                        <td>{{ Auth::user()->licenciatura1 }}</td>
                                    </tr>
                                    <tr id="licenciatura2" style="display: none;">
                                        <td></td>
                                        <td>{{ Auth::user()->licenciatura2 }}</td>
                                    </tr>

                                    <tr id="maestria" style="display: none;">
                                        <td><b>Maestrías:<b></td>
                                        <td>{{ Auth::user()->maestria }}</td>
                                    </tr>
                                    <tr id="maestria1" style="display: none;">
                                        <td></td>
                                        <td>{{ Auth::user()->maestria1 }}</td>
                                    </tr>
                                    <tr id="maestria2" style="display: none;">
                                        <td></td>
                                        <td>{{ Auth::user()->maestria2 }}</td>
                                    </tr>

                                    <tr id="doctorado" style="display: none;">
                                        <td><b>Doctorados:<b></td>
                                        <td>{{ Auth::user()->doctorado }}</td>
                                    </tr>  
                                    <tr id="doctorado1" style="display: none;">
                                        <td></td>
                                        <td>{{ Auth::user()->doctorado1 }}</td>
                                    </tr>
                                    <tr id="doctorado2" style="display: none;">
                                        <td></td>
                                        <td>{{ Auth::user()->doctorado2 }}</td>
                                    </tr>
                             
                                </table>
                    </div>                
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection