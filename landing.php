<?php
    include_once('services/variable.php');
?>
<?php 
    if( (session_id() != '' && $GLOBALS['_OPEN'] == true ) ) {
        header('Location: '.$GLOBALS['INDEX']."/index.php");
        exit();
    }

?>

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

      .form-top-div-button{      }

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
      }
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
  }

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
          <div class="col-lg-6">
            <div class="col-lg-10 mx-auto">
              <!-- <h1 class="text-uppercase">
                <strong>Bienvenido</strong>
              </h1> 
              <hr> -->
            </div>
            <div class="col-lg-4 mx-auto">
              
            </div>
            
          </div>
          <div class="col-lg-5 mx-auto">
            <div id="loginContainer">
              <div class="form-top-div">
                <div class="col-lg-11 mx-auto">
                  <span class="text-muted form-top-div-text"> No tienes cuenta? </span>
                  <a class="btn btn-primary btn-xl js-scroll-trigger form-top-div-button" href="#planes">  Registrate</a>
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
              <h2 class="section-heading ">Todas las herramientas que necesitas en un solo lugar</h2>
              <hr class="light my-4">
              <p class="text-muted mb-4">WorkClass puede ayudarte a organizar cientos de cursos para todos los empleados de tu empresa, en tan solo unos minutos! Registrate y unete a las miles de empresas que confian en nosotros.</p>
            </div>
          </div>
          <div class="col-lg-5 mx-auto text-center">
            <img src="img/QuienesSomos_landing.jpg" class="img-fluid rounded ">
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
              Ensd assda sad asd asd asd aasd asd asd sad
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <!--<i class="fa fa-4x fa-chart-area text-primary mb-3 sr-icons"></i>-->
              <img src="img/PM-Logo-Notificaciones.jpg" class="sr-icons" height="60px" style="margin: 10px;">
              <h3 class="mb-3">Estadisticas</h3>
              <p class="text-muted mb-0">Obten información destacada sobre tus empleados y cursos en un solo lugar!</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
             <!-- <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i> -->
              <img src="img/PM-Logo-Encuestas.jpg" class="sr-icons" height="60px" style="margin: 10px;">
              <h3 class="mb-3">Listo para usarse</h3>
              <p class="text-muted mb-0">Pueden empezar a crear cursos de inmediato!</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mx-auto text-center">
            <div class="service-box mt-5 mx-auto">
              <!--<i class="fa fa-4x fa-newspaper text-primary mb-3 sr-icons"></i>-->
              <img src="img/PM-Logo-Horario.jpg" class="sr-icons" height="60px" style="margin: 10px;">
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
            <img src="img/Admin_landing.jpg" class="img-fluid rounded ">
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
            <p class="text-muted mb-4">WorkClass puede ayudarte a organizar cientos de cursos para todos los empleados de tu empresa, en tan solo unos minutos! Registrate y unete a las miles de empresas que confian en nosotros.</p>
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
            <p class="text-muted mb-4">WorkClass puede ayudarte a organizar cientos de cursos para todos los empleados de tu empresa, en tan solo unos minutos! Registrate y unete a las miles de empresas que confian en nosotros.</p>
          </div>
          <div class="col-lg-3 text-center">
            <img src="img/Tutores_01_Landing.jpg" class="img-fluid rounded ">
          </div>
          <div class="col-lg-3 text-center">
            <img src="img/Tutores_02_Landing.jpg" class="img-fluid rounded ">
          </div>
          <div class="col-lg-3 text-center">
            <img src="img/Tutores_03_Landing.jpg" class="img-fluid rounded ">
          </div>
          <div class="col-lg-3 text-center">
            <img src="img/Tutores_04_Landing.jpg" class="img-fluid rounded ">
          </div>
        </div>
      </div>
    </section>


    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
        <a class="btn btn-light btn-xl sr-button" href="http://startbootstrap.com/template-overviews/creative/">Download Now!</a>
      </div>
    </section>

    <section>
    	filler del landing page
	<a href="login.html">Ingresar</a>
	<a href="register.html">Registrarse</a>
	<a href="forgottenPassword.html">Perdio Contraseña</a>

    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>


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
    	
    	 var rootUrl = "";
      $(document).ready(function() {
        $('#login-form').on('submit', function(e){
                    e.preventDefault();
 var formData = new FormData($("#login-form")[0]);
              var url = rootUrl + "services/loginService.php"
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
                     window.location.replace(rootUrl + "index.php");
                  }else{
                    alert("Credenciales erroneas");
                    console.log(data);
                  }
                     //alert(data); // show response from the php script.
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

