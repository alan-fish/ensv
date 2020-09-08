@extends('layouts.main-docente')
@section('content')
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="{{ route('docente.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:45px;">
        </a>  
        <a class="navbar-brand" href="{{ route('docente.menu') }}">
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('docente.perfil') }}"><b>PERFIL</b></a>
                </li>
                <li class="nav-item active">
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

<div class="container" id="container-resgistrodocente">
<script src="{{ asset('js/horariosAlumnoDocente.js') }}"></script>
    <div class="row justify-content-md-center">
        <div class="col-md-10">

            <div class="card-header">
                <h2><b>HORARIO ASIGNADOS</b></h2>
            </div>
            <div class="card-body">

                <div class="col-sm-4">
                    <select id="defaultOpen" onclick="openHorario(event, this.value);"  class="custom-select">
                        <option value="Lunes" >LUNES</option>
                        <option value="Martes">MARTES</option>
                        <option value="Miercoles">MIERCOLES</option>
                        <option value="Jueves">JUEVES</option>
                        <option value="Viernes">VIERNES</option>
                    </select>
                </div>
          

                <div id="Lunes" class="tabcontent table-responsive">
                &nbsp;
                <h3>LUNES</h3>
                    <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>LICENCIATURA</th>
                            <th>GRUPO</th>
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>ALUMNOS</th>
                        </thead>                
                        <tbody >
                            @foreach($horarios as $horario) 
                            <tr>
                                <td>
                                {{ $horario->carrera}}  
                                </td>
                                <td>
                                {{ $horario->grupo}}  
                                </td>
                                <td>
                                {{ $horario->hora}}  
                                </td>
                                <td>
                                {{ $horario->materia}}  
                                </td>
                                <td>
                                <a  style="width:90px" href="{{ route('docente.grupos', $horario->id) }}" 
                                    class="btn btn-sm my-sm-1 btn-outline-dark"> 
                                    <i class="fas fa-clipboard-list"></i> LISTA
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Martes" class="tabcontent">
                &nbsp;
                <h3>MARTES</h3>
                    <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>LICENCIATURA</th>
                            <th>GRUPO</th>
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>ALUMNOS</th>
                        </thead>                
                        <tbody >
                            @foreach($horariosMartes as $horarioMartes) 
                            <tr>
                                <td>
                                {{ $horarioMartes->carrera}}  
                                </td>
                                <td>
                                {{ $horarioMartes->grupo}}  
                                </td>
                                <td>
                                {{ $horarioMartes->hora}}  
                                </td>
                                <td>
                                {{ $horarioMartes->materia}}  
                                </td>
                                <td>
                                <a  style="width:90px" href="{{ route('docente.grupos', $horarioMartes->id) }}" 
                                    class="btn btn-sm my-sm-1 btn-outline-dark"> 
                                    <i class="fas fa-clipboard-list"></i> LISTA
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Miercoles" class="tabcontent">
                &nbsp;
                <h3>MIÉRCOLES</h3>
                <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>LICENCIATURA</th>
                            <th>GRUPO</th>
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>ALUMNOS</th>
                        </thead>                
                        <tbody >
                            @foreach($horariosMiercoles as $horarioMiercoles) 
                            <tr>
                                <td>
                                {{ $horarioMiercoles->carrera}}  
                                </td>
                                <td>
                                {{ $horarioMiercoles->grupo}}  
                                </td>
                                <td>
                                {{ $horarioMiercoles->hora}}  
                                </td>
                                <td>
                                {{ $horarioMiercoles->materia}}  
                                </td>
                                <td>
                                <a  style="width:90px" href="{{ route('docente.grupos', $horarioMiercoles->id) }}" 
                                    class="btn btn-sm my-sm-1 btn-outline-dark"> 
                                    <i class="fas fa-clipboard-list"></i> LISTA
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Jueves" class="tabcontent">
                &nbsp;
                <h3>JUEVES</h3>
                <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>LICENCIATURA</th>
                            <th>GRUPO</th>
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>ALUMNOS</th>
                        </thead>                
                        <tbody >
                            @foreach($horariosJueves as $horariosJueves) 
                            <tr>
                                <td>
                                {{ $horariosJueves->carrera}}  
                                </td>
                                <td>
                                {{ $horariosJueves->grupo}}  
                                </td>
                                <td>
                                {{ $horariosJueves->hora}}  
                                </td>
                                <td>
                                {{ $horariosJueves->materia}}  
                                </td>
                                <td>
                                <a  style="width:90px" href="{{ route('docente.grupos', $horariosJueves->id) }}" 
                                    class="btn btn-sm my-sm-1 btn-outline-dark"> 
                                    <i class="fas fa-clipboard-list"></i> LISTA
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Viernes" class="tabcontent">
                &nbsp;
                <h3>VIERNES</h3>
                <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>LICENCIATURA</th>
                            <th>GRUPO</th>
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>ALUMNOS</th>
                        </thead>                
                        <tbody >
                            @foreach($horariosViernes as $horariosViernes) 
                            <tr>
                                <td>
                                {{ $horariosViernes->carrera}}  
                                </td>
                                <td>
                                {{ $horariosViernes->grupo}}  
                                </td>
                                <td>
                                {{ $horariosViernes->hora}}  
                                </td>
                                <td>
                                {{ $horariosViernes->materia}}  
                                </td>
                                <td>
                                <a  style="width:90px" href="{{ route('docente.grupos', $horariosViernes->id) }}" 
                                    class="btn btn-sm my-sm-1 btn-outline-dark"> 
                                    <i class="fas fa-clipboard-list"></i> LISTA
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                              
            </div>

        </div>
    </div>
</div>
<script>
    document.getElementById("defaultOpen").click();
</script>
    @endsection