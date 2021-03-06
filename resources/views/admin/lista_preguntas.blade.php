@extends('layouts.admin-vistas')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
  
        <a class="navbar-brand" href="">
          <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:40px;">
          </a>  
          <a class="navbar-brand" href="">ENSV</a>
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample07">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.menu') }}">
                        <b>INICIO</b>
                    </a>  
                </li>

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
         

                  <a class="nav-link active" href="{{ route('admin.evaluacion') }}">
                        <b>EVALUACIÓN DOCENTE</b>
                    </a>  

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

<div class="container" id="container-evaluación">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
          
            <h2><B>PREGUNTAS DE EVALUACIÓN DOCENTE ENSV</B></h2>
            <nav>
                  <form id="busqueda" class="form-inline"  method="get" action="{{ route('admin.consultartPreguntas') }}" role="search">
                      <select name="Buscar_Categoria" class=" form-control custom-select">
                          <option selected="true" disabled="disabled">CATEGORIA</option>
                          @foreach($SeletCategorias as $SeletCategorias)
                          <option value="{{$SeletCategorias->id}}">
                          {{$SeletCategorias->categoria}}
                          </option>
                          @endforeach
                      </select>                   
                      <button id="button_busqueda" class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                          <i class="fas fa-search"></i> Buscar
                      </button>
                      <a id="button_busqueda"  class="float-right btn btn-outline-primary" href="{{ route('admin.consultartPreguntas') }}" role="button">
                          <i class="fas fa-redo"></i> Refrescar 
                      </a>
                  </form>
              </nav>
            
            @if(isset($preguntas)) 

            <table class="table-responsive table table-hover">
                <thead>
                    <th>CATEGORIA</th>
                    <th>PREGUNTA</th>
                    <th>ACCIONES</th>
                </thead>
                    <tbody>
                    @foreach($preguntas as $pregunta )
                        
                        <tr>
                            <td>
                                {{ $pregunta -> categoria}}
                            </td>
                            <td>
                                {{ $pregunta -> pregunta}}
                            </td>
                         
                            <td>
                            <a style="width:90px; margin-bottom: 5px;" href="{{ route('admin.editPregunta', $pregunta->id) }}" class="btn btn-warning btn-sm"> 
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a style="width:90px" href="{{ route('admin.deletePregunta', $pregunta->id)}}" 
                               onclick="return confirm('¿Quieres eliminar esta materia?')" 
                               class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i> 
                               Eliminar
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>  
            {{ $preguntas->appends(request()->query())->links()}} 
            @endif 
        </div>
    </div>
</div>

@endsection