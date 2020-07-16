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
                <li class="nav-item active ">
                <a class="nav-link" href="{{ route('admin.menu') }}"><b>INICIO</b></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <b> DOCENTE</b>
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
                    <b> ALUMNO </b>
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
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.horario') }}">
                        <i class="fas fa-sign-in-alt"></i>Crear horario</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                    <b> EVALUACIÓN DOCENTE
                    </b>
                    </a>
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


     <div class="container" id="container_menu">

        <div>

          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><b>CONSULTAR HORARIO</b></h4>
            </div>
            <br>
            <div class="card-body">

            <link rel="stylesheet" href="{{ asset('css/horari.css') }}" />






            
<form action="">

            <div id= "">
<label><select style="width:280px" class="select-css" id="ciclo" onchange="ciclo();">
<option selected="true" disabled="disabled">Seleccione ciclo escolar...</option>
<option>Ago20-Dic20</option>
<option>Ene21-Jun21</option>
<option>Ago21-Dic21</option>
<option>Ene22-Jun22</option>
<option>Ago22-Dic22</option>
<option>Ene23-Jun23</option>
<option>Ago23-Dic23</option>
</select></label>
</div>

<div id= "">
<label><select style="width:280px" class="select-css" id="grupo" onchange="grupo();">
<option selected="true" disabled="disabled">Seleccione un grupo...</option>
<option></option>
</select></label>
</div>

<input type="submit"  class="btn btn-lg btn-block btn-primary"   value="Consultar">
</form>





            <div class=""  id="contenedor">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
    <label for="tab-1" class="tab-label-1">Lunes</label>
    
    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
    <label for="tab-2" class="tab-label-2">Martes</label>
    
    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
    <label for="tab-3" class="tab-label-3">Miercoles</label>
    
    <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
    <label for="tab-4" class="tab-label-4">Jueves</label>

    <input id="tab-5" type="radio" name="radio-set" class="tab-selector-5" />
    <label for="tab-5" class="tab-label-5">Viernes</label>

    
                            
    <div class="content">

        <div class="content-1">
            Horario de lunes
        </div>

        <div class="content-2">
            Horario de martes
        </div>

        <div class="content-3">
            Horario de miercoles
        </div>

        <div class="content-4">
            Horario de jueves
        </div>

        <div class="content-5">
            Horario de viernes
        </div>

    </div>

<br>

    <div>
<a class="btn btn-lg btn-block btn-primary" href="{{ route('admin.horario') }}">Regresar</a> <br></br>
</div>





@endsection
