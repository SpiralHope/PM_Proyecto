<?php
  	include_once('variable.php');
?>
<?php


  	class usuarios{

	  	
	  	function detalleEmpleado($id){
	  		if(isset($id)){
    			
				$_SQL =  $GLOBALS["_SQL"] ;

	  			$_SQL("CALL obtener_empleado(?)", [ $id ], "i");
	  			//print ($_SQL->countRows());
	  			if($_SQL->countRows() > 0)
				{

					$row = $_SQL->getRow(1);
					return $row;
				}
				else{
					return false;
				}
		 	}

		 	return false;
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