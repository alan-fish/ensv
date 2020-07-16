<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css Boostrap4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Responsive boostrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     <!--Iconos-->
     <script src="https://kit.fontawesome.com/3a6532c246.js" crossorigin="anonymous"></script>
    <!--Estilo-->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo-docentes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo-contraseña.css') }}">
</head>
<body>
<br>

<div class="container-fluid">
<h2>
    RUTAS DE INICIO DE SESIÓN
    </h2>
    <h3>
    Hola mundo
    </h3>
</div>

<br>
    <div class="containter">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                           INICIOS DE SESIÓN
                        </div>
                        <div class="card-body">
                            <a href="{{ route('admin.login') }}">Ir a inicio de sesión de administrador</a>
                            <br>
                            <a href="{{ route('alumno.login') }}">Ir a inicio de sesión alumno</a>
                            <br>
                            <a href="{{ route('docente.login') }}">Ir a inicio de sesión docente</a>
                            <br>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</body>
</html>