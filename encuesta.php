

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/nifty-modal/nifty.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
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
  </style>

</head>

<body class="fixed-nav sticky-footer bg-turquesa" id="page-top">
    
    
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-turquesa fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html"> <img src="img/WorkClass-Logo2.png" height="40px" style="margin: -20px 0px -15px;" alt="WorkClass"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="content collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="index.html">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Principal</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="charts.html">
              <i class="fa fa-fw fa-area-chart"></i>
              <span class="nav-link-text">Graficas</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" href="tables.html">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">Tablas</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-calendar"></i>
              <span class="nav-link-text">Cursos</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">
              <li>
                <a href="navbar.html">Agendar Nuevo Curso</a>
              </li>
              <li>
                <a href="cards.html">Ver Cursos</a>
              </li>
              <li>
                <a href="cards.html">Modificar Cursos</a>
              </li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Empleados">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-address-book"></i>
              <span class="nav-link-text">Empleados</span>
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
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto" id="top-navbar">
        


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Notificaciones
                <span class="badge badge-pill badge-warning not-alert"><span id="numeroNotificaciones">6</span> Nuevas</span>
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
                <div class="dropdown-message small">Un nuevo instructor a sido agregado</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down fa-fw"></i>Curso</strong>
                </span>
                <span class="small float-right text-muted">3:10 PM</span>
                <div class="dropdown-message small">Nuevo Curso Disponible</div>
              </a>
              <div class="dropdown-divider"></div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">View all alerts</a>
            </div>
            
          </li>
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="img/logo.jpg" class="rounded " style="width: 40px; margin: -15px 10px -15px 0px;">
              <span class=""><span id="nombreUsuarioNav" tooltip><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?></span>
              </span>
            </a>
            <div class="dropdown-menu" id="perfil-dropdown" aria-labelledby="userDropdown">
             
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-user-circle fa-fw"></i>Ver Perfil</strong>
                </span>
              </a>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-fw fa-sign-out"></i>Salir</strong>
                </span>
              </a>
            </div>
            
          </li>
        </ul>

    </div>

  </nav>
  <div class="content-wrapper">     
      <!-- nifty modal modals -->

   
    <div class="container-fluid">
        
    <form action="mailto:emaildelaempresaquehaceelformulario@email.com" method="post" enctype="text/plain">

Nombre: <input type="text" name="nombre" size="25" maxlength="50"><br><br>

Apellidos: <input type="text" name="apellidos" size="35" maxlength="100">

<br><br>

Correo electrónico: <input type="text" value="@" name="correo" size="40" maxlength="100">

<br><br>

Población: <input type="text" name="poblacion" size="15" maxlength="50">

<br><br>

Provincia: <input type="text" name="provincia" size="15" maxlength="50">

<table width="100%" border="0" cellspacing="0" cellpadding="10">

<tr>

<td>Edad:

<br>

<input type="radio" name="edad" value="020"> 0-20

<br>

<input type="radio" name="edad" value="2040" checked> 20-40

<br>

<input type="radio" name="edad" value="4060"> 40-60

<br>

<input type="radio" name="edad" value="60100"> 60-100</td>

<td>&iquest;C&oacute;mo nos conociste?<br>

<input type="checkbox" name="conocer">

A trav&eacute;s de un amigo.<br>

<input type="checkbox" name="conocer">

A trav&eacute;s de un buscador.<br>

<input type="checkbox" name="conocer">

Navegando por la red.<br>

<input type="checkbox" name="conocer">

Otros</td>

</tr>

</table>

Opinión sobre nuestra p&aacute;gina web<br>

<textarea cols="40" rows="5" name="opinion">Escriba aquí su opinión...</textarea>

<br><br>

Tiene alguna sugerencia...

<br>

<textarea cols="40" rows="5" name="sugerencias">Escriba aquí sus sugerencias...</textarea>

<br><br>

&iquest;C&uacute;anto navegas por intenet? (Se&ntilde;ala la opci&oacute;n que

m&aacute;s se acerque)<br>

<select name="frecuencia" size="2">

<option value="1">2 horas al día.

<option value="2">4 horas al día.

<option value="3">10 horas a la semana.

<option value="4">20 horas al mes.

</select>

<br>

<br>

<table width="50%" border="0" align="center" cellpadding="10" cellspacing="0">

<tr>

<td><div align="center">

<input type="submit" value="Enviar formulario">

</div></td>

<td><div align="center">

<input type="Reset" value="Borrar formulario">

</div></td>

</tr>

</table>

</form>
      
        </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
 
    <!-- Moment and FullCalendar Plugins -->

    <script src="vendor/moment/moment.js"></script>
    <script src="vendor/FullCalendar/fullcalendar.js"></script>
    <script src='vendor/fullcalendar/locale/es.js'></script>

    <script src='vendor/nifty-modal/nifty.js'></script>

    <script type="text/javascript">

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
                 success: function(data)
                 {
                  if(data.success === true){
                     window.location.replace(rootUrl + "index.php");
                  }else{
                    alert("Error al salir");
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
      
      $('#calendar').fullCalendar({
        // put your options and callbacks here
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

        events: [
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

          alert('Event: ' + calEvent.title);
          alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
          alert('View: ' + view.name);

          if(calEvent.nombre!=null){
            alert(calEvent.nombre);
          }

        }
      })

    </script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
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
  
</body>

</html>