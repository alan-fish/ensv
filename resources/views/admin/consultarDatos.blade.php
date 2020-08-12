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
                <li class="nav-item  ">
                <a class="nav-link" href="{{ route('admin.menu') }}"><b>INICIO</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>   DOCENTE </b>
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
                    <b>      ALUMNO </b>
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
                    <b>    HORARIO </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Crear horario</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
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
                    <a class="nav-link" href="#"><b>EVALUACIÓN DOCENTE</b></a>
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


<div class="container" id="container-resgistrodocente">

    <div class="row justify-content-md-center">
        <div class="col-md-8">

            <div class="card-header">
            <h2><b>CONSULTA DE DATOS</b></h2>
            </div>   
            <div class="card-body">
            
            <nav>
                <form id="busqueda" class="form-inline"  method="get" action="{{ route('admin.consutarDatosLicenciatura') }}">
                    <select name="buscarConsulta" style="width:250px" class=" form-control custom-select my-sm-0">
                        <option>CONSULTAR...</option>
                        <option value="Ciclo">CICLOS ESCOLARES</option>
                        <option value="Licenciatura">LICENCIATURAS</option>
                        <option value="Grupo">GRUPOS</option>
                        <option value="Materias">MATERIAS</option>
                    </select>
                           
                    <button id="button_busqueda" class="btn btn-outline-primary my-2 my-sm-1" type="submit">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                   <!-- <a id="button_busqueda" class="btn btn-outline-primary" 
                        href="{{ route('admin.list') }}"role="button">
                        <i class="fas fa-redo"></i>   Refrescar lista
                    </a> -->
                </form>
            </nav>
        
            @if(isset($ciclos))
           <div id="tablaCiclo">
            <table class="table-responsive table table-hover">
                <thead>
                    <th>#</th>      
                    <th>CICLO</th>      
                </thead>
                <tbody>
                    @foreach($ciclos as $ciclo)

                    <tr>
                        <td>{{$ciclo-> id}}</td>
                        <td>{{$ciclo-> ciclo}}</td>
                        <td>
                        <a href="{{ route('admin.editDatos', $ciclo->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i>Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ciclos->appends(request()->query())->links()}} 
            </div>
            @endif

            @if(isset($licenciaturas))  
  
            <div  id="tablaLicenciatura">
            <table class="table-responsive table table-hover">
                <thead>
                    <th>#</th>      
                    <th>LICENCIATURA</th>      
                </thead>
                <tbody>
                    @foreach($licenciaturas as $licenciatura)

                    <tr>
                        <td>{{$licenciatura-> id}}</td>
                        <td>{{$licenciatura-> carrera}}</td>
                        <td>
                        <a href="{{ route('admin.editLic', $licenciatura->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i>Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $licenciaturas->appends(request()->query())->links()}} 
            </div>
            @endif
            
            @if(isset($grupos))  
            <div  id="tablaGrupo" >
            <table class="table-responsive table table-hover">
                <thead>
                    <th>#</th>      
                    <th>GRUPO</th>      
                </thead>
                <tbody>
                    @foreach($grupos as $grupo)

                    <tr>
                        <td>{{$grupo-> id}}</td>
                        <td>{{$grupo-> grupo}}</td>
                        <td>
                        <a href="{{ route('admin.editGrup', $grupo->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i>Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $grupos->appends(request()->query())->links()}} 
            </div>
            @endif
            </div>

            @if(isset($materias))  
            <div  id="tablaGrupo" >
            <table class="table-responsive table table-hover">
                <thead>
                    <th>#</th>      
                    <th>Materia</th> 
                    <th>Carrera</th> 
                    <th>Licenciatura</th>    
                </thead>
                <tbody>
                    @foreach($materias as $materia)

                    <tr>
                        <td>{{$materia-> id}}</td>
                        <td>{{$materia-> materia}}</td>
                        <td>{{$materia-> semestre}}</td>
                        <td>{{$materia-> carrera}}</td>
                        <td>
                        <a href="{{ route('admin.editMat', $materia->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i>Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $materias->appends(request()->query())->links()}} 
            </div>
            @endif
            </div>

        </div>
    </div>
</div>


    
@endsection

