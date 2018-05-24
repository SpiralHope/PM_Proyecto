
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="css/landing/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.css" rel="stylesheet">
    <link href="css/square-form.css" rel="stylesheet">



    <style type="text/css">
      #loginContainer{
        background-color: #fefefe;
        border-radius: 15px;
        border: solid 2px #f4a259;
        padding: 20px;
        padding-top: 35px;
        margin: 20px;

      }

      .form-top-div{
        margin: 10px 0px;
        margin-bottom: 20px;

      }
      
      .form-top-div-text{
        margin: 0px 10px;
        display: inline-block;
      }

      .icon{
      	width: 20px;
      	font-size: 20px;
    	color: #369971
      }

      .input-group-text{
      	background-color: transparent;
      }

@media (min-width: 992px) {
      #navbarResponsive ul li{
        display: inline-block;
        position: relative;
      } }
    #navbarResponsive ul li::before {
      position: absolute;
      content: "";
      width: 3px;
      top: 15%;
      bottom: 15%;
      left: 0;
      background: linear-gradient(to bottom,  rgba(250,250,250,0) 0%,
                                              rgba(250,250,250,1) 10%, 
                                              rgba(250,250,250,1) 90%,
                                              rgba(250,250,250,0) 100% );
    }

  #navbarResponsive ul{
        display: inline-block;
        position: relative;
        margin: 10px 0px 0px 0px;
        padding-top: 10px;
      }

    #navbarResponsive ul::before{
      position: absolute;
      content: "";
      height: 2px;
      top: 0px;
      left: -5px;
      right: -5px;
      background: linear-gradient(to right,   rgba(7,145,120,0) 0%,
                                              rgba(7,145,120,1) 10%, 
                                              rgba(7,145,120,1) 90%,
                                              rgba(7,145,120,0) 100% );
    }

    footer
    {
      padding-left: 100px;
    padding-right: 100px;
    padding-top: 92px;
    background-color: #000;
    color: #848484;
    font-size: 12px;
    text-transform: uppercase;
    font-family: FuturaStd-Heavy;
    letter-spacing: .18em;
    }

    footer .list-header {
    font-size: 11px;
    color: #fff;
  

    </style>


  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/LogoPM.png" class="img-fluid" style="height: 50px;"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto"><li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#inicio">Inicio</a>
            </li><li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#nosotros">Nosotros</a>
            </li><li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#beneficios">Beneficios</a>
            </li><li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#administrar">Administrar</a>
            </li><li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#certificacion">Certificados</a>
            </li><li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#intructores">Instructores</a>
            </li><li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#planes">Planes</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex" id="inicio">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-6" id="pentagonoinicio">
           <h1 class="text-pentagono">WorkClass</h1><br>
<h3 class="text-pentagono2">La mejor opción para<br> la administración de cursos <br>de capacitación tu empresa!</h3>

        <img src="img/WorkClass-Pentagono.png" id="pentagonolanding" class="img-fluid rounded ">
          </div>
          <div class="col-lg-5 mx-auto">
            <div id="loginContainer">
              <div class="form-top-div">
                <div class="col-lg-11 mx-auto">
                  <span class="text-muted form-top-div-text"> No tienes cuenta? </span>
                  <a class="btn btn-primary btn-xl js-scroll-trigger form-top-div-button" href="http://www.workclass.xyz/register.html">  Registrate</a>
                </div>
              </div>
              <form id="login-form" data-toggle="validator" class="text-muted text-left" role="form">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="icon fa fa-envelope"></i></span>
                  </div>
                	<input id="correo" type="email" placeholder="Correo" autocomplete="off" name="email"  class="form-control" data-error="Por favor introduzca un correo valido" aria-label="Correo" required>
                </div>  
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="icon fa fa-lock"></i></span>
                  </div>
                    <input id="pass1" type="password" placeholder="Contraseña" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Entrar</button>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="" id="nosotros">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="col-lg-10 mx-auto text-center">
              <h2 class="section-heading ">¿Que es WorkClass?</h2>
              <hr class="light my-4">
              <p class="text-muted mb-4">WorkClass es una aplicación web para gestión de los recursos humanos. ¡Permite la administración de cursos para empleados, evaluación de desempeño y muchas cosas más! Su objetivo es ayudar a las empresas a facilitar el trabajo de gestionar cursos y evaluar los empleados de una manera rápida y sencilla.</p>

            </div>
          </div>
          <div class="col-lg-5 mx-auto text-center">
            <img src="img/279094-P5UHNF-418.jpg" class="img-fluid rounded ">
          </div>
        </div>
      </div>
    </section>

    <section  id="beneficios" class="bg-primary text-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">A tu disposición</h2>
            <hr class="my-4">
            <p class="text-muted">
              WorkClass cuenta con todo lo que necesitas y mucho más!
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <!--<i class="fa fa-4x fa-chart-area text-primary mb-3 sr-icons"></i>-->
              <img src="img/graph.png" class="sr-icons" height="100px" style="margin: 10px;">
              <h3 class="mb-3">Estadisticas</h3>
              <p class="text-muted mb-0">Obten información destacada sobre tus empleados y cursos en un solo lugar!</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
             <!-- <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i> -->
              <img src="img/online-education.png" class="sr-icons" height="100px" style="margin: 10px;">
              <h3 class="mb-3">Listo para usarse</h3>
              <p class="text-muted mb-0">Pueden empezar a crear cursos de inmediato!</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mx-auto text-center">
            <div class="service-box mt-5 mx-auto">
              <!--<i class="fa fa-4x fa-newspaper text-primary mb-3 sr-icons"></i>-->
              <img src="img/video-conference.png" class="sr-icons" height="100px" style="margin: 10px;">
              <h3 class="mb-3">Intuitivo</h3>
              <p class="text-muted mb-0">Con una simple interfaz, tendras todas las herramientas a tu alcanze!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="" id="administrar">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 mx-auto text-center">
            <img src="img/1157.jpg" class="img-fluid rounded ">
          </div>
           <div class="col-lg-7">
            <div class="col-lg-10 mx-auto text-center">
              <h2 class="section-heading text-primary">Todas las herramientas que necesitas en un solo lugar</h2>
              <hr class="light my-4">
              <p class="text-muted mb-4">WorkClass puede ayudarte a organizar cientos de cursos para todos los empleados de tu empresa, en tan solo unos minutos! Registrate y unete a las miles de empresas que confian en nosotros.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="certificacion" class="bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2 class="section-heading text-primary">Certificaciones</h2>
            <hr class="light my-4">
            <p class="text-muted mb-4">En WorkClass podrás personalizar tus propios diplomas, así como encontrar plantillas y diseños para acreditar a los alumnos de una manera rápida y sencilla!</p>
              <img src="img/diploma.png" class="img-fluid rounded " style="width: 340px">
          </div>
        </div>
      </div>
    </section>

    <section class="" id="intructores">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1 mx-auto text-center">
            <h2 class="section-heading text-primary">Intructores</h2>
            <hr class="light my-4">
            <p class="text-muted mb-4">WorkClass cuenta con prácticas herramientas para hacer mucho más rápido y fácil el trabajo de los maestros.
            ¡En tan solo unos minutos podrán revisar asistencia, calificar y conocer las estadísticas de cada curso!  y mucho más!
</p>
          </div>
          <div class="col-lg-8 text-center" id="profesoresimg">
            <img src="img/694.jpg" class="img-fluid centered">
          </div>
         
        </div>
      </div>
    </section>

      <section  id="planes" class="bg-primary text-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Planes</h2>
            <hr class="my-4">
            <p class="text-muted">
              Encuentra el plan perfecto para tus necesidades. 
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <!--<i class="fa fa-4x fa-chart-area text-primary mb-3 sr-icons"></i>-->
              <img src="img/basic.png" class="sr-icons" height="100px" style="margin: 10px;">
              <h3 class="mb-3">Básico</h3>
              <p class="text-muted mb-0">Obten información destacada sobre tus empleados y cursos en un solo lugar!</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
             <!-- <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i> -->
              <img src="img/avanzado.png" class="sr-icons" height="100px" style="margin: 10px;">
              <h3 class="mb-3">Avanzado</h3>
              <p class="text-muted mb-0">Pueden empezar a crear cursos de inmediato!</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mx-auto text-center">
            <div class="service-box mt-5 mx-auto">
              <!--<i class="fa fa-4x fa-newspaper text-primary mb-3 sr-icons"></i>-->
              <img src="img/premier.png" class="sr-icons" height="100px" style="margin: 10px;">
              <h3 class="mb-3">Premier</h3>
              <p class="text-muted mb-0">Con una simple interfaz, tendras todas las herramientas a tu alcanze!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Crea una cuenta ahora y empieza a conocer todas nuestras herramientas que tenemos para ti!</h2>
        <a class="btn btn-light btn-xl sr-button" href="http://www.workclass.xyz/register.html">Registrar</a>
      </div>
    </section>

    <footer>
    <div class="container" style="display: flex;"">
     <div class="col-md-6">
      <ul>
      <li><div class="col-md-4"><i class="fa fa-facebook"> WorkClass</i></div></li>
      <li><div class="col-md-4"><i class="fa fa-twitter"></i>@Work_Class</div></li>
      <li><div class="col-md-4"><i class="fa fa-instagram"></i> @WorkClass</div></li>
      </ul>
  </div>
      <div class="col-md-6">
      <div class="col-md-4">Phone contact</div>
      <div class="col-md-4">55-55-55-55</i></div>
      <div class="col-md-4">© 2018 MachineGuns</div>
    </div>
 
        
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="vendor/validator/validator.js"></script>


    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

    <script type="text/javascript">
    	
    	var rootUrl = "http://www.workclass.xyz";


      $(document).ready(function() {
        $('#login-form').on('submit', function(e){
              
              e.preventDefault();
              
              var formData = new FormData($("#login-form")[0]);

              var url = rootUrl + "/services/loginService.php";

              $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                contentType: false,
                processData: false,
                data: formData, //$("#login-form").serialize(), // serializes the form's elements.
                success: function(data)
                {
                  if(data.success === true){
                     window.location.replace(rootUrl + "/index.php");
                  }else{
                    alert("Credenciales erroneas");
                    console.log(data);
                  }
                },
                error: function(data){
                }
              }).fail(function( jqXHR, textStatus, errorThrown ) {
                if(console && console.log){
                  console.log(errorThrown);
                  console.log(textStatus);
                }
              });

        });
    
    });

    </script>
  </body>

</html>



