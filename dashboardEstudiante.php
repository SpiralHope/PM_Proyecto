<?php include_once('services/variable.php'); ?>
<?php
    
    if(!(session_id() != '' && $_OPEN == true && isset($_SESSION['tipo_empleado']) && $_SESSION['tipo_empleado'] == "admin" ))
    {
        header('Location: '.$GLOBALS['INDEX']);
        exit();
    };
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WorkClass - Empleado</title>

  <!-- Bootstrap core CSS -->
	  <link href="vendor/nifty-modal/nifty.css" rel="stylesheet">
	  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
	  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS -->
	  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <link href="vendor/FullCalendar/fullcalendar.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <style type="text/css">
		.container{ 
			background-color: initial; 
		}

  		.navbar-dark .navbar-nav .nav-link { 
  			color: rgba(255,255,255,.8); 
	  	}

    	.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover {
			color: rgba(255,255,255,.90);
		}

	    #perfil-dropdown a:active{
			background-color: #76de7b;
			color:white !important;
	    }

	    #perfil-dropdown a:active .text-success, #perfil-dropdown a:active .text-danger{
			color:white !important;
    	}

		.bg-turquesa{
			background-color: #369971;
		}

		.bg-dark-turquesa{
			background-color: #293932;
		}

		#mainNav.navbar-dark .navbar-collapse .navbar-sidenav:hover {
			overflow-y: auto;
			overflow-x: hidden;
		}

		@media(min-width: 992px){
			#mainNav.navbar-dark .navbar-collapse .navbar-sidenav {
				background: #324042; /*#1f2d27*/
			}  

			#perfil-dropdown{
				right: 6px;
				left: initial;
				border-top-left-radius: 0px; 
				border-top-right-radius: 0px; 
			}
			#exampleAccordion2{
				overflow-y: auto;
				overflow-x: hidden;
			}
		}

		@media(max-width: 992px){
			#navbarResponsive {
				padding: 16px 16px 0px 16px;
				background: #324042;
				width: 100%;
				margin: 10px -1.0rem -0.5rem -1.0rem;
			}

			#top-navbar{
				margin-bottom: 20px;
			}

			#perfil-dropdown{
				margin-top: 10px;
			}
		}

    	/* perfect scroll test */
			#mainContent{
				position: relative;
			}
			#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level, #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level{
				background: #283233;
			}
		#mainNav.fixed-top.navbar-dark .sidenav-toggler {
			background-color: #283233;
		}

		.fc-event, .fc-event-dot {
			background-color: rgba(2,216,117,0.4);
		}
		.fc-title{
			color: #444444;  
		}

		.fc-event {
			padding-left: 4px;
			border: 1px solid #337b61;
		}
		.dropdown-menu{
			left: initial;
			right: 0px;
		}

		.Icns{ margin: 10px; }
  </style>

</head>

