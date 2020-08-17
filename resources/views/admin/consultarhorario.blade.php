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
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('admin.menu') }}">
                        <b>INICIO</b>
                    </a>  
                </li>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
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
                <li class="nav-item dropdown active">
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
                  <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fas fa-power-off"></i> 
                    CERRAR SESIÓN
                  </a>
                </div>
              </li>
            </ul>
        </div>
      </div>
    </nav>
<br>
<br>
<br>


<div class="container" id="container-resgistrodocente">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
        @isset($message) 
        <div  class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{$message}}</strong>
        </div>                              
        @endif  
      <div class="card-header">
          <h2><b>CONSULTAR HORARIO</b></h2>
        </div>
          <div class="card-body">
             <nav>
                <form id="busqueda" class="form-inline"  method="get" action="{{ route('admin.consultarhorario') }}">

                <select name="carrera" class=" form-control custom-select">
                    <option selected="true" disabled="disabled" >
                        Selecciona la licenciatura
                    </option>
                    @foreach($licenciaturas as $licenciatura)
                       <option value="{{$licenciatura->id}}">
                       {{$licenciatura->carrera}}
                        </option>
                    @endforeach
                </select>
                    &nbsp;
                <select name="c"  class=" form-control custom-select">
                    <option selected="true" disabled="disabled" >
                        Selecciona el ciclo escolar
                    </option>
                    @foreach($ciclos as $ciclo)
                    <option value="{{$ciclo->id}}">
                       {{$ciclo->ciclo}}
                    </option>
                    @endforeach
                </select>
                &nbsp;
                <select name="g"   class=" form-control custom-select">
                    <option selected="true" disabled="disabled" >
                        Selecciona el grupo
                    </option>
                    @foreach($grupos as $grupo)
                    <option value="{{$grupo->id}}">
                    {{$grupo->grupo}}
                    </option>
                    @endforeach
                </select>

                    <button id="button_busqueda" class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </form>
            </nav>

        @if(isset($horarios)) 
            <table class="table-responsive table table-hover">
                <thead>
                    <th>LICENCIATURA</th>
                    <th>CICLO ESCOLAR</th>
                    <th>GRUPO</th>
                    <th>DÍA</th>
                    <th>HORA</th>
                    <th>MATERIA</th>
                    <th>DOCENTE</th>
                    <th></th>
                </thead>                
                    <tbody>
                    @foreach($horarios as $horario) 
                        <tr>
                            <td  style="width:100px">
                            {{$horario->carrera}}  
                            </td>
                            <td  style="width:150px">
                            {{$horario->ciclo}}  
                            </td>
                            <td  style="width:50px">
                            {{$horario->grupo}}  
                            </td>
                            <td style="width:50px">
                            {{ $horario->dia}}  
                            </td>
                            <td style="width:100px">
                            {{ $horario->hora}}  
                            </td>
                            <td style="width:150px">
                            {{$horario->materia}}  
                            </td>
                            <td style="width:200px">
                            {{ $horario->apellido1}}
                            {{ $horario->apellido2}}
                            {{ $horario->nombre}}      
                            </td>
                            <td>
                            <a  style="width:90px" href="{{ route('admin.editHorarios', $horario->id) }}" 
                                class="btn btn-warning btn-sm my-sm-1"> 
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a style="width:90px" href="{{ route('admin.borrarHorarios', $horario->id)}}" 
                               onclick="return confirm('¿Quieres eliminar este horario?')" 
                               class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i> 
                               Eliminar
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table> 
            {{ $horarios->appends(request()->query())->links()}}   
        @endif 
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

