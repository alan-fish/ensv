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
                        <a id="link-dropdown" class="nav-link" href="{{ route('admin.consultarhorario') }}">
                        <i class="fas fa-sign-in-alt"></i> Consultar horarios</a>
                        <a id="link-dropdown" class="nav-link" href="#">
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
              <h4 class="my-0 font-weight-normal"><b>CREAR HORARIO</b></h4>
            </div>
            <br>
            <div class="card-body">
            <link rel="stylesheet" href="{{ asset('css/horari.css') }}" />
            <script src="{{ asset('js/horariojs.js') }}"></script>



            



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




<div id= "">
<label><select style="width:280px" class="select-css" id="dia" onchange="dia();">
<option selected="true" disabled="disabled">Seleccione un dia...</option>
<option>Lunes</option>
<option>Martes</option>
<option>Miercoles</option>
<option>Jueves</option>
<option>Viernes</option>
</select></label>
</div>




<div id= "">
<label><select style="width:280px" class="select-css" id="hora" onchange="hora();">
<option selected="true" disabled="disabled">Seleccione un horario...</option>
<option>8:00-10:00</option>
<option>10:30-12:30</option>
<option>12:30-14:30</option>
<option>15:00-17:00</option>
</select></label>
</div>
      


        

<div id= "">
<label><select style="width:280px" class="select-css" id="docente" onchange="docente();">
<option selected="true" disabled="disabled">Seleccione un docente...</option>
<option></option>
</select></label>
</div>





<div id= "">
<label><select style="width:280px" class="select-css" id="materia" onchange="materia();">
<option selected="true" disabled="disabled">Seleccione una materia...</option>
<option></option>
</select></label>
</div>


<br>

<form action="" method="">

<h6> CICLO ESCOLAR: <input style="auto" name="cic"  type="text" id="ciclos" style="background-color:transparent"   readonly /></h6> 

<h6> GRUPO: <input style="width:auto" name="gru"  type="text" id="grupos" style="background-color:transparent"   readonly /></h6> 

<h6> DIA: <input style="width:auto" name="di"  type="text" id="dias" style="background-color:transparent"   readonly /></h6> 

<h6> HORA: <input style="width:auto" name="hor"   type="text" id="horas" style="background-color:transparent"  readonly /></h6>

<h6> DOCENTE: <input style="width:auto" name="doc"   type="text" id="docentes" style="background-color:transparent"   readonly /></h6>

<h6> MATERIA: <input style="width:auto" name="mat"  type="text" id="materias" style="background-color:transparent"   readonly /></h6>

<br>

<input type="submit"  class="btn btn-lg btn-block btn-primary"   value="Asignar">

<br>

</form>


<div>
<a class="btn btn-lg btn-block btn-primary" href="{{ route('admin.consultarhorario') }}">Consultar horario</a> <br></br>
</div>
<div>




@endsection
