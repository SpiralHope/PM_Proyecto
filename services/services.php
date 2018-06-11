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


	$method = $_POST['method'];
	$method = 'crear_sala';

	$sala = new Sala();

	switch ($method) {
		case 'crear_sala':

		 	//onlyAdmin();

			
			if($sala->crear($_SESSION['id_empresa'], $_POST['nombreSala'], $_POST['descSala'], $_POST['cupo'], 'img')){
				$jsondata['success'] = true;
			}

			break;
		
		default:
			# code...
			break;
	}
	

 
    echo json_encode($jsondata);
?>