@extends('layouts.main-docente')

@section('content')

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="{{ route('docente.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
            </a>  
            <a class="navbar-brand" href="{{ route('docente.menu') }}">ENSV</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                <a class="nav-link" href="{{ route('docente.menu') }}">INICIO</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('docente.perfil') }}">PERFIL</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">HORARIOS ASIG.</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">GRUPOS ASIG.</a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                         <a href="#" class="nav-link" >
                        {{ Auth::user()->nombre }} 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('docente.logout') }}" class="nav-link"><i class="fas fa-power-off"></i> Cerrar sesión</a>
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
                            <img src="{{ URL::to('assets\img\perfil.png') }}" class="img-fluid" alt="foto de perfil" id="fotoperfil">                      
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table  class="table table-hover">
                                <tr>
                                    <td><b>Apellido paterno:<b></td>
                                    <td> {{ Auth::user()->apellido1 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Apellido materno:<b></td>
                                    <td>{{ Auth::user()->apellido2 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Nombre(s):<b></td>
                                    <td>{{ Auth::user()->nombre }}</td>
                                </tr>
                                <tr>
                                    <td><b>Estado laboral:<b></td>
                                    <td>{{ Auth::user()->estado }}</td>
                                </tr>
                                <tr>
                                    <td><b>Tipo de contratación:<b></td>
                                    <td>{{ Auth::user()->tipo_de_contratacion}}</td>
                                </tr>
                                <tr>
                                    <td><b>Correo:<b></td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Fecha de ingreso:<b></td>
                                    <td>{{ Auth::user()->fecha_ingreso }}</td>
                                </tr>
                                <tr>
                                    <td><b>Licenciaturas:<b></td>
                                    <td>{{ Auth::user()->licenciatura }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ Auth::user()->licenciatura1 }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ Auth::user()->licenciatura2 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Maestrías:<b></td>
                                    <td>{{ Auth::user()->maestria }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ Auth::user()->maestria1 }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ Auth::user()->maestria2 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Doctorados:<b></td>
                                    <td>{{ Auth::user()->doctorado }}</td>
                                </tr>  
                                <tr>
                                    <td></td>
                                    <td>{{ Auth::user()->doctorado1 }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ Auth::user()->doctorado2 }}</td>
                                </tr>
                                </table>
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