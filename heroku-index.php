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
 $query = "SELECT * FROM users";
 $result = pg_query($query);

 //Set array to receive record
 $user = array();
    
//Loop through all rows from table
foreach($result as $item) {   

//Add person array
$user = $item;
}

 if (isset($user)) {
     echo("result is set </br>");
 } else {
     echo ('result is not set</br>');
    }

}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

?>