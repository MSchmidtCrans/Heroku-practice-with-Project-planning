<?php

// Start the session
session_start();
  

header('Content-type: application/json; charset=utf-8');

$useruniqid=$_POST['divid'];
$rowid=$_POST['rowid'];

//Import connection setting for DB
require_once 'dbconfig.php';
$dbconnect = "host=$host port=5432 dbname=$db user=$username password=$password";


try {
    //connect to DB
    $conn = pg_connect($dbconnect);
    
    //Update record to database   
    $query = "UPDATE tasks SET rowid = '$rowid' WHERE useruniqid = '$useruniqid'";  
    $result = pg_query($conn, $query);

    //Reply AJAX call
    echo ('succes');
    }

    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>