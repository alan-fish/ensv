<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css Boostrap4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Responsive boostrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     <!--Iconos-->
     <script src="https://kit.fontawesome.com/3a6532c246.js" crossorigin="anonymous"></script>
    <!--Estilo-->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
  
    <title>ESCUELA NORMAL SUPERIOR VERACRUZANA "Dr. Manuel Suarez Trujillo"</title>

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
               <li class="nav-item active">
                  <a class="nav-link" href="">
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
            <li class="nav-item dropdown">
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
         
        </div>
      </div>
    </nav>
      
</head>
 
<body style="background-color:#white;">
<br>
<br>
<br>
    <section  class="ftco-section ftco-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-6 img img-3 d-flex justify-content-center align-items-center">
                    <img  src="{{ URL::to('assets\img\favicon.png') }}" style="width:350px;" class ="img-fluid" alt="imgbg-not found">    
                   </div>
					<div class="col-md-6 wrap-about pl-md-5 ftco-animate">
	          <div class="heading-section">
	            <h2 class="mb-4 justify-content-md-center">
                <b>
                  Bienvenido a la Escuela Normal Superior Veracruzana "Dr. Manuel Suarez Trujillo"
                </b>
              </h2>

	            <p class="mb-4 text-justify" style="font-weight: 600; font-size: 16px;">La Escuela normal Superior Veracruzana “Dr. Manuel Suárez Trujillo” (ENSV) es una institución de nivel superior que depende de la Secretaría de Educación de Veracruz (SEV). Creada por el Gobierno Del Estado De Veracruz, mediante Acuerdo de fecha 11 de julio de 1987, nuestra institución forma parte del Sistema nacional de formación y actualización del magisterio.</p>

	          </div>
					</div>
				</div>
			</div>
		</section>

    <BR>



<BR>
  
<center>
    <section class="ftco-section">
    	<div class="container">

    		<div class="row">
    			<div class="col-md-4">
            <h3 style="font-weight: 600; font-size: 24px;">
              
            </h3>
            
          <img src="{{ URL::to('assets\img\banner.jpg') }}" alt="logo" style="width:350px;">
         
    			</div>
    			<div class="col-md-4">
            <h3 style="font-weight: 600; font-size: 24px;">

            <img src="{{ URL::to('assets\img\Novedad.jpg') }}" alt="logo" style="width:350px;">
          </div>
    			<div class="col-md-4">
            <h3 style="font-weight: 600; font-size: 24px;">
              
              <b>Historia</b>
            
	            <p class="mb-4 text-justify" style="font-weight: 600; font-size: 16px;">Con la convicción de que es necesario avanzar en la consolidación de in Sistema de Educación Normal a partir del periodo escolar 2000 – 2001, además de la modalidad escolarizada, se introduce la formación mixta conforme al Plan de Estudios 1999 de la Licenciatura en educación secundaria, en las siguientes especialidades:

Español, Matemáticas, Biología, Física, Química, Historia, Formación cívica y ética, geografía, Lengua Extranjera (Inglès) y telesecundaria, mismas que se ofrecen para profesores en servicio docente con sede en Xalapa y las subsedes de Poza Rica, Córdoba y San Andrés Tuxtla.</p>
 
          </div>
    		</div>
    	</div>
    </section>
    </center>

<div class="container">
    
    <br>

 
    <p class="mb-4 text-justify" style="font-weight: 600; font-size: 16px;">A partir del ciclo escolar 2018-2019 inicia con los planes de estudio de la Licenciatura en la Enseñanza y el Aprendizaje de las Matemáticas en Educación Secundaria y la Licenciatura en la Enseñanza y el Aprendizaje en Telesecundaria.</p>


     <div class="row">
      <div class="col-md-12 text-center">
          <div class="card-group">
                      <div class="col-md-6">
                              <div class="card border-dark ">
                                  <div class="card-header text-center">
                                  <h5>
                                  <i class="fa fa-facebook-official" style="font-size:36px"></i>
                                    <b>Facebook</b>
                                  </h5>   
                                  </div>
                                  <div class="card-body text-justify">
                                      
                                  </div>
                              </div>
                      </div>
                      <br>
                      <div class="col-md-6">
                          <div class="card border-dark">
                              <div class="card-header text-center">
                                <h5>
                                <i class="fa fa-chrome" style="font-size:36px"></i>
                                  <b>Página SEV</b>
                                </h5>    
                              </div>
                              <div class="card-body text-justify">
                                
                              </div>
                          </div>
                      </div>
            </div>
       </div>
    </div>
</div>
<br>

<footer class="ftco-footer ftco-section">
  <div class="container">
      <div class="row">
          <div class="col-md-12 text-center">
                  <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                TODOS LOS DERECHOS RESERVADOS | ENSV "Dr. Manuel Suarez Trujillo". <i class="icon-heart color-danger" aria-hidden="true">
                    
                </i>
                </p>
          </div>
      </div>
  </div>
  </footer>  

</html>