<?php
	include_once('variable.php');
	include_once('User.php');
	include_once('models.php');
   	
   	header('Content-type: application/json; charset=utf-8');
	$jsondata = array();
	/*
	function onlyAdmin(){
		if( !( session_id() != '' && $_OPEN == true && isset($_SESSION['tipo_empleado']) && $_SESSION['tipo_empleado'] == "admin"  ))
	    {
	    	$jsondata['success'] = false;
	        echo json_encode($jsondata);
	        exit();
	    }
	}
	*/

	$jsondata['success'] = false;

	$method = $_POST['_method'];
	//$method = 'crear_sala';

	$sala = new Sala();
	$curso = new Curso();
	$usuario = new Empleado();


	switch ($method) {
		case 'crear_instructor':
			
			if( $usuario->crearInstructor( $_POST['nombreInst'], $_POST['apellidoInst'], $_POST['correoInst'], $_POST['descripcionInst'], $_POST['passInst'],$_SESSION['id_empresa'], 'img') ){
				$jsondata['success'] = true;
			}

		break;
		
		case 'crear_sala':

		 	//onlyAdmin();

			
			if($sala->crear($_SESSION['id_empresa'], $_POST['nombreSala'], $_POST['descSala'], $_POST['cupo'], 'img')){
				$jsondata['success'] = true;
			}

			break;
		case 'crear_curso':

			$jsondata['en'] = 'crearCurso';
			$jsondata['id'] = $_SESSION['id'];
			$jsondata['id_empresa'] = $_SESSION['id_empresa'];
			//$fecha = DateTime::createFromFormat( 'Y-m-d', $_POST['fecha']);

			if($curso->crear( $_SESSION['id'], $_SESSION['id_empresa'], $_POST['fecha'], $_POST['nombreCurso'], $_POST['descCurso'], $_POST['horaIni'], $_POST['horaFin'], $_POST['sala'], $_POST['instructor']) ){
				$jsondata['success'] = true;


			}

			/*
				fecha, 2018-6-12
				_method, crear_curso
				nombreCurso, asd
				descCurso, asdasdasd
				horaIni, 08:30 AM
				horaFin, 08:45 AM
				sala, 1
				instructor, 1
			*/
			break;

		case 'obtener_listado_cursos_admin':
			$jsondata['eventos'] = $curso->obtener_listado_cursos_admin($_SESSION['id_empresa']);

			$jsondata['success'] = true;
			break;

		case 'obtener_listado_instructores':
			$jsondata['instructores'] = $curso->obtener_listado_instructores($_SESSION['id_empresa']);

			$jsondata['success'] = true;
		break;

		case 'obtener_listado_salas':
			$jsondata['salas'] = $curso->obtener_listado_salas($_SESSION['id_empresa']);

			$jsondata['success'] = true;
		break;



		default:
			# code...
			break;
	}
	
	
	foreach ($_POST as $key => $value) {
		$jsondata[$key] = $value;
		# code...
	}


    echo json_encode($jsondata);
?>