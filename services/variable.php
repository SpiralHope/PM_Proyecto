<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    mb_internal_encoding("UTF-8");

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 

error_reporting(E_ERROR | E_PARSE);

    ini_set('max_execution_time', 0);

    ini_set('mysql.connect_timeout', 0);

    ini_set('default_socket_timeout', 0);


    session_start();

    $PATH = ""; //''

    $REALPATH = "http://www.workclass.xyz"; //'https://solarium-news.000webhostapp.com'

    

    

    #Variables de entorno de la Base de Datos
       
    $DB_HOST = "localhost:3307"; //localhost

    $DB_USERNAME = "root"; //id1564859_root

    $DB_PASSWORD = "root";

    $DB_DATABASE = "pm_sql"; //id1564859_news

    

      

    #Variables de entorno de la Base de Datos

    $DB_HOST = "localhost"; //localhost

    $DB_USERNAME = "workclas_root"; //id1564859_root

    $DB_PASSWORD = "P1nk13";

    $DB_DATABASE = "workclas_PM"; //id1564859_news




    #La clase Connection sirve para comunicarse con la base de datos

    class Connection {

        private $connection;

        private $db_host, $db_username, $db_password, $db_database;

        public $query, $result, $columnNames, $affectedRows, $stmt, $results;

        

        function getAffectedRows(){

            return $this->affectedRows;

        }



        function releaseAll(){

            if($this->result != null){

                //$this->result->close();
 $this->result ->free();
            }

            if($this->stmt != null){

                mysqli_stmt_close($this->stmt);

            }

            if($this->connection != null){

                mysqli_close($this->connection);

            }



            unset($this->connection);

            unset($this->stmt);

            unset($this->result);

            unset($this->query);

            unset($this->columnNames);

            $this->connection = null;

            $this->stmt = null;

            $this->result = null;

            $this->query = null;

            $this->columnNames = null;

        }



        function close(){

            if($this->connection != null){

                mysqli_close($this->connection);

                unset($this->connection);

                $this->connection = null;

            }

        }



        function  __destruct(){

             $this->releaseAll();

        }





        function __construct() {

            $this->stmt= null;

            $this->connection = null;

            $this->db_host = $GLOBALS["DB_HOST"];

            $this->db_username = $GLOBALS["DB_USERNAME"];

            $this->db_password = $GLOBALS["DB_PASSWORD"];

            $this->db_database = $GLOBALS["DB_DATABASE"];

            

            $this->query = null;

            $this->result = null;

            $this->columnNames = null;

            $this->affectedRows = null;

        }

        

        function refValues($arr){

            // Esta funcion fue extraida de http://stackoverflow.com/questions/16120822/mysqli-bind-param-expected-to-be-a-reference-value-given

            if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+

            {

                $refs = array();

                foreach($arr as $key => $value)

                    $refs[$key] = &$arr[$key];

                return $refs;

            }

            return $arr;

        }

        

        function __invoke($query, $values = null, $dataType = null){

            // Se ejecuta cuando llamas a la instancia como una funcion.

            

            //La con a la base de datos

            usleep(10);

            $oldLevel = error_reporting();

           // error_reporting(0);

            $good = false;

            $try = 0;

            $max = 6;

            while($good == false)

            {

                try

                    {

                        $this->releaseAll();

                        $this->connection = mysqli_init();

                        $this->connection->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5000);

                        if ($this->connection->real_connect($this->db_host, $this->db_username, $this->db_password, $this->db_database))

                        {

                            if(mysqli_connect_error($this->connection)){

                                throw new Exception('Unable to connect');

                            }



                            //Prepara la sentencia sql y le pone los parametros

                            $this->stmt = mysqli_prepare($this->connection, $query);

                            if (!$this->stmt) {

                                throw new Exception('Unable to prepare Statement');

                            }

                            

                            if(isset($values) && isset($dataType) && $values!=null && $dataType!=null){

                                $params = Array($this->stmt, $dataType);

                                $lenght = strlen($dataType);

                                for($i = 0; $i < $lenght; $i++){

                                    array_push($params, $values[$i]);

                                }

                                if(call_user_func_array("mysqli_stmt_bind_param", $this->refValues($params)) === false){

                                    throw new Exception('Unable to prepare Statement');

                                }

                            }
                            

                            // Ejecuta el query

                            if(!$this->stmt->execute()){

                                throw new Exception('Unable to Execute Statement');

                            }
                            
                           
                           
                    
                     $this->result = $this->stmt->store_result();
                            if($this->stmt->num_rows !== 0){

                                  //  $this->columnNames = $fields;

                             $this->columnNames = array();
                    
        
                     //print($this->stmt->num_rows);
                            // print (session_status());
                            // print_r($_SESSION);
    $metaResults = $this->stmt->result_metadata();
    $fields = $metaResults->fetch_fields();
    $statementParams='';
     //build the bind_results statement dynamically so I can get the results in an array
       $column = array();
       $parameters = array();
       $inta =0;
     foreach($fields as $field){
         if(empty($statementParams)){
            // $statementParams.="\$column['".$field->name."']";
             
         }else{
            // $statementParams.=", \$column['".$field->name."']";
         }
         
         $column[$field->name] = null;
         $this->columnNames[$inta] = $field->name;
         $parameters[$inta ] = &$column[$field->name];
         $inta = $inta+1;
          //print_r($column);
    }
    
    //print_r($column);
    
    $statment="\$this->stmt->bind_result($statementParams);";
    
    call_user_func_array(array($this->stmt, 'bind_result'), $parameters); 
    
    //eval($statment);
    
    // print_r($column);
    
$this->results = array();
    // returns a copy of a value
$copy = create_function('$a', 'return $a;');
    
    
   
   // print($this->stmt->num_rows);
    
    
    while($this->stmt->fetch()){
    //print_r($column);
    $this->results[] = array_map($copy,$column);
        //Now the data is contained in the assoc array $column. Useful if you need to do a foreach, or
        //if your lazy and didn't want to write out each param to bind.
    }
       } 
    
    //print_r($this->results);      
//fetch_array
                          
                            //$result = mysqli_stmt_get_result($this->stmt);
                            
                            //if mysqli_stmt_get_result is undefined;
                            //$this->stmt->bind_result($result);
                            
                
                            

                            $this->affectedRows =  $this->connection->affected_rows;

			    $this->stmt->num_rows;
                            //do something

                            //Si es un SELECT, lo guarda en la clase.

                            if( $this->stmt->num_rows == 0 ){

                                // No es SELECT o esta mal hecho

                                $error_id = mysqli_errno($this->connection);

                                if($error_id != 0){

                                    throw new Exception('Error on Connection');

                                }
                                
                                 if($this->result != null && !(gettype($this->result) === "boolean")){

					                //$this->result->close();
					 $this->result->free();
				}
					
                                
				unset( $this->results);
				
                                unset($this->query);

                                unset($this->result);

                                unset($this->columnNames);

                                $this->query = null;

                                $this->result = null;

                                $this->columnNames = null;
 				
 				
 				$this->results= null;


                            }

                            else {

                                $this->query = $query;

                                $this->result = $result;

                              

                                //mysqli_data_seek($result, 0);

                            }

                            $good = true;
                            $this->close();

                        }

                        else

                        {

                            throw new Exception('Unable to connect');

                        }

                    }

                    catch(mysqli_sql_exception $e)

                    {

                        $this->releaseAll();

                        $try += 1;

                        if($try >= $max){

                            $good = true;
			print ($e->getMessage());
                            die('Unable to connect to database');

                        }

                    }

                    catch(Exception $e)

                    {

                        $this->releaseAll();

                        $try += 1;

                        if($try >= $max){

                            $good = true;
print ($e->getMessage());
                            die('Unable to connect to database');

                        }

                    }



            if($good == false)

            usleep(10);



            }   



            error_reporting($oldLevel);





        }

        

        function clean(){

            //mysqli_data_seek($this->result, 0);

        }

        

        function countRows()

        {

            return $this->stmt->num_rows; //mysqli_num_rows($this->result);

        }

        

        function toTable()

        {

            echo "<table>";

            echo "<caption>" . $this->query . "</caption>";

            echo "<tr>";

            foreach($this->columnNames as $field){

                echo "<th>" . $field . "</th>";

            }

            echo "</tr>";

            

            while(($row = mysqli_fetch_assoc($this->result))){

                echo "<tr>";

                foreach($row as $data){

                    echo "<td>" . $data . "</td>";

                }

                echo "</tr>";

            }

            

            echo "</table>";

            $this->clean();

        }

        

        /*

         *Regresa un unico campo de la primera fila si se hizo previamente una consulta SELECT

         *$field - El nombre del campo a regresar

         *Regresa

         *El dato o null en caso de error

         */

        function get($field, $isImage = true)

        {

            if($this->query !== null){

                $row = $this->results[0]; //mysqli_fetch_assoc($this->result);

                $data = $row[$field];

                $this->clean();

                if($isImage){

                    return "data:image/jpeg;base64," . $data;

                }

                return $data;

            }

            return null;

        }



        // Regresa la fila correspondiente si previamente se hizo un SELECT, la primera es 1

        function getRow($row = 1)

        {

            if($this->query !== null){

               // mysqli_data_seek($this->result, $row - 1);

                $result = $this->results[ $row - 1]; // mysqli_fetch_assoc($this->result);

                $this->clean();

                return $result;

            }

            return null;

            

        }

        

        //Regresa todas las filas de un SELECT previo

        function getAllRows(){

            if($this->query !== null){

                $rows = array();

                //while(($row = mysqli_fetch_assoc($this->result))){

                  //  array_push($rows, $row);

                //}

                //$this->clean();

                return $this->results ; $rows;

            }

            return null;

        }

        

        function toJSON(){

            //Si no se ha hecho un SELECT con esta instancia, regresa null

            if($this->query === null){

                return null;

            }

            

            //El proceso de encadenamiento en formato JSON

            $json = '{"json" : [';        

            $columns = count($this->columnNames);

            $comma = false;

$num = count( $this->results);
$actual = 0;
            while( $actual< $num){//  ($row = mysqli_fetch_assoc($this->result))){
            
$row = $this->results[$actual];
$actual = $actual+1;
                if($comma){

                    $json .= ',';

                }

                else {

                    $comma = true;

                }

                $json .= '{';

                for($i = 0; $i < $columns; $i++){

                    if($i !== 0){

                        $json .= ', ';

                    }

                    $json .= '"' . $this->columnNames[$i] . '" : "' . $row[$this->columnNames[$i]] . '"';

                }

                $json .= '}';

            }

            

            $json .= ']}';

            

            $this->clean();

            

            //Devolvemos el resultado

            return $json;

        }

        

        function __toString(){

            return $this->toJSON();

        }

        

        function toStringValue(){

            return "db_host : " . $this->db_host . " db_username : " . $this->db_username . " db_password : " . $this->db_password . " db_database : " . $this->db_database;

        }

        

        function validateDate($date)

        {

            $d = DateTime::createFromFormat('Y-m-d', $date);

            return $d && $d->format('Y-m-d') === $date;

        }



        function validateFile($name = "photo"){
            if(empty($_FILES)) {
                return false;       
            } 
            $tfile = $_FILES[$name];
            if(!file_exists($tfile['tmp_name']) || !is_uploaded_file($tfile['tmp_name'])){
                return false;
            }   

            if( trim($_FILES[$name]["tmp_name"]) == ""){
                return false;
            }

            $type = pathinfo($_FILES[$name]["name"], PATHINFO_EXTENSION);
            
            if(!($type === "jpg" ||$type === "jpeg" || $type === "png" || $type === "mp4")) {
                return false;
            }
            
            return true;
        }

        // Sube un archivo al servidor
        function uploadFile($name = "photo", $returnRealPath = false){
            $directory = '..';
            $type = pathinfo($_FILES[$name]["name"], PATHINFO_EXTENSION);
            $result = "/uploads/" . time() . "." . $type;
            $file = $directory . $result;
            
            if(!($type === "jpg" || $type === "jpeg"|| $type === "png" || $type === "mp4")) {
                
                die("<h1>ERROR: EL ARCHIVO SELECIONADO NO ES UNA IMAGEN O NO ES COMPATIBLE.</h1><p>Formatos compatibles: .jpg o .png. Tu archivo es: " . $type . "</p>");
            }

            //file_get_content
            if(!(move_uploaded_file($_FILES[$name]["tmp_name"], $file))){
                //echo "<p>No se pudo subir el archivo</p>";
                die("ERROR: NO HA SELECCIONADO UNA IMAEGN");
            }
            
            if($returnRealPath){
                return $file;
            }
            return $GLOBALS["PATH"] . $result;
        }



        //Crea un Blob Base64 y lo regresa en String, escapado para subirse a MySQL

        function makeBlob($name = "photo")

        {

            if(!$this->validateFile($name)){

                die("<h1>ERROR: EL ARCHIVO SELECIONADO NO ES UNA IMAGEN O NO ES COMPATIBLE.</h1><p>Formatos compatibles: .jpg o .png. Tu archivo es: " . $type . "</p>");

            }

            $file = file_get_contents($_FILES[$name]["tmp_name"]);

            $file = base64_encode($file);

            $file = mysql_escape_string($file);

            return $file;

        }

    }

    

    $_SQL = new Connection();
// $GLOBALS["_SQL"] = $_SQL;
    $_OPEN = false;

    $INDEX = "http://www.workclass.xyz"; //https://solarium-news.000webhostapp.com

    if(isset($_SESSION["correo"])){

        $GLOBALS["_OPEN"] = true;

    }

    

?>