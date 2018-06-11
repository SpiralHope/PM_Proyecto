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

	};


	class Sala{

	  	function crear($id_empresa, $nombreSala, $descSala,  $cupo, $img ){

	  		
		    if(!isset($id_empresa, $nombreSala, $descSala,  $cupo, $img) ){
		        return false;
		    }

		    $_SQL =  $GLOBALS["_SQL"] ;

		    if( !$_SQL->validateFile($img) ){
		    	return false;
		    }
	
			$imagen = $_SQL->uploadFile($img);

			if($imagen == null)
				return false;

			$_SQL("CALL crear_sala(?, ?, ?, ?, ?)", [$nombreCurso, $descSala, $cupo, $imagen, $id_empresa ], "ssisi");
		    
		    $row = $_SQL->getRow(1);
		    if ($row["completado"] == 1){
		    	return true;
		    }
		    else{
		    	return false;
		    }

	  	}

	};


?>