<?php
  	include_once('variable.php');


  	class Session{
  		function obtenerDatosSession(){

  		}
  		function usuarioLogeado(){

  		}

  		function obtenerTipoUsuario(){

  		}
  	};

	class Empleado{

	  	/*
			0 = fallo;
			1 = usuario;
			2 = admin
	  	*/
	  	function loginEmpleado($email, $password){
	  		if(isset($email) && isset($password)){
	  			$_SQL("CALL login(?, ?)", [$email, sha1($password)], "ss");
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
		 	}	
	  	}

	  	function logoutUser(){
	  		session_unset();
	        session_destroy();
	  	}

	  	function registroEmpresa($datos, $auto_login){
  		 	foreach ($datos as $i){
		        if($i == ""){
		        	return false;
		        }
		    }

		    if(!isset($userData["m_nombre"], $userData["m_correo"], $userData["m_password"], $userData["m_tipo_plan"])){
		         return false;
		    }

		    $sha1Password = sha1($userData["password"]);

			$_SQL("CALL registroEmpresa(?, ?, ?, ?)", [$userData["m_nombre"], $userData["m_correo"], $sha1Password, $userData["m_tipo_plan"] ], "sssi");
		    $row = $_SQL->getRow(1);
		    if ($row["completado"] == 1){
		    	if($auto_login)
		    		this->loginEmpleado([$userData["m_nombre"], $userData["m_password"] ]);
		    	return true;
		    }
		    else{
		    	return false;
		    }

	  	}
	  	

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


	}

?>