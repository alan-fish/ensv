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
                <li class="nav-item active ">
                <a class="nav-link " href="{{ route('docente.menu') }}">INICIO</a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="{{ route('docente.perfil') }}">PERFIL</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">HORARIOS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">GRUPOS</a>
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



     <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <br>
                    <h2 style="color: black;"> <b> Bienvenido: </b> {{ Auth::user()->nombre }} {{ Auth::user()->apellido1 }} {{ Auth::user()->apellido2 }}  </h2>
                </div>
            </div>
        </div>
    </header>



    <!--Bodymenucard-->
    <div class="container">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><b>PERFIL</b></h4>
            </div>
            <br>
            <div class="card-body">
               <img src="{{ URL::to('assets\img\perfil.png') }}" class ="img-fluid" alt=""> <br><br><br>
               <a id="button_a" class="btn btn-lg btn-block" href="{{ route('docente.perfil') }}" role="button">
               <i class="fas fa-sign-in-alt"></i> Ir a perfil
               </a>
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><b>HORARIO</b></h4>
            </div>
            <div class="card-body">
                <img src="{{ URL::to('assets\img\horario.png') }}" class ="img-fluid" alt=""> <br><br><br>
                <a id="button_a" class="btn btn-lg btn-block" href="" role="button">
                <i class="fas fa-sign-in-alt"></i>  Horario
               </a>
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><b>GRUPOS</b></h4>
            </div>
            <div class="card-body">
                <img src="{{ URL::to('assets\img\calificaciones.png') }}" class ="img-fluid" alt=""> <br><br><br>
                <a id="button_a" class="btn btn-lg btn-block" href="" role="button">
                <i class="fas fa-sign-in-alt"></i>  Grupos asignados
               </a>
            </div>
          </div>
        </div>
    </div>

    @endsection