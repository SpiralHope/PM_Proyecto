<?php
  	include_once('variable.php');
?>
<?php


  	class Empleado{

	  	/*
			0 = fallo;
			1 = usuario;
			2 = admin
	  	*/
	  	function loginEmpleado($email, $password){
	  		if(isset($email) && isset($password)){
    			
				$_SQL =  $GLOBALS["_SQL"] ;

	  			$_SQL("CALL login(?, ?)", [ $email, sha1($password) ], "ss");
	  			//print ($_SQL->countRows());
	  			if($_SQL->countRows() > 0)
				{
					session_unset();
					$row = $_SQL->getRow(1);
				    foreach($_SQL->columnNames as $field){
				    	$_SESSION[$field] = $row[$field];
				    }

				    //$_SESSION["realPassword"] = $_POST["password"];
				    $_SESSION["open"] = "is_open";
					return 1;
				}
				else{
			    	$this->logoutUser();
			        return 0;
				}
		 	}else return 0;
	  	}

	  	function logoutUser(){
	  		session_unset();
	        session_destroy();
	  	}

	  	function registroEmpresa($datos, $auto_login = true){
  		 

		    if(!isset($datos["nombre"], $datos["apellido"], $datos["email"], $datos["password"], $datos["tipo_plan"]) ){
		         return false;
		    }

	    	foreach ($datos as $i){
		        if($i == ""){
		        	return false;
		        }
		    }

		    $sha1Password = sha1($datos["password"]);
		
			$_SQL =  $GLOBALS["_SQL"] ;
			$_SQL("CALL registroEmpresa(?, ?, ?, ?, ?)", [$datos["nombre"],$datos["apellido"], $datos["email"], $sha1Password, $datos["tipo_plan"] ], "ssssi");
		    $row = $_SQL->getRow(1);
		    if ($row["completado"] == 1){
		    	if($auto_login)
		    		$this->loginEmpleado($datos["email"], $datos["password"] );
		    	return true;
		    }
		    else{
		    	return false;
		    }

	  	}

	  	
	  	function crearInstructor($nombre, $apellido, $correo, $descripcion, $pass, $id_empresa, $img){

	  		if(!isset($nombre, $apellido, $correo, $descripcion, $pass, $id_empresa, $img) ){
		        return false;
		    }

		    $_SQL =  $GLOBALS["_SQL"] ;

		    if( !$_SQL->validateFile($img) ){
		    	return false;
		    }
	
			$imagen = $_SQL->uploadFile($img);
			$sha1Password = sha1($pass);

			if($imagen == null)
				return false;

			$_SQL("CALL registroInstructor(?, ?, ?, ?, ?, ?, ?)", [$nombre, $apellido, $correo, $descripcion, $imagen, $id_empresa, 
				$sha1Password ], "sssssis");
		    
		    $row = $_SQL->getRow(1);
		    if ($row["completado"] == 1){
		    	return true;
		    }
		    else{
		    	return false;
		    }
	  	}
	  	
/*
	  	function createUser($userData){

		    if(!$_SQL->validateFile("photo")){
		    	return false;
		    }
		    foreach ($userData as $i){
		        if($i == ""){
		        	return false;
		        }
		    }
		    
		    if(!isset($userData["password"], $userData["username"], $userData["name"], $userData["father_surname"], $userData["mother_surname"], $userData["email"], $userData["birthday"], $userData["phone"])){
		         return false;
		    }


		    $sha1Password = sha1($userData["password"]);
			$myPath = $_SQL->uploadFile( 'photo' , false);
			$_SQL("CALL signup(?, ?, ?, ?, ?, ?, ?, ?, ?)", [$userData["name"], $userData["father_surname"], $userData["mother_surname"], $userData["email"], $sha1Password, $userData["birthday"], $userData["phone"], $myPath, false  ], "ssssssssi");
		    $row = $_SQL->getRow(1);
		    if ($row["RESPONSE"] == 1){
		    	return true;
		    }
		    else{
		    	return false;
		    }

	  	}

*/
	};

?>