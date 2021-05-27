<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h2>Hola {{$email}}, enlace para restablecer tu contraseña</h2>
<p>Para ello simplemente debes de hacer click en el sisguiente enlace:</p>

    <a href="{{url('/alumno/resetPassword/verify/'.$confirmation_code)}}">
         Selecciona este enlace para restablecer tu contraseña
    </a>    
</body>
</html>