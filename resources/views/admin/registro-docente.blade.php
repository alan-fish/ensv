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
<script src="{{ asset('js/show_form.js') }}"></script>
  <div class="row justify-content-md-center">
    <div class="col-md-10">

        @isset($message)
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{$message}}</strong>
            </div>
        @endif 
        <div class="card-header">
            <h3 style="font-weight: bold">REGISTRO DE DOCENTE</h3>   
        </div>
        <div class="card-body">
       
                @include ('layouts.error')

                <form method="post" action="{{ route('admin.storedocente') }}">
                    {{ csrf_field() }}

                <div id="div_registro" class="form-group row">
                    <label for="apellido1" class="col-form-label col-sm-4">Primer apellido:</label>
                    <div class="col-sm-8">
                        <input id="registro-input" class="form-control" type="text" name="apellido1">
                    </div>
                </div>                    

                <div id="div_registro"  class="form-group row">
                    <label for="apellido2" class="col-form-label col-sm-4">Segundo apellido:</label>
                    <div class="col-sm-8">
                        <input id="registro-input" class="form-control" type="text" name="apellido2">
                    </div>
                </div>

                <div id="div_registro" class="form-group row">
                  <label for="nombre" class="col-form-label col-sm-4">Nombre(s):</label>
                  <div class="col-sm-8">
                        <input id="registro-input" class="form-control" type="text" name="nombre">
                  </div>
                </div>

                <div id="div_registro" class="form-group row">
                  <label for="estado" class="col-form-label col-sm-4">Estado laboral:</label>
                  <div class="col-sm-8">
                        <input id="registro-input" class="form-control" type="text" name="estado">
                  </div>
                </div>

                <div id="div_registro" class="form-group row">
                  <label for="fecha_ingreso" class="col-form-label col-sm-4">Fecha de ingreso:</label>
                  <div class="col-sm-8">
                    <input id="registro-input" class="form-control" type="text" name="fecha_ingreso" placeholder="AAA-MM-DD">
                  </div>
                </div>
                
                <div id="div_registro"  class="form-group row">
                <label for="licenciatura" class="col-form-label col-sm-4"></label>    
                    <div  class="col-sm-8">
                    <select onChange="mostrarDiv(this.value);" class="custom-select">
                        <option value="">Selecciona que campos quieres llenar...</option>
                        <option value="licenciatura">Colocar Licenciaturas</option>
                        <option value="maestria">Colocar Maestrías</option>
                        <option value="doctorado">Colocar Doctorados</option>
                     </select>
                    </div>
                </div>

                <div id="licenciatura" style="display: none;">
                    <div id="div_registro" class="form-group row">
                        <label for="licenciatura" class="col-form-label col-sm-4">Licenciaturas:</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="licenciatura"  placeholder="Licenciatura 1">
                            <input id="registro-input" class="form-control" type="text" name="licenciatura1" placeholder="Licenciatura 2">
                            <input id="registro-input" class="form-control" type="text" name="licenciatura2" placeholder="Licenciatura 3">
                        </div>
                    </div>
                </div>

                <div id="maestria" style="display: none;">
                    <div id="div_registro" class="form-group row">
                        <label for="maestria" class="col-form-label col-sm-4">Maestrías: </label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="maestria"  placeholder="Maestría 1">
                            <input id="registro-input" class="form-control" type="text" name="maestria1" placeholder="Maestría 2">
                            <input id="registro-input" class="form-control" type="text" name="maestria2" placeholder="Maestría 3">
                        </div>
                    </div>
                </div>

                <div id="doctorado" style="display: none;">
                    <div id="div_registro" class="form-group row">
                        <label for="doctorado" class="col-form-label col-sm-4">Doctorados:</label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="text" name="doctorado"  placeholder="Doctorado 1">
                            <input id="registro-input" class="form-control" type="text" name="doctorado1" placeholder="Doctorado 2">
                            <input id="registro-input" class="form-control" type="text" name="doctorado2" placeholder="Doctorado 3">
                        </div>
                    </div>
                </div>

                <div id="div_registro" class="form-group row">
                    <label for="tipo_de_contratacion" class="col-form-label col-sm-4">Tipo de contratación:</label>
                    <div class="col-sm-8">
                        <select id="tipo_de_contratacion" class="custom-select" 
                                name="tipo_de_contratacion" onchange="ShowSelected();">
                            <option>Seleecione una opción</option>
                            <option value="Medio tiempo">Medio Tiempo</option>
                            <option value="Tiempo completo">Tiempo Completo</option>
                        </select>
                    </div>
                </div>

                <div id="div_registro" class="form-group row">
                    <label for="email" class="col-form-label col-sm-4">Correo electrónico:</label>
                    <div class="col-sm-8">
                        <input id="registro-input" class="form-control" type="email" name="email" placeholder="Ejemplo: usuario@servidor.com">
                    </div>
                </div>

                <div id="div_registro" class="form-group row">
                    <label for="password" class="col-form-label col-sm-4">Contraseña</label>
                    <div class="col-sm-8">
                        <input id="registro-input" class="form-control" type="password" name="password">
                    </div>
                </div>

                <div id="div_registro" class="form-group row">
                    <label for="password_confirmation" class="col-form-label col-sm-4">Confirmar contraseña</label>
                    <div class="col-sm-8">
                        <input id="registro-input" class="form-control" type="password" name="password_confirmation">
                    </div>
                </div>

                <div id="div_registro">
                    <a  id="button_cancelar" class=" form-control btn btn-outline-danger col-sm-4 mx-1"  href="{{ route('admin.list') }}" role="button">
                        <i class="fas fa-window-close"></i> REGRESAR
                    </a>        
                    <button id="button_registro" class="btn btn-outline-primary col-sm-4 " type="submit">
                        <i class="fas fa-user-plus"></i> REGISTRAR
                    </button> 
                </div>

                </form>
            </div>
        </div>

    </div>
  </div>
</div>


@endsection
