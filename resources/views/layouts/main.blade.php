<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ENSV</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <!--Iconos-->
        <script src="https://kit.fontawesome.com/3a6532c246.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>

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
                  <a class="nav-link" href="{{ route('inicio') }}">
                      <b>INICIO</b>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">
                      <b>
                          CONTACTO
                      </b>
                  </a>
                </li>
            </ul>
			      <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown active">
              <a href="" class="nav-link dropdown-toggle"  id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <B>INICIAR SESIÓN</B>
              </a>
              <div class="dropdown-menu " aria-labelledby="dropdown07">
              <a  class="dropdown-item" href="{{ route('alumno.login') }}"><i class="fas fa-sign-in-alt"></i> ALUMNO</a>
                <a  class="dropdown-item" href="{{ route('docente.login') }}"><i class="fas fa-sign-in-alt"></i> DOCENTE</a>

              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
