<?php
	include_once('variable.php');
	include_once('User.php');
 	$jsondata = array();
    $jsondata['success'] = false;
	$emp = new Empleado();
	if($emp->loginEmpleado($_POST["email"], $_POST["password"]) > 0){
	 	$jsondata['success'] = true;
	 	
	}

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
?>