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
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.consultarhorario') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i>Crear horario</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>  DATOS GENERALES </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.createLicenciatura') }}">
                        <i class="fas fa-sign-in-alt"></i> Registrar</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.consutarDatosLicenciatura') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar</a>
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


<div class="container" id="container-resgistroalumno">
    
    <link rel="stylesheet" href="{{ asset('css/horari.css') }}" />
    <script src="{{ asset('js/horariojs.js') }}"></script>
    <div class="row justify-content-md-center">
        <div class="col-sm-10">
        @if(session('info'))  
        <div  class="alert alert-success alert-dismissible fade show">
            {{session('info')}}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>                              
        @endif   




    <link rel="stylesheet" href="{{ asset('css/menu.css') }}" />
    <script src="{{ asset('js/horariojs.js') }}"></script>

        <h1>MENÚ ADMINISTRADOR</h1>

          <div class="accordion">
            <div class="accordion-item">
              <div class="accordion-item-header">
              <img src="{{ URL::to('assets\img\docentes.png') }}"  alt="" width="70" height="70" />
              DOCENTES
              </div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                <a id="button_a"class="btn btn-lg btn-block" href="{{ route('admin.list') }}" role="button">
                        <i class="fas fa-sign-in-alt"></i>Consultar docente
                        </a>
                        <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.createdocente') }}" role="button">
                        <i class="fas fa-sign-in-alt"></i> Registrar docente
                        </a>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-item-header"> <img src="{{ URL::to('assets\img\alumno.png') }}"  alt="" width="70" height="70" />
                ALUMNOS
              </div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.lista') }}" role="button">
                          <i class="fas fa-sign-in-alt"></i>  Consultar alumno
                        </a>
                        <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.create') }}" role="button">
                        <i class="fas fa-sign-in-alt"></i> Registrar alumno
                        </a>      </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-item-header"> <img src="{{ URL::to('assets\img\calificaciones.png') }}"  alt="" width="70" height="70" />
                HORARIO
              </div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.consultarhorario') }}" role="button">
                      <i class="fas fa-sign-in-alt"></i>  Consultar horario
                    </a>
                    <a id="button_a" class="btn btn-lg btn-block " href="{{ route('admin.horario') }}" role="button">
                      <i class="fas fa-sign-in-alt"></i> Crear horario
                    </a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-item-header"> <img src="{{ URL::to('assets\img\avance.png') }}"  alt="" width="70" height="70" />
                EVALUACIÓN DOCENTE
              </div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">


              PEGAR LAS RUTAS DE EVALUACION DOCENTE AQUI

                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-item-header"> <img src="{{ URL::to('assets\img\calificaciones.png') }}"  alt="" width="70" height="70" />
                EXTRA
              </div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                  <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.createLicenciatura') }}" role="button">
                      <i class="fas fa-sign-in-alt"></i> Registrar datos generales
                    </a>
                    <a id="button_a" class="btn btn-lg btn-block " href="{{ route('admin.consutarDatosLicenciatura') }}" role="button">
                      <i class="fas fa-sign-in-alt"></i> Consulta de datos generales
                    </a>
                </div>
              </div>
            </div>
          </div>


          <script>
          const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

          accordionItemHeaders.forEach(accordionItemHeader => {
              accordionItemHeader.addEventListener("click", event => {


                  accordionItemHeader.classList.toggle("active");
                  const accordionItemBody = accordionItemHeader.nextElementSibling;
                  if (accordionItemHeader.classList.contains("active")) {
                      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
                  } else {
                      accordionItemBody.style.maxHeight = 0;
                  }

              });
          });
          </script>
@endsection