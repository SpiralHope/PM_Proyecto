<?php
	include_once('variable.php');
	include_once('User.php');
 	$jsondata = array();
    $jsondata['success'] = false;
    foreach ($_POST as $key => $value) {
		$jsondata[$key] = $value;
	}


	$emp = new Empleado();
	if($emp->registroEmpresa($_POST) ){
	 	$jsondata['success'] = true;
	}
	

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
?>