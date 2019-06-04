<?php

// Start the session
session_start();

header('Content-type: application/json; charset=utf-8');

//Set username
$usernow = $_SESSION['usernow'];
  
//Import connection setting for DB
require_once 'dbconfig.php';
$dbconnect = "host=$host port=5432 dbname=$db user=$username password=$password";


try {
    //connect to DB
    $conn = pg_connect($dbconnect);
    
    //Update record to database 
    if ($usernow == "admin") {
        $query ="SELECT * FROM tasks";
    }  else {
    $query = "SELECT * FROM tasks WHERE username = '$usernow'";  
    }
    
    $result = pg_query($conn, $query);
    
    $jsonArr = pg_fetch_all($result);
    
    //Reply AJAX call
    echo json_encode($jsonArr);
    }

    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>