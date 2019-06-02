<?php


require_once 'dbconfig.php';

$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
 
try{
 // create a PostgreSQL database connection
 $conn = new PDO($dsn);
 

 //Make query to test connection
 $query = "SELECT * FROM users";
 $result = pg_query($query);

 $mydata = pg_fetch_assoc($result); 
 echo $mydata;


 // display a message if connected to the PostgreSQL successfully
 if($conn){
 echo "Connected to the <strong>$db</strong> database successfully!";
 }

}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

?>