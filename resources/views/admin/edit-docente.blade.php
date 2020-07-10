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
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>   DOCENTE</b>
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
                    <b>    ALUMNO </b>
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
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Crear horario</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#"> <b>EVALUACIÓN DOCENTE </b></a>
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
    <div class="col-md-10">
        @isset($message)
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>{{$message}}</strong>
            </div>
        @endif
      <div class="card-header">
          <h3 style="font-weight: bold">DATOS DEL DOCENTE</h3>          
            <div class="card-body">
              
                @include ('layouts.error')

                <form  action="/admin/{{$docentes->id}}/edit-docente" method="post">
                    @method('put')
                    {{ csrf_field() }}

                    <div id="div_registro" class="form-group row">
                        <label for="apellido1" class="col-form-label col-sm-4">Primer apellido:</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="apellido1" value="{{ $docentes->apellido1 }}">
                        </div>
                    </div>      

                    <div id="div_registro"  class="form-group row">
                        <label for="apellido2" class="col-form-label col-sm-4">Segundo apellido:</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="apellido2"  value="{{ $docentes->apellido2 }}">
                        </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                        <label for="nombre" class="col-form-label col-sm-4">Nombre(s):</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="nombre" value="{{ $docentes->nombre }}">
                        </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                        <label for="estado" class="col-form-label col-sm-4">Estado laboral:</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="estado" value="{{ $docentes->estado }}">
                        </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                        <label for="fecha_ingreso" class="col-form-label col-sm-4">Fecha de ingreso:</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="fecha_ingreso" value="{{ $docentes->fecha_ingreso }}">
                        </div>
                    </div>
                    

                    <div id="div_registro" class="form-group row">
                    <label for="licenciatura" class="col-form-label col-sm-4">Licenciaturas:</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="licenciatura"  value="{{ $docentes->licenciatura }}">
                            <input id="registro-input" class="form-control" type="text" name="licenciatura1" value="{{ $docentes->licenciatura1 }}">
                            <input id="registro-input" class="form-control" type="text" name="licenciatura2" value="{{ $docentes->licenciatura2 }}">
                        </div>
                    </div>
                    
                    <div id="div_registro" class="form-group row">
                        <label for="maestria" class="col-form-label col-sm-4">Maestrías: </label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="maestria"  value="{{ $docentes->maestria }}">
                            <input id="registro-input" class="form-control" type="text" name="maestria1" value="{{ $docentes->maestria1 }}">
                            <input id="registro-input" class="form-control" type="text" name="maestria2" value="{{ $docentes->maestria2 }}">
                        </div>
                    </div>
                    

                    <div id="div_registro" class="form-group row">
                        <label for="doctorado" class="col-form-label col-sm-4">Doctorados:</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="doctorado"  value="{{ $docentes->doctorado }}">
                            <input id="registro-input" class="form-control" type="text" name="doctorado1" value="{{ $docentes->doctorado1 }}">
                            <input id="registro-input" class="form-control" type="text" name="doctorado2" value="{{ $docentes->doctorado2 }}">
                        </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                         <label for="tipo_de_contratacion" class="col-form-label col-sm-4">Tipo de contratación:</label>
                         <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" value="{{ $docentes->tipo_de_contratacion }}"disabled>
                        </div>
                    </div>      

                    <div id="div_registro" class="form-group row">
                        <label for="tipo_de_contratacion" class="col-form-label col-sm-4">Editar Tipo de contración:</label>
                        <div class="col-sm-8">
                            <select id="tipo_de_contratacion"  class="custom-select"  name="tipo_de_contratacion" onchange="ShowSelected();">
                                    <option>Seleecione una opción</option>
                                    <option value="Tiempo completo">Tiempo Completo</option>
                                    <option value="Medio tiempo">Medito tiempo</option>
                            </select>
                        </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                            <label for="email" class="col-form-label col-sm-4">Correo electrónico:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="email" value="{{ $docentes->email }}" name="email">
                            </div>
                    </div>

                    <div id="div_registro" class="form-group row">
                        <button id="button_registro" class="btn btn-outline-primary col-sm-5" type="submit">Actualizar</button>
                        <div class="col-md-6">                  
                            <a  id="button_cancelar" class=" form-control btn btn-outline-danger"  href="{{ route('admin.menu') }}" role="button">
                                Cancelar
                            </a>
                        </div>      
                    </div>

                    </form>
            </div>
      </div>
    </div>
  </div>
</div>


         
@endsection