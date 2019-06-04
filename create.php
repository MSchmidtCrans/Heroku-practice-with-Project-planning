<?php

// Start the session
session_start();
  

header('Content-type: application/json; charset=utf-8');

$myJson=$_POST['jsonObj'];
$dataFields = json_decode($myJson);
$usernow = $_SESSION['usernow'];

//create unique id
$bytes = random_bytes(5);
$useruniqid = $usernow.'|'.(bin2hex($bytes));

//Import connection setting for DB
require_once 'dbconfig.php';
$dbconnect = "host=$host port=5432 dbname=$db user=$username password=$password";


try {
    //connect to DB
    $conn = pg_connect($dbconnect);
    
    //Insert new data to database 
    
    $query = "INSERT INTO tasks (username, textvalue, urgencyvalue, useruniqid, rowid) VALUES ('$usernow', '$dataFields->action', '$dataFields->urgency', '$useruniqid', 'rowOne')";    
    $result = pg_query($conn, $query);

    //Get last inserted task to bounce back
    $query = ("SELECT * FROM tasks WHERE useruniqid='$useruniqid'");
    $result = pg_query($conn, $query);

    //Set array to receive record
    $task = pg_fetch_array($result);

    //Sent array as JSON
    echo json_encode($task);
    }

    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>