<?php

header('Content-type: application/json; charset=utf-8');


require_once 'dbconfig.php';

$dbconnect = "host=$host port=5432 dbname=$db user=$username password=$password";


try{

 $conn = pg_connect($dbconnect);

 
 // display a message if connected to the PostgreSQL successfully
 if($conn){
 echo "Connected to the <strong>$db</strong> database successfully!</br>";
 }

 //Make query to test connection
 $query = "SELECT * FROM users";

 $result = pg_query($conn, $query);

 if (isset($result)) {
     echo("result is set </br>");
 } else {
     echo ('result is not set</br>');
    }

    while($record = pg_fetch_array($result)){
        echo $record[2];
    }

}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

?>