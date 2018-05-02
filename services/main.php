<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    mb_internal_encoding("UTF-8");

    //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 

    error_reporting(E_ERROR | E_PARSE);

    ini_set('max_execution_time', 0);

    ini_set('mysql.connect_timeout', 0);

    ini_set('default_socket_timeout', 0);


    session_start();

    $PATH = ""; //''

    $REALPATH = "http://www.workclass.xyz"; //'https://solarium-news.000webhostapp.com'

    

    

    #Variables de entorno de la Base de Datos

    $DB_HOST = "localhost"; //localhost

    $DB_USERNAME = "workclas_root"; //id1564859_root

    $DB_PASSWORD = "P1nk13";

    $DB_DATABASE = "workclas_Test"; //id1564859_news

    
    $DB_HOST = "localhost:3307"; //localhost

    $DB_USERNAME = "root"; //id1564859_root

    $DB_PASSWORD = "root";

    $DB_DATABASE = "pm_sql"; //id1564859_news
    



    #La clase Connection sirve para comunicarse con la base de datos

    class Connection {

        private $connection;    

        private $db_host, $db_username, $db_password, $db_database;

        public $query, $result, $columnNames, $affectedRows, $stmt, $results;

        private $is_connected;

        function getAffectedRows(){

            return $this->affectedRows;

        }

        function connect(){
            if(!$this->is_connected){

                $reportLevel = error_reporting();
                //error_reporting(0);
                $tryToConnect = false;
                $try = 0;
                $max = 6;

                while ($tryToConnect) {
                try{   
                        $this->releaseAll();
                        $this->disconnect();

                        $this->connection = mysqli_init();
                        $this->connection->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5000);
                        if ($this->connection->real_connect($this->db_host, $this->db_username, $this->db_password, $this->db_database))
                        {

                            if(mysqli_connect_error($this->connection)){
                                throw new Exception('Unable to connect');
                            }

                            $this->is_connected = true;
                            $tryToConnect = false;
                        }else{
                            throw new Exception('Unable to connect');
                        }
                    }
                    catch(mysqli_sql_exception $e)

                    {
                        $try += 1;
                        if($try >= $max){
                            $tryToConnect = false;
                            print ($e->getMessage());
                            die('Unable to connect to database');
                        }

                    }
                    catch(Exception $e)
                    {   
                        $try += 1;
                        if($try >= $max){
                            $tryToConnect = false;
                            print ($e->getMessage());
                            die('Unable to connect to database');
                        }
                    }

                }
                f($tryToConnect == true) usleep(10);
            } 

            return $this->is_connected;  
        }

        function disconnect(){

            if($this->connection != null){
                mysqli_close($this->connection);
                unset($this->connection);
                $this->connection = true;
                $this->connection = null;
                $this->is_connected = false;
            }
        }



        function releaseAll(){

            if($this->result != null){
                $this->result ->free();
            }

            if($this->stmt != null){
                mysqli_stmt_close($this->stmt);
            }

            unset($this->stmt);
            unset($this->result);
            unset( $this->results);
            unset($this->query);
            unset($this->columnNames);

            $this->stmt = null;
            $this->result = null;
            $this->results= null;
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
             $this->disconnect();
        }





        function __construct() {

            $this->stmt= null;

            $this->connection = null;

            $this->db_host = $GLOBALS["DB_HOST"];

            $this->db_username = $GLOBALS["DB_USERNAME"];

            $this->db_password = $GLOBALS["DB_PASSWORD"];

            $this->db_database = $GLOBALS["DB_DATABASE"];


            $this->is_connected = false;

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

            $reportLevel = error_reporting();
           // error_reporting(0);

            if($this->connect()){

                try{

                    $this->releaseAll();

                    $this->stmt = mysqli_prepare($this->connection, $query);
                    if (!$this->stmt)
                        throw new Exception('Unable to prepare Statement');
                    
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

                    if(!$this->stmt->execute())
                        throw new Exception('Unable to Execute Statement');


                    $this->result = $this->stmt->store_result();
                    $this->affectedRows =  $this->connection->affected_rows;
                    $this->query = $query;

                    if($this->stmt->num_rows !== 0){

                        $this->columnNames = array();
                        $metaResults = $this->stmt->result_metadata();
                        $fields = $metaResults->fetch_fields();
                        

                        $column = array();
                        $parameters = array();
                        $inta =0;
                        foreach($fields as $field){
                             $column[$field->name] = null;
                             $this->columnNames[$inta] = $field->name;
                             $parameters[$inta] = &$column[$field->name];
                             $inta = $inta+1;
                        }
                        call_user_func_array(array($this->stmt, 'bind_result'), $parameters); 
                        $this->results = array();
                            // returns a copy of a value
                        $copy = create_function('$a', 'return $a;');
                        while($this->stmt->fetch()){
                            $this->results[] = array_map($copy,$column);
                            //Now the data is contained in the assoc array $column. Useful if you need to do a foreach, or
                            //if your lazy and didn't want to write out each param to bind.
                        }
                    }

                    
                    if( $this->stmt->num_rows == 0 ){

                        // No es SELECT o esta mal hecho

                        $error_id = mysqli_errno($this->connection);
                        if($error_id != 0){
                            throw new Exception('Error on Connection');
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

                }
                catch(mysqli_sql_exception $e)
                {
                        print ($e->getMessage());
                        die('Unable to connect to database');
                }
                catch(Exception $e)
                {   
                        print ($e->getMessage());
                        die('Unable to connect to database');
                }

            }
            error_reporting($reportLevel);
        }

        

        function countRows()
        {
            return $this->stmt->num_rows;
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

                $row = $this->results[0];
                $data = $row[$field];
                if($isImage){
                    return "data:image/jpeg;base64," . $data;
                }
                return $data;
            }
            return null;

        }

        function getField($field)
        {
            if($this->query !== null){

                $row = $this->results[0];
                $data = $row[$field];
                return $data;
            }
            return null;
        }

        // Regresa la fila correspondiente si previamente se hizo un SELECT, la primera es 1
        function getRow($row = 1)
        {
            if($this->query !== null){
                return $this->results[ $row - 1];
            }
            return null;
        }

        //Regresa todas las filas de un SELECT previo
        function getAllRows(){
            if($this->query !== null){
                return $this->results;
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

    };

    $_SQL = new Connection();
    $_OPEN = false;
    $INDEX = "http://www.workclass.xyz"; //https://solarium-news.000webhostapp.com

    if(isset($_SESSION["email"]) || isset($_SESSION["open"])){
        $GLOBALS["_OPEN"] = true;
    }

    print("asdasd");

?>