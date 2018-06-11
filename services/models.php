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

			$_SQL("CALL crear_sala(?, ?, ?, ?, ?)", [$nombreSala, $descSala, $cupo, $imagen, $id_empresa ], "ssisi");
		    
		    $row = $_SQL->getRow(1);
		    if ($row["completado"] == 1){
		    	return true;
		    }
		    else{
		    	return false;
		    }

	  	}

	};

	class Curso{

/*
		crear($_SESSION['fecha'], $_POST['nombreCurso'], $_POST['descCurso'], $_POST['horaIni'], $_POST['horaFin'], $_POST['sala'], $_POST['instructor'])

		CREATE procedure crear_curso(m_nombre varchar(255), m_fecha date, m_descripcion varchar(255), m_hora_inicio time,  m_hora_fin time,  m_id_sala int, m_id_inst int, m_id_admin int, m_id_empresa int)

*/

	  	function crear($id_admin, $id_empresa, $fecha, $nombreCurso,  $descCurso, $horaIni, $horaFin, $sala, $instructor ){

	  		
		    if(!isset($id_admin, $id_empresa, $fecha, $nombreCurso,  $descCurso, $horaIni, $horaFin, $sala, $instructor ) ){
		    	return false;
		    }



		    $fecha =  DateTime::createFromFormat( 'Y-m-d', $fecha);
		    $fecha  = $fecha->format( 'Y-m-d');
		    
		    $horaIni = DateTime::createFromFormat( 'H:i A', $horaIni);
			$horaIni = $horaIni->format( 'H:i:s');

			$horaFin = DateTime::createFromFormat( 'H:i A', $horaFin);
			$horaFin = $horaFin->format( 'H:i:s');


		    $_SQL =  $GLOBALS["_SQL"] ;


			$_SQL("CALL crear_curso(?, ?, ?, ?, ?, ?, ?, ?, ?)", [$nombreCurso, $fecha, $descCurso, $horaIni, $horaFin, $sala, $instructor, $id_admin, $id_empresa], "sssssiiii");
		    

		    $row = $_SQL->getRow(1);
		    if ($row["completado"] == 1){
		    	return true;
		    }
		    else{
		    	return false;
		    }

	  	}

	  	function obtener_listado_cursos_admin($id_empresa){
			if(!isset($id_empresa)){
				return false;
			}
  		 	$_SQL =  $GLOBALS["_SQL"] ;
			$_SQL("CALL eventos_admin(?)", [$id_empresa], "i");
			return $_SQL->results;
	  	}

	  	function obtener_listado_instructores($id_empresa){
			if(!isset($id_empresa)){
				return false;
			}
  		 	$_SQL =  $GLOBALS["_SQL"] ;
			$_SQL("CALL obtener_instructores(?)", [$id_empresa], "i");
			return $_SQL->results;
	  	}

	  	function obtener_listado_salas($id_empresa){
			if(!isset($id_empresa)){
				return false;
			}
  		 	$_SQL =  $GLOBALS["_SQL"] ;
			$_SQL("CALL obtener_todas_salas(?)", [$id_empresa], "i");
			return $_SQL->results;
	  	}
	};


?>