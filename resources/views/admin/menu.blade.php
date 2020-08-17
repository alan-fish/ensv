@extends('layouts.admin-vistas')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
  
        <a class="navbar-brand" href="">
          <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
          </a>  
          <a class="navbar-brand" href="">ENSV</a>
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin.menu') }}">
                        <b>INICIO</b>
                    </a>  
                </li>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <B>DOCENTE</B>
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdown07">
                    <a class="dropdown-item" href="{{ route('admin.list') }}"><i class="fas fa-sign-in-alt"></i> 
                      CONSULTAR
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.createdocente') }}"><i class="fas fa-sign-in-alt"></i> 
                      REGISTRAR
                    </a>
                  </div>
                  </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <B>ALUMNO</B>
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdown07">
                    <a class="dropdown-item" href="{{ route('admin.lista') }}"><i class="fas fa-sign-in-alt"></i> 
                      CONSULTAR
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.create') }}"><i class="fas fa-sign-in-alt"></i> 
                      REGISTRAR
                    </a>
                  </div>
                  </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <B>HORARIOS</B>
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdown07">
                    <a class="dropdown-item" href="{{ route('admin.consultarhorario') }}"><i class="fas fa-sign-in-alt"></i> 
                      CONSULTAR
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.horario') }}"><i class="fas fa-sign-in-alt"></i> 
                      CREAR
                    </a>
                  </div>
                  </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <B>DATOS GENERALES</B>
                    </a>
                  <div class="dropdown-menu " aria-labelledby="dropdown07">
                    <a class="dropdown-item" href="{{ route('admin.consutarDatosLicenciatura') }}"><i class="fas fa-sign-in-alt"></i> 
                      CONSULTAR
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.createLicenciatura') }}"><i class="fas fa-sign-in-alt"></i> 
                      REGISTRAR
                    </a>
                  </div>
                  </li>
                </ul>

            </ul>
			      <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown ">
                  <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <B> {{ Auth::user()->nombre }}</B>
                  </a>
                <div class="dropdown-menu " aria-labelledby="dropdown07">
                  <a class="dropdown-item"  href="{{ route('admin.logout') }}"><i class="fas fa-power-off"></i> 
                    CERRAR SESIÓN
                  </a>
                </div>
              </li>
            </ul>
        </div>
      </div>
    </nav>

<BR>
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
                        <i class="fas fa-sign-in-alt"></i>LISTA DE DOCENTES
                        </a>
                        <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.createdocente') }}" role="button">
                        <i class="fas fa-sign-in-alt"></i> REGISTRAR DOCENTE
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
                          <i class="fas fa-sign-in-alt"></i>  LISTA DE ALUMNOS
                        </a>
                        <a id="button_a" class="btn btn-lg btn-block" href="{{ route('admin.create') }}" role="button">
                        <i class="fas fa-sign-in-alt"></i> REGISTRAR ALUMNO
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
                      <i class="fas fa-sign-in-alt"></i>  LISTA DE HORARIOS
                    </a>
                    <a id="button_a" class="btn btn-lg btn-block " href="{{ route('admin.horario') }}" role="button">
                      <i class="fas fa-sign-in-alt"></i> CREAR HORARIO
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
                    <a id="button_a" class="btn btn-lg btn-block" href="#" role="button">
                      <i class="fas fa-sign-in-alt"></i>  CONSULTAR
                    </a>
                    <a id="button_a" class="btn btn-lg btn-block " href="" role="button">
                      <i class="fas fa-sign-in-alt"></i> REGISTRAR
                    </a>
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