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

<div class="container" id="container-resgistroalumno">
<link rel="stylesheet" href="{{ asset('css/horari.css') }}" />
<script src="{{ asset('js/horariojs.js') }}"></script>
    <div class="row justify-content-md-center">
        <div class="col-sm-10">
        @isset($message)
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>{{$message}}</strong>
            </div>
        @endif
            <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal"><b>HORARIO</b></h4>
                &nbsp;
                <h6>¡Para la edición de un horario debe de volver a repetir el procedimiento de la creación de horario, 
                    y solo modificar los campos que sean necesario!</h6>
            </div>
            
            <div class="card-body">
            @include ('layouts.error')
                  <div id="div_registro" class="form-group row">
                        <label for="licenciatura" class="col-form-label col-md-4">Selecciona una licenciatura</label>
                         <div class="col-md-8">
                         <select class="custom-select" id="licenciatura" >
                                <option selected="true" disabled="disabled"></option>
                                @foreach($licenciaturas as $licenciatura)
                                <option value="{{$licenciatura->id}}">
                                {{$licenciatura->carrera}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                        <label for="semestre" class="col-form-label col-md-4">Selecciona un semestre</label>
                        <div class="col-sm-8">
                        <select class="custom-select" id="semestre" >
                                <option selected="true" disabled="disabled" value>SEMESTRE</option>
                                <option value="Primero">Primer semestre</option>
                                <option value="Segundo">Segundo semestre</option>
                                <option value="Tercero">Tercer semestre</option>
                                <option value="Cuarto">Cuarto semestre</option>
                                <option value="Quinto">Quinto semestre</option>
                                <option value="Sexto">Sexto semestre</option>
                                <option value="Septimo">Séptimo semestre</option>
                                <option value="Octavo">Octavo semestre</option>
                                <option value="Noveno">Noveno semestre</option>     
                        </select>
                        </div>
                    </div>


                    <div id="div_registro" class="form-group row">
                        <label for="ciclo" class="col-form-label col-md-4">Selecciona el ciclo</label>
                        <div class="col-md-8">
                        <select name="ciclo_id" class="custom-select" id="ciclo" onchange="ciclo();">
                            <option selected="true" disabled="disabled">CICLOS ESCOLARES</option>
                            @foreach($ciclos as $ciclo)
                            <option value="{{$ciclo->id}}">
                            {{$ciclo->ciclo}}
                                </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
    
                    <div id="div_registro" class="form-group row">
                        <label for="grupo" class="col-form-label col-md-4">Selecciona un grupo</label>
                        <div class="col-md-8">
                            <select name="grupo_id" class="custom-select" id="grupo" onchange="grupo();">
                                <option selected="true" disabled="disabled">GRUPOS</option>
                                @foreach($grupos as $grupo)
                                <option value="{{$grupo->id}}">
                                {{$grupo->grupo}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div  id="div_registro" class="form-group row">
                        <label for="dia" class="col-form-label col-md-4">Selecciona el día</label>
                        <div class="col-md-8">
                            <select name='dia' class="custom-select" id="dia" onchange="dia();">
                                <option selected="true" disabled="disabled">DÍA</option>
                                <option>Lunes</option>
                                <option>Martes</option>
                                <option>Miercoles</option>
                                <option>Jueves</option>
                                <option>Viernes</option>
                            </select>
                        </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                        <label for="hora" class="col-form-label col-md-4">Selecciona la hora</label>
                        <div class="col-md-8">
                        <select   class="custom-select" id="hora" onchange="hora();">
                                <option selected="true" disabled="disabled">HORARIO</option>
                                <option>8:00-10:00</option>
                                <option>10:30-12:30</option>
                                <option>12:30-14:30</option>
                                <option>15:00-17:00</option>
                        </select>
                        </div>
                    </div>
    
                    <div id="div_registro" class="form-group row">
                        <label for="materia" class="col-form-label col-md-4">Selecciona la materia</label>
                        <div class="col-md-8">
                        
                        <select name='materia_id' class="custom-select" id="materia" onchange="materia();">

                        </select>
                        </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                        <label for="docente" class="col-form-label col-md-4">Selecciona el docente</label>
                        <div class="col-md-8">
                            <select name='docente_id'  class="custom-select"  id="docente" onchange="docente();">
                                <option selected="true" disabled="disabled">DOCENTES</option>
                                @foreach($docentes as $docente)
                                <option value="{{$docente->id}}">
                                {{$docente->apellido1}}
                                {{$docente->apellido2}}
                                {{$docente->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            &nbsp;
            <h5><b>PREVISUALIZACIÓN DEL HORARIO</b></h5>
            <form method="post" action="/admin/{{$horario->id}}/editHorario">
                 @method('put')
                 @csrf
                 <div id="div_registro" class="form-group row">
                    <label for="ciclo_escolar" class="col-form-label col-sm-4"> LICENCIATURA:</label>
                    <div class="col-sm-8">
                        <input  id="lic" class="form-control" type="text" placeholder="{{ $horarioLicenciatura->carrera }}"
                                style="background-color:transparent" readonly>
                        <input name="licenciatura_id" id="lic_valor" class="form-control" type="text" style="background-color:transparent" hidden >
                    </div>
                </div>


                <div id="div_registro" class="form-group row">
                    <label for="ciclo_escolar" class="col-form-label col-sm-4"> CICLO ESCOLAR:</label>
                    <div class="col-sm-8">
                        <input  id="ciclos" class="form-control" type="text" placeholder="{{ $horarioCiclo->ciclo }}"
                                style="background-color:transparent" readonly>
                        <input name="ciclo_id" id="ciclos_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div>

                <div id="div_registro" class="form-group row">
                    <label for="grupo" class="col-form-label col-sm-4"> GRUPO:</label>
                    <div class="col-sm-8">
                        <input id="grupos"  class="form-control" type="text" placeholder="{{ $horarioGrupo->grupo }}"
                                style="background-color:transparent" readonly>
                        <input name="grupo_id" id="grupos_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <label for="di" class="col-form-label col-sm-4"> DIA:</label>
                    <div class="col-sm-8">
                        <input id="dias" name="dia" class="form-control" type="text" placeholder="{{ $horario->dia }}"
                               style="background-color:transparent" readonly>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <label for="hor" class="col-form-label col-sm-4"> HORA:</label>
                    <div class="col-sm-8">
                        <input id="horas"  name="hora" class="form-control" type="text" placeholder="{{ $horario->hora }}"
                                style="background-color:transparent" readonly>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <label for="mat" class="col-form-label col-sm-4"> MATERIA:</label>
                    <div class="col-sm-8">
                        <input  id="materias"  class="form-control" type="text"  placeholder="{{ $horarioMateria->materia }}"
                                style="background-color:transparent" readonly>
                        <input name="materia_id" id="materias_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <label for="doc" class="col-form-label col-sm-4"> DOCENTE:</label>
                    <div class="col-sm-8">
                        <input  id="docentes"  class="form-control" type="text" style="background-color:transparent" readonly
                                placeholder="{{ $horarioDocente->apellido1 }} {{ $horarioDocente->apellido2 }} {{ $horarioDocente->nombre}}">
                        <input name="docente_id" id="docentes_valor" class="form-control" type="text"  style="background-color:transparent" hidden>
                    </div>
                </div> 

                <div id="div_registro" class="form-group row">
                    <button id="button_registro" class="btn btn-outline-primary col-sm-6" type="submit">
                         <i class="fas fa-save"></i> CREAR HORARIO
                    </button>
                    <div class="col-md-6">                  
                        <a  id="button_cancelar" class="form-control btn btn-outline-danger"  href="{{ route('admin.menu') }}" role="button">
                            <i class="fas fa-window-close"></i>   Cancelar
                        </a>
                    </div>      
                </div>
            </form>
            </div>
        </div> 
    </div>         
</div>  
@endsection

