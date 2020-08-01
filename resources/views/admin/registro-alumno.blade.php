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
                    <b>  DOCENTE </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.list') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar docentes</a>
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.createdocente') }}"> 
                        <i class="fas fa-sign-in-alt"></i> Registar docente</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b>   ALUMNO </b>
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
                    <b>   HORARIO </b>
                    </a>
                    <div class="dropdown-menu">
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i> Crear horario</a>
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

     <script type="text/javascript">
        function ShowSelected()
        {
        var cod = document.getElementById("sexo").value;
        }
    </script>

<div class="container" id="container-resgistroalumno">
  <div class="row justify-content-md-center">
    <div class="col-sm-10">
         @isset($message)
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>{{$message}}</strong>
            </div>
          @endif
                    <h3 style="font-weight: bold">REGISTRAR ALUMNO</h3>          
                    <div class="card-body">

                        @include ('layouts.error')
                        <form method="post" action="{{ route('admin.store') }}">
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
                            <label for="matricula" class="col-form-label col-sm-4">Matrícula:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="matricula">
                            </div>
                        </div>


                        <div id="div_registro" class="form-group row">
                            <label for="sexo" class="col-form-label col-sm-4">Sexo:</label>
                            <div class="col-sm-8">
                            <select id="sexo" class="browser-default custom-select" name="sexo" onchange="ShowSelected();">
                                    <option>Seleecione una opción</option>
                                    <option value="M">Mujer</option>
                                    <option value="H">Hombre</option>
                            </select>
                            </div>
                        </div>

                        <div id="div_registro" class="form-group row">
                            <label for="curp" class="col-form-label col-sm-4">Curp:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="curp">
                            </div>
                        </div>

                        <div id="div_registro" class="form-group row">
                            <label for="licenciatura" class="col-form-label col-sm-4">Licenciatura:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="licenciatura">
                            </div>
                        </div>

                        <div id="div_registro" class="form-group row">
                            <label for="grupo" class="col-form-label col-sm-4">Grupo:</label>
                            <div class="col-sm-8">
                                <input id="registro-input" class="form-control" type="text" name="grupo">
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

                <div id="div_registro" class="form-group row">
                    <button id="button_registro" class="btn btn-outline-primary col-sm-6" type="submit">
                         <i class="fas fa-user-plus"></i>  Registrar
                        </button>         
                        <a  id="button_cancelar" class=" form-control btn btn-outline-danger col-sm-6"  href="{{ route('admin.menu') }}" role="button">
                        <i class="fas fa-window-close"></i>  Cancelar
                        </a> 
                </div>
    
                </form>
                    </div>
            </div>
    </div>
  </div>
</div>


@endsection