<?php
	include_once('variable.php');
	include_once('User.php');
 	$jsondata = array();
	$emp = new Empleado();
	$emp->logoutUser();
	$jsondata['success'] = true;

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
?>