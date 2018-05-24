<?php
    include_once('services/variable.php');
?>
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
  

  <link href="vendor/jquery-modal/jquery.modal.min.css" rel="stylesheet">
  <link href="vendor/jquery-timepicker/jquery.timepicker.css" rel="stylesheet">

  <link href="vendor/bootstrap-fileinput/css/fileinput.css" rel="stylesheet">
  <link href="css/formularios.css" rel="stylesheet">
 

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

    .fc-past{
      background-color: #a1bd9f;
    }

    .fc-other-month{
      background-color: #5e9274;
    }

    .fc-other-month .fc-day-number{
      color: #eee;
    }


  .basic-modal.modal-open {
    overflow: hidden;
  }

  .basic-modal.modal {
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    outline: 0;

    vertical-align: initial;
    max-width: initial;
    box-sizing: initial;
    width: initial;
    background: initial;
    padding: initial;
    border-radius: 8px;
    box-shadow: 0 0 10px #000;
    text-align: initial;
  }

  .basic-modal.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
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
                <a href="dashboardAdmin_CrearCurso.php">Agendar Nuevo Curso</a>
              </li>
              <li>
                <a href="cards.html">Ver Cursos</a>
              </li>
              <li>
                <a href="dashboardAdmin_CrearSala.php">Agregar Sala</a>
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
        
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" id="active-tab">Crear Sala</li>
      </ol>
      

       <!-- Calendar -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-calendar"></i> Planeador de Cursos</div>
        <div class="card-body">
          <div id="calendar" width="100%"></div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>






    <div id="messageModal" class="modal msgModal">
      <p id="msgText"></p>
      <button class="btn btn-danger button1"  >Cerrar</button>
    </div>

    
    <div id="mainModal" class="modal ">
      

      <div class="md-content">
          <div class='md-title'  >
            <h3 id="cursoTitle" >Curso Nuevo/Nombre</h3>
          </div>
          <div class='md-body'>
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                  </div>
                </div>
            </div>
            
            <div class="bodyCursoSlider">
              <div class="cursoForm">

                <div id="slideContainer">


                  <div class="slideCurso" id="slide1">
                    <form id="slide1Form" role="form" data-toggle="validator">
                      <div class="form-group">
                        <label for="nombreCurso">Nombre del curso:</label>
                        <input type="text" class="form-control" id="nombreCurso" name="nombreCurso" data-error="Requerido" data-maxlength="255" autocomplete="off"  placeholder="Ingrese el nombre" required tabindex="-1">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="descCurso">Descripcion</label>
                        <textarea type="text" class="form-control" id="descCurso" name="descCurso" data-maxlength="255" data-error="Requerido" autocomplete="off" placeholder="max 255" required tabindex="-1"></textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                    </form>
                  </div>  


                  <div class="slideCurso" id="slide2">
                    <h6>Introduzca horario del curso:</h6>
                    <form id="slide2Form" role="form" data-toggle="validator">
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="horaIni"> Hora Inicio</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="horaIni" name="horaIni" autocomplete="off" required tabindex="-1">
                            <a href="#" class="input-group-addon selector-curso" id="showHoraIni" tabindex="-1">v</a>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="horaFin"> Hora Final</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="horaFin" name="horaFin" autocomplete="off" required tabindex="-1">
                            <a href="#" class="input-group-addon selector-curso" id="showHoraFin" tabindex="-1">v</a>
                          </div>
                        </div>
                      </div>
                      <div class="divider-curso"></div>
                      <div class="row" id="sala-detalle">
                        <div class="col-md-4">
                          <div class="col-md-12">
                            <img id="img-sala" src="img/placeholder.png" class="picture-curso-sala img-thumbnail">
                          </div>
                          <div class="col-md-6">
                            <div class="cupo-curso">
                              <i class="fa fa-user" aria-hidden="true"></i><span id="cupo-sala">--</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-8">
                          <div class="col-md-12">
                            <label for="sala">Salas Disponibles</label>
                            <select id="sala" name="sala" autocomplete="off" required tabindex="-1">
                              <option disabled selected value> -- Seleccione una opcion -- </option>

                            </select>
                          </div>
                          <div class="col-md-12">
                            <p>Ubicacion</p>
                            <p id="ubi-sala" class="curso-ubi-text text-muted"></p>
                          </div>
                        </div>
                      </div>


                    </form>
                  </div>

                    
                  <div class="slideCurso" id="slide3">
                    <form id="slide3Form">
                      <div class="form-group">
                        <label for="instructor">Instructores </label>
                        <select id="instructor" name="instructor" autocomplete="off" required tabindex="-1">
                          <option disabled selected value> -- Seleccione una opcion -- </option>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <img id="img-instructor" src="img/placeholder.png" class="picture-curso-sala img-thumbnail">
                        </div>
                        <div class="col-md-8">
                          <p>Descripcion</p>
                          <p id="desc-instructor" class="curso-desc-text text-muted"></p>
                        </div>                      
                      </div>
                    </form>
                  </div>


                </div>
              </div>
            </div>
           
            <div class="btn-group">
              <button class="btn btn-danger button1"  >Cancelar</button>
              <button class="btn btn-primary button2" >Anterior</button>
              <button class="btn btn-danger button3"  >Siguiente</button>
            </div>

          </div>
        </div>
    </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © WorkClass 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="basic-modal modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Listo para Salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Salir" debajo si esta listo para cerrar su sesion actual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="#" id="logoutConfirmButton">Salir</a>
          </div>
        </div>
      </div>
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

     <script src='vendor/jquery-modal/jquery.modal.js'></script>
    <script src="vendor/validator/validator.js"></script>
    <script src="vendor/jquery-timepicker/jquery.timepicker.js"></script>

    <script src="vendor/bootstrap-fileinput/js/fileinput.js"></script>
    <script src="vendor/bootstrap-fileinput/js/locales/es.js"></script>

    <script type="text/javascript">



      $('#horaIni').timepicker({ 'step': 15, 'timeFormat': 'h:i A', 'minTime': '8:00am', 'maxTime': '11:30pm', 'disableTextInput': true});
      $('#horaFin').timepicker({ 'step': 15, 'timeFormat': 'h:i A', 'minTime': '8:00am', 'maxTime': '11:30pm', 'disableTextInput': true});

      $('#showHoraIni').on('click', function(e){
        e.preventDefault();
        $('#horaIni').timepicker('show');
      });

      $('#showHoraFin').on('click', function(e){
        e.preventDefault();
        $('#horaFin').timepicker('show');
      });


      

      $('#horaIni').change(function(event) {
        //alert('cambio');
      });

      var mainSel = '#mainModal';
      var btn1Sel = ' .button1';
      var btn2Sel = ' .button2';
      var btn3Sel = ' .button3';


      var mesgSel = '#messageModal';
      var msgText = '#msgText';


      
      var event1Button = function(){
        $.modal.close();
      }

      var openMsgModal = function(msg){

        if(msg){
          $(msgText).html(msg);
        }

        $(mesgSel).modal({
          escapeClose: false,
          clickClose: false,
          exishowClose: false,
          closeExisting: false,
          showClose: false,

        });
      }

      var formularioCurso = function(){
        var self = this;
        self.slideActual = 1;
        self.slideTotales = 3;

        self.container = '#slideContainer';

        self.title = '#cursoTitle';
        
        self.afterAnim = function(){
            $(mainSel + btn1Sel).prop('disabled', false);
            $(mainSel + btn3Sel).prop('disabled', false);
            $(mainSel + btn3Sel).html('Siguiente');
          if(self.slideActual > 1){
            $(mainSel + btn2Sel).prop('disabled', false);
          }
          if(self.slideActual == 1 ){
            $(self.title).html('Crear Curso/Nombre');
          }
          if(self.slideActual == 2 ){
            $(self.title).html('Crear Curso/Sala');
          }

          if(self.slideActual == 3 ){
            $(self.title).html('Crear Curso/Instructor');
            $(mainSel + btn3Sel).html('Crear');
          }

        }

        self.nextSlide = function(){


          if( $('#slide'+ self.slideActual +'Form').validator('validate').has('.has-error').length > 0){
            openMsgModal('Llene todos los campos!!!');
            return;
          }


          if(self.slideActual == 2){
            var timeIni = moment($('#horaIni').val(),"hh:mm A", true);
            var timeFin = moment($('#horaFin').val(),"hh:mm A", true); 
            if(!timeIni.isValid() || !timeFin.isValid() ){
              openMsgModal('Introduzca tiempos validos');
              return;
            }else if(timeFin.isBefore(timeIni)){
              $('#horaIni').val(timeFin.format('hh:mm A'));
              $('#horaFin').val(timeIni.format('hh:mm A'));
            }
          }

          if(self.slideActual < self.slideTotales){
            self.slideActual ++;
            $(mainSel + btn1Sel).prop('disabled', true);
            $(mainSel + btn2Sel).prop('disabled', true);
            $(mainSel + btn3Sel).prop('disabled', true);

            $(self.container).animate({left: "-=600px", }, 200, self.afterAnim); 
          }
        }

        self.prevSlide = function(){
          if(self.slideActual > 1){
            self.slideActual --;
            $(mainSel + btn1Sel).prop('disabled', true);
            $(mainSel + btn2Sel).prop('disabled', true);
            $(mainSel + btn3Sel).prop('disabled', true);

            $(self.container).animate({left: "+=600px", }, 200, self.afterAnim);
          }
        }

      

        self.crearCurso = function(){

        }

        self.closeCurso = function(){
          event1Button();
        }

        self.init = function(){


          $(mainSel + btn1Sel).click(function(e) {
            e.preventDefault();
             self.closeCurso();
          });

          $(mainSel + btn2Sel).click(function(e) {
              e.preventDefault();
              self.prevSlide();
          });

          $(mainSel + btn3Sel).click(function(e) {
              e.preventDefault();
              self.nextSlide();
          });

           $('#sala-detalle').slideUp('fast', function() {
              
          });

 
          $('#horaIni, #horaFin').on('changeTime', function(event) {
            var timeIni = moment($('#horaIni').val(),"hh:mm A", true);
            var timeFin = moment($('#horaFin').val(),"hh:mm A", true); 
            if(!timeIni.isValid() || !timeFin.isValid() ){
              return;
            }else if(timeFin.isBefore(timeIni)){
              $('#horaFin').val(timeIni.format('hh:mm A'));
              $('#horaIni').val(timeFin.format('hh:mm A')); 

            }/* Act on the event */

            $('#sala-detalle').slideDown('slow', function() {
              
            });


          });

           self.reset();



        }

        self.reset  = function(){
          $(mainSel + btn2Sel).prop('disabled', true);

          $(self.container).animate({left: "=0px", }, 0, self.afterAnim) 
        }

      }

      var FormCur = new formularioCurso();
      FormCur.init();

      $(document).ready(function($) {
      

        /*
          $(mainSel + btn1Sel).click(function(e) {
              e.preventDefault();
              event1Button();
          });

          $(mainSel + btn2Sel).click(function(e) {
              e.preventDefault();
              openMsgModal();
          });

        */

          $(mesgSel + btn1Sel).click(function(e) {
              e.preventDefault();
              event1Button();
          });



      });
    </script>


    <script type="text/javascript">

      var rootUrl = 'http://www.workclass.xyz';
      $('#logoutConfirmButton').click(function(event) {
          event.preventDefault();

              var formData = new FormData();

              var url = rootUrl + "/services/logoutService.php"
              $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                contentType: false,
                processData: false,
                async: false,
                data: formData, //$("#login-form").serialize(), // serializes the form's elements.
                 success: function(data)
                 {
                  if(data.success === true){
                     window.location.replace(rootUrl + "/index.php");
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
              alert("solo dias nuevos");
              return false;
          }
        }, 
        dayClick: function(date) {
          if(!date.isBefore(moment()) || date.isSame(moment(), 'day') ){
            //alert('a day has been clicked!');
            
          //$('#modal-1').nifty('show');//({backdrop: 'static', keyboard: false});

            var myevent =   {
              title  : 'event2',
              start  : date,
              nombre: "asdf"
          }
            //$('#calendar').fullCalendar( 'renderEvent', myevent, true);

            FormCur.reset(); 
            $(mainSel).modal({
              escapeClose: false,
              clickClose: false,
              exishowClose: false,
              showClose: false 
            });

          }
        },

        events: [
       
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
          <h3>Curso Nuevo</h3>
        </div>
        <div class='md-body'>
          <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>
          </div>
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
