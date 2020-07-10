@extends('layouts.admin-vistas')

@section('content')

     <!--Navbar-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="{{ route('admin.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
            </a>  
            <a class="navbar-brand" href="{{ route('admin.menu') }}">ENSV</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active ">
                <a class="nav-link" href="{{ route('admin.menu') }}"><b>INICIO</b></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b> DOCENTE</b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.list') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar docentes</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.createdocente') }}">
                        <i class="fas fa-sign-in-alt"></i> Registar docente</a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b> ALUMNO </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.lista') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar alumno</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.create') }}">
                        <i class="fas fa-sign-in-alt"></i> Registo alumno</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>  HORARIO </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i>Crear horario</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                    <b> EVALUACIÓN DOCENTE
                    </b>
                    </a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a href="#" class="nav-link" >
                        {{ Auth::user()->nombre }} 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" class="nav-link"><i class="fas fa-power-off"></i> Cerrar sesión</a>
                    </li>  
                    </ul>
            </div>
        </div>
     </nav>


     <div class="container" id="container_menu">

        <div class="card-deck mb-3 text-center">

          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><b>DOCENTES</b></h4>
            </div>
            <br>
            <div class="card-body">
               <img id="imagen-card"  src="{{ URL::to('assets\img\docentes.png') }}" class ="img-fluid" alt="">
               <a id="button_a"class="btn btn-lg btn-block" href="{{ route('admin.list') }}" role="button">
               <i class="fas fa-sign-in-alt"></i>Consultar docente
               </a>
               <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.createdocente') }}" role="button">
               <i class="fas fa-sign-in-alt"></i> Registrar docente
               </a>
            </div>
          </div>

          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><b>ALUMNOS</b></h4>
            </div>
            <div class="card-body">
                <img id="imagen-card1"  src="{{ URL::to('assets\img\grupos.png') }}" class ="img-fluid" alt=""> 
                <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.lista') }}" role="button">
                <i class="fas fa-sign-in-alt"></i>  Consultar alumno
               </a>
               <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.create') }}" role="button">
               <i class="fas fa-sign-in-alt"></i> Registrar alumno
               </a>
            </div>
          </div>

          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><b>CREAR HORARIO</b></h4>
            </div>
            <div class="card-body">
                <img id="imagen-card2" src="{{ URL::to('assets\img\crear horario.png') }}" class ="img-fluid" alt=""> 
                <a id="button_a" class="btn btn-lg btn-block" href="" role="button">
                <i class="fas fa-sign-in-alt"></i>  Consultar horario
               </a>
               <a id="button_a" class="btn btn-lg btn-block " href="" role="button">
               <i class="fas fa-sign-in-alt"></i> Crear horario
               </a>
            </div>
          </div>

        </div>

        <div class="container text-center" id="container_menu">
          <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal"><b>Evaluación doncetes</b></h4>
                  </div>
                  <div class="card-body text-center">
                      <img id="imagen-card3" src="{{ URL::to('assets\img\evaluacion.png') }}" class ="img-fluid" alt=""> 
                      <a id="button_a" class="btn btn-lg btn-block " href="" role="button">
                      <i class="fas fa-sign-in-alt"></i> Preguntas
                    </a>
                    <a id="button_a" class="btn btn-lg btn-block" href="" role="button">
                    <i class="fas fa-sign-in-alt"></i> Consultar
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection
