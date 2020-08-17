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
                <li class="nav-item dropdown active">
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
<br>
<br>
<br>


<div class="container" id="container-resgistrodocente">

    <div class="row justify-content-md-center">
        <div class="col-md-8">
            @isset($message) 
            <div  class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{$message}}</strong>
            </div>                              
            @endif  
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
                </form>
            </nav>
        
            @if(isset($ciclos))
           <div id="tablaCiclo">
            <table class="table-responsive table table-hover">
                <thead>
                    <th>CICLO</th>
                    <th></th>      
                </thead>
                <tbody>
                    @foreach($ciclos as $ciclo)

                    <tr>
                        <td>{{$ciclo-> ciclo}}</td>
                        <td>
                        <a href="{{ route('admin.editDatos', $ciclo->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                            Editar
                        </a>
                        <a style="width:90px" href="{{ route('admin.borrarCiclo', $ciclo->id)}}" 
                               onclick="return confirm('¿Quieres eliminar este ciclo escolar?')" 
                               class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i> 
                               Eliminar
                        </a>
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
                    <th>LICENCIATURA</th>
                    <th></th>         
                </thead>
                <tbody>
                    @foreach($licenciaturas as $licenciatura)

                    <tr>
                        <td>{{$licenciatura-> carrera}}</td>
                        <td>
                        <a href="{{ route('admin.editLic', $licenciatura->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a style="width:90px" href="{{ route('admin.borrarLic', $licenciatura->id)}}" 
                               onclick="return confirm('¿Quieres eliminar esta licenciatura?')" 
                               class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i> 
                               Eliminar
                        </a>
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
                    <th>GRUPO</th>
                    <th></th>         
                </thead>
                <tbody>
                    @foreach($grupos as $grupo)

                    <tr>
                        <td>{{$grupo-> grupo}}</td>
                        <td>
                        <a href="{{ route('admin.editGrup', $grupo->id) }}" class="btn btn-warning btn-sm"> 
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a style="width:90px" href="{{ route('admin.borrarGrupo', $grupo->id)}}" 
                               onclick="return confirm('¿Quieres eliminar este grupo?')" 
                               class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i> 
                               Eliminar
                        </a>
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
            <div  id="tablaMaterias" >
            <table class="table-responsive table table-hover">
                <thead>
                   
                    <th>Materia</th> 
                    <th>Carrera</th> 
                    <th>Licenciatura</th>
                    <th></th>       
                </thead>
                <tbody>
                    @foreach($materias as $materia)

                    <tr>

                        <td>{{$materia-> materia}}</td>
                        <td>{{$materia-> semestre}}</td>
                        <td>{{$materia-> carrera}}</td>
                        <td>
                        <a style="width:90px" href="{{ route('admin.editMat', $materia->id) }}" class="btn btn-warning btn-sm"> 
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a style="width:90px" href="{{ route('admin.borrarMateria', $materia->id)}}" 
                               onclick="return confirm('¿Quieres eliminar esta materia?')" 
                               class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i> 
                               Eliminar
                        </a>
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

