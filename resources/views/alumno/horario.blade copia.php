@extends('layouts.mainalumno')

@section('content')

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="{{ route('alumno.menu') }}">
            <img src="{{ URL::to('assets\img\favicon.png') }}" alt="logo" style="width:38px;">
            </a>  
            <a class="navbar-brand" href="{{ route('alumno.menu') }}"> 
            <b>ENSV</b>    
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                <a class="nav-link " href="{{ route('alumno.menu') }}">
                <b>INICIO</b>  
                </a>
                </li>
                <li class="nav-item  ">
                <a class="nav-link" href="{{ route('alumno.perfil') }}">
                <b>PERFIL</b>  
                </a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('alumno.horarioAlumno',Auth::user()->grupo_id) }}">
                <b>HORARIO</b>  
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">
                <b>
                EVALUACIÓN DOCENTE
                </b>  
                </a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                         <a href="{{ route('alumno.perfil') }}" class="nav-link" >
                         <b>   {{ Auth::user()->nombre }} </b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('alumno.logout') }}" class="nav-link"><i class="fas fa-power-off"></i> <b>Cerrar sesión</b></a>
                    </li>  
                </ul>
            </div>
        </div>
</nav>

<div class="container" id="container-resgistrodocente">
<script src="{{ asset('js/showTables.js') }}"></script>
    <div class="row justify-content-md-center">
        <div class="col-md-10">

            <div class="card-header">
                <h2><b>HORARIO</b></h2>
            </div>
            <div class="card-body">
            <div id="div_registro"  class="form-group row">
                <div  class="col-sm-5">
                    <select id="selecDia" onChange="mostrarTable(this.value);"  class="custom-select">
                        <option  selected="true" disabled="disabled" value="">DÍA</option>
                        <option value="tbLunes">LUNES</option>
                        <option value="tbMartes">MARTES</option>
                        <option value="tbMiercoles">MIERCOLES</option>
                        <option value="tbJueves">JUEVES</option>
                        <option value="tbViernes">VIERNES</option>
                    </select>
                </div>
            </div>

                <div id="Lunes" class="tabcontent table-responsive" style="display: none;">
                &nbsp;
                <h3>LUNES</h3>
                    <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>DOCENTE</th>
                        </thead>                
                        <tbody >
                            @foreach($horarios as $horario) 
                            <tr>
                                <td>
                                    {{ $horario->hora}}  
                                </td>
                                <td>
                                    {{ $horario->materia}}  
                                </td>
                                <td>
                                    {{ $horario->apellido1}}
                                    {{ $horario->apellido2}}
                                    {{ $horario->nombre}}      
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Martes" class="tabcontent" style="display: none;">
                &nbsp;
                <h3>MARTES</h3>
                    <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>DOCENTE</th>
                        </thead>                
                        <tbody >
                            @foreach($horariosMartes as $horarioMartes) 
                            <tr>
                                <td>
                                    {{ $horarioMartes->hora}}  
                                </td>
                                <td>
                                    {{ $horarioMartes->materia}}  
                                </td>
                                <td>
                                    {{ $horarioMartes->apellido1}}
                                    {{ $horarioMartes->apellido2}}
                                    {{ $horarioMartes->nombre}}      
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Miercoles" class="tabcontent" style="display: none;">
                &nbsp;
                <h3>MIÉRCOLES</h3>
                <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>DOCENTE</th>
                        </thead>                
                        <tbody >
                            @foreach($horariosMiercoles as $horarioMiercoles) 
                            <tr>
                                <td>
                                    {{ $horarioMiercoles->hora}}  
                                </td>
                                <td>
                                    {{ $horarioMiercoles->materia}}  
                                </td>
                                <td>
                                    {{ $horarioMiercoles->apellido1}}
                                    {{ $horarioMiercoles->apellido2}}
                                    {{ $horarioMiercoles->nombre}}      
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Jueves" class="tabcontent" style="display: none;">
                &nbsp;
                <h3>JUEVES</h3>
                <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>DOCENTE</th>
                        </thead>                
                        <tbody >
                            @foreach($horariosJueves as $horarioJueves) 
                            <tr>
                                <td>
                                    {{ $horarioJueves->hora}}  
                                </td>
                                <td>
                                    {{ $horarioJueves->materia}}  
                                </td>
                                <td>
                                    {{ $horarioJueves->apellido1}}
                                    {{ $horarioJueves->apellido2}}
                                    {{ $horarioJueves->nombre}}      
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="Viernes" class="tabcontent" style="display: none;">
                &nbsp;
                <h3>VIERNES</h3>
                <table class="table table-hover table-sm">
                        <thead style="background-color: #ff7300;">
                            <th>HORA</th>
                            <th>MATERIA</th>
                            <th>DOCENTE</th>
                        </thead>                
                        <tbody >
                            @foreach($horariosViernes as $horarioViernes) 
                            <tr>
                                <td>
                                    {{ $horarioViernes->hora}}  
                                </td>
                                <td>
                                    {{ $horarioViernes->materia}}  
                                </td>
                                <td>
                                    {{ $horarioViernes->apellido1}}
                                    {{ $horarioViernes->apellido2}}
                                    {{ $horarioViernes->nombre}}      
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

    @endsection