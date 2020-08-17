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
                <li class="nav-item dropdown active">
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
    <br>
<br>
<br>

<div class="container" id="container-resgistrodocente">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class="card-header">
          <h2><b>LISTADO DE DOCENTES ENSV</b></h2>
          </div>
          
        <div class="card-body">

            <nav>
                <form id="busqueda" class="form-inline"  method="get" action="{{ route('admin.list') }}">
                    <input id="input_busqueda" style="width:250px" type="text" name="buscar_nombre" class="form-control  my-4 my-sm-0" 
                        placeholder="Nombre/Nombre completo">
                    <select name="buscar_estado" style="width:250px" class=" form-control custom-select my-sm-0">
                        <option selected="true" disabled="disabled">Estado</option>
                        <option value="Laborando">Laborando</option>
                        <option value="Enfermo">Enfermo</option>
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
        
           <table class="table-responsive table table-hover">
                <thead>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Nombre(s)</th>
                    <th>Fechas ingreso</th>
                    <th>Estado laboral</th>
                    <th>Editar</th>
                </thead>

                
                    <tbody>
                        @foreach($docentes as $docente)
                        
                        <tr>
                            <td>
                                {{ $docente->apellido1 }}
                            </td>

                            <td>
                                {{ $docente->apellido2}}
                            </td>
                            <td>
                                {{ $docente-> nombre}}
                            </td>
                            <td>
                                {{ $docente-> fecha_ingreso}}
                            </td>
                            <td>
                                {{ $docente-> estado}}
                            </td>

                            <td>
                            <a href="{{ route('admin.edit_docente', $docente->id) }}" class="btn btn-warning btn-sm"> 
                                <i class="fas fa-edit"></i>Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>  
            {{ $docentes->links()}} 
        </div>
      </div>
    </div>
  </div>
</div>

    
@endsection

