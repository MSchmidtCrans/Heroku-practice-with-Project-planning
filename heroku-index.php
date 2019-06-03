<?php

require_once 'dbconfig.php';

$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
 
try{
 // create a PostgreSQL database connection
 $conn = new PDO($dsn);
 
 // display a message if connected to the PostgreSQL successfully
 if($conn){
 echo "Connected to the <strong>$db</strong> database successfully!</br>";
 }

 //Make query to test connection
 //$query = "SELECT * FROM users";

 $result = pg_query($conn, "SELECT * FROM users");

 if (isset($result)) {
     echo("result is set </br>");
 } else {
     echo ('result is not set</br>');
    }

    while($record = pg_fetch_array($result)){
        echo $record;
    }

}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

?>