<body class="fixed-nav sticky-footer bg-turquesa" id="page-top">
<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-turquesa fixed-top" id="mainNav">
   <!--Logo / inicio -->
  	<a class="navbar-brand" href="index.html"> 
  		<img src="img/WorkClass-Logo2.png" height="40px" style="margin: -20px 0px -15px;" alt="WorkClass">
  	</a>
  	<!-- Unsure -->
  	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
    </button> 
    <!-- SideBar -->
    <div class="content collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		<!-- Inicio -->
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
				<a class="nav-link" href="index.html">
					<i class="fa fa-fw fa-dashboard"></i>
					<span class="nav-link-text">Inicio</span>
				</a>
			</li>

		<!-- Cursos -->
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-calendar"></i>
					<span class="nav-link-text">Cursos</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseComponents">
					<li>
						<a href="navbar.html">Inscripcion de Cursos</a>
					</li>
					<li>
						<a href="cards.html">Ver Cursos Completados</a>
					</li>
					<li>
						<a href="cards.html">Ver Cursos Pendientes</a>
					</li>
            	</ul>
			</li>

		<!-- Horarios -->
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
				<a class="nav-link" href="#"> <!-- href="tables.html" -->
					<i class="fa fa-fw fa-table"></i>
					<span class="nav-link-text">Horarios</span>
				</a>
			</li>

		<!-- Progresso -->
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
				<a class="nav-link" href="#"> <!-- href="charts.html" -->
					<i class="fa fa-fw fa-area-chart"></i>
					<span class="nav-link-text">Progresso</span>
				</a>
			</li>

		<!-- Compañeros de classe 
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Empleados">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="tables.html" data-parent="#exampleAccordion"> <!-- href="#collapseExamplePages" 
					<i class="fa fa-fw fa-address-book"></i>
					<span class="nav-link-text">Compañeros</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseExamplePages">
					<li>
						<a href="login.html">Agregar Empleado</a>
					</li>
					<li>
						<a href="register.html">Agregar Instructor</a>
					</li>
				</ul>
			</li> 
		-->
		
		<!-- Encuestas -->
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Encuestas">
				<a class="nav-link" href="#">
					<i class="fa fa-fw fa-address-book"></i>
					<span class="nav-link-text">Encuestas</span>
				</a>
			</li>
		</ul>

		<!-- SideBar Btm -->
		<ul class="navbar-nav sidenav-toggler"> 
			<li class="nav-item">
				<a class="nav-link text-center" id="sidenavToggler">
					<i class="fa fa-fw fa-angle-left"></i>
				</a>
			</li>
		</ul>

	<!-- TopRight Bar -->
		<ul class="navbar-nav ml-auto" id="top-navbar">
			<li class="nav-item dropdown">
			<!-- Notification Icon -->
				<a class="nav-link dropdown-toggle mr-lg-2" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-fw fa-bell"></i>
					<span class="d-lg-none">Notificaciones
						<span class="badge badge-pill badge-warning not-alert">
							<span id="numeroNotificaciones">6
							</span> Nuevas
						</span>
              		</span>
              		<span class="indicator text-warning d-none d-lg-block not-alert">
						<i class="fa fa-fw fa-circle"></i>
					</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="userDropdown">
					<h6 class="dropdown-header">Notificaciones:</h6>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">
						<div style="float: left; width: 50px; height: 50px; margin-right: 10px;">
							<img src="img/logo.jpg" class="img-fluid rounded">
						</div>
						<span class="text-success">
							<strong>Actualizacion</strong>
						</span>
						<span class="small float-right text-muted">4:21 PM</span>
						<div class="dropdown-message small">Un nuevo instructor a sido agregado
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">
						<span class="text-danger">
							<strong>
								<i class="fa fa-long-arrow-down fa-fw"></i>Curso
							</strong>
						</span>
						<span class="small float-right text-muted">3:10 PM</span>
						<div class="dropdown-message small">Nuevo Curso Disponible</div>
					</a>
					<div class="dropdown-divider"></div>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item small" href="#">View all alerts</a>
				</div>
			</li>

			<!-- Profile -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle mr-lg-2" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="img/logo.jpg" class="rounded " style="width: 40px; margin: -15px 10px -15px 0px;">
					<span class="">
						<span id="nombreUsuarioNav" tooltip>
						<?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
						</span>
					</span>
				</a>
				<div class="dropdown-menu" id="perfil-dropdown" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#">
						<span class="text-success">
							<strong>
								<i class="fa fa-user-circle fa-fw"></i>Ver Perfil
							</strong>
						</span>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" href="#">
						<span class="text-danger">
							<strong>
								<i class="fa fa-fw fa-sign-out"></i>Salir
							</strong>
						</span>
					</a>
				</div>
			</li>
		</ul>
	</div>
  </nav>

<!-- Content Box -->
  <div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs (Content Nav) -->
		<ol class="breadcrumb">
			
			<li class="breadcrumb-item active" id="active-tab">Inicio
			</li>
		</ol>

		<div class="row">
		<!-- Calendario / Pendientes -->
			<div class="col-md-4">
				<div class="card mb-3">
					<div class="card-header">
						<i class="fa fa-calendar"></i> <strong>Horario</strong> 
					</div>
					<div class="card-body">
						<div id="calendar" width="100%"></div>
					</div>
				</div>
			</div>


		<!-- Classes / Diplomas -->
			<div class="col-md-8">
			<!-- Classes --> 
				<div class="card mb-3">
					<div class="card-header">
						<i class="fa fa-calendar"></i> <strong>Cursos Inscritos</strong>
					</div>
					<div class="card-body">
						<div id="ListaClasses" width="100%">
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="C++">
								<img class="Icns" src="img/PM-Logo-cCpp.gif" height="40px">
							</a>
							<a href="#">
								<img class="Icns" data-toggle="tooltip" title="JavaScript" data-placement="bottom" src="img/PM-Logo-cJS.gif" height="40px">
							</a>
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Arte Digital">
								<img class="Icns" src="img/PM-Logo-cArteD.gif" height="40px">
							</a>
						</div>
					</div>
				</div>

			<!-- Reminders -->
				<div class="card md-3">
					<div class="card-header">
						<i class="fa fa-calendar"></i> <strong>Recordatorios</strong>
					</div>
					<div class="card-body">
						<ul class="nav nav-pills">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
									C++ <span class="badge badge-danger">3</span>
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Tarea 3 <span class="badge badge-danger">11/06</span></a>
									<a class="dropdown-item" href="#">Tarea 4 <span class="badge badge-warning">18/06</span></a>
									<a class="dropdown-item" href="#">Tarea 5 <span class="badge badge-info">25/06</span></a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
									JavaScript <span class="badge badge-warning">1</span>
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Tarea 4 <span class="badge badge-warning">13/06</span></a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link disabled" href="#">Dibujo Artistico <span class="badge badge-secondary">0</span></a>
							</li>
						</ul>
					</div>
				</div>

			<!-- Diplomas --> 
				<div class="card mb-3">
					<div class="card-header">
						<!-- <i class="fa fa-calendar"></i> --> <strong>Diplomas Logrado</strong>
					</div>
					<div class="card-body">
						<div id="DiplomasLogrados">
							<a href="#">
								<img class="Icns" data-toggle="tooltip" title="C" data-placement="bottom" src="img/diploma.png" height="40px">
							</a>
							<a href="#">
								<img class="Icns" data-toggle="tooltip" title="Microprosesadores" data-placement="bottom" src="img/diploma.png" height="40px">
							</a>
							<a href="#">
								<img class="Icns" data-toggle="tooltip" title="Lenguaje Ensamblador" data-placement="bottom" src="img/diploma.png" height="40px">
							</a>
							<a href="#">
								<img class="Icns" data-toggle="tooltip" title="PhotoShop" data-placement="bottom" src="img/diploma.png" height="40px">
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

	<!-- SelfExplanatory -->
	<footer class="sticky-footer">
		<div class="container">
			<div class="text-center">
				<small>Copyright © WorkClass 2018</small>
			</div>
		</div>
	</footer>

	<!-- Scroll-to-Top Btn --> 
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>

<!-- Librerias -->
	<!-- Bootstrap core JavaScript--> 
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
		<script src="vendor/chart.js/Chart.min.js"></script>
		<script src="vendor/datatables/jquery.dataTables.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
 
    <!-- Moment and FullCalendar Plugins -->
    <script src="vendor/moment/moment.js"></script>
    <script src="vendor/FullCalendar/fullcalendar.js"></script>
    <!--
    <script src='vendor/fullcalendar/locale/es.js'></script>

    <script src='vendor/nifty-modal/nifty.js'></script> -->

    <!-- Codigo de Horario -->
	<script type="text/javascript">
		$(document).ready( function(){
			$('[data-toggle="tooltip"]').tooltip(); 
		});
		
		var rootUrl = '';
		$('#logoutConfirmButton').click(function(event) { 
			event.preventDefault();

				var formData = new FormData();
				var url = rootUrl + "services/logoutService.php"
				$.ajax({
					type: "POST",
					url: url,
					dataType: "json",
					contentType: false,
					processData: false,
					data: formData, //$("#login-form").serialize(), // serializes the form's elements.
					success: function(data) {
						if(data.success === true){
							window.location.replace(rootUrl + "index.php");
						}else{
							alert("Error al salir");
						}
					},
					error: function(data){  }
				}).fail(function( jqXHR, textStatus, errorThrown ) {
					if(console && console.log){
						console.log(errorThrown);
						console.log(textStatus);
					}
				});
		});
      
		$('#calendar').fullCalendar({
			defaultView: 'agendaDay',
			height: 350,
			select: function(start, end) {
				if(start.isBefore( moment() )) {
					$('#calendar').fullCalendar('unselect');
					return false;
				}
			}, 
			dayClick: function(date) {
				if(!date.isBefore(moment()) || date.isSame(moment(), 'day') ){
					//alert('a day has been clicked!');
					$('#modal-1').nifty('show');//({backdrop: 'static', keyboard: false});

					var myevent =   {
									title  : 'event2',
									start  : date,
									nombre: "asdf"
					}
					$('#calendar').fullCalendar( 'renderEvent', myevent, true);
				}
			},

			events: 
				[ 
				{
					title  : 'Curso de integracion de interfaces dinamicas',
					start  : '2018-05-02',
				},
				{
					title  : 'Curso 2',
					start  : '2018-05-05'
				},
				{
					title  : 'Curso 3',
					start  : '2018-05-09T12:30:00',
					allDay : false // will make the time show
				}
				],

			eventClick: function(calEvent, jsEvent, view) {
				//alert('Event: ' + calEvent.title + '\nView: ' + view.name);
				//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
				//alert();

				if(calEvent.nombre!=null){
					console.log(calEvent.nombre);
				}

			}
		});

		//$('#ListaClasses').
    </script>

    <!-- Custom scripts for all pages (Sidebar Compression / BckToTop Btn) -->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page ( Class Listing / Progress chart) -->
	<script src="js/sb-admin-datatables.min.js"></script>
	<script src="js/sb-admin-charts.js"></script>
  </div>

  <div class="nifty-modal fall" style="z-index: 90002" id="modal-1">
		<div class="md-content">
			<div class='md-title'>
				<h3>Modal Dialog</h3>
			</div>
			<div class='md-body'>
				<p>This is a modal window. You can do the following things with it:</p>
				<ul>
					<li><strong>Read:</strong> Modal windows will probably tell you something important so don't forget to read what it says.</li>
					<li><strong>Look:</strong> modal windows enjoy a certain kind of attention; just look at it and appreciate its presence.</li>
					<li><strong>Close:</strong> click on the button below to close the modal.</li>
				</ul>
				<button class="btn btn-primary md-close">Close me!</button>
			</div>
		</div>
    </div>
    <div class="md-overlay" style="z-index: 90000"></div>

  </div>
</body>
</html>






