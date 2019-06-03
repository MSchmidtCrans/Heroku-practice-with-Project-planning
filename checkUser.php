<?php

// Start the session
session_start();
  

header('Content-type: application/json; charset=utf-8');

//$myJson=$_POST['jsonObj'];
//$dataFields = json_decode($myJson);


$servername = "localhost";
$username = "phpdb";
$password = "wachtwoord";

//Import connection setting for DB
require_once 'dbconfig.php';
$dbconnect = "host=$host port=5432 dbname=$db user=$username password=$password";



try {
    //connect to DB
    $conn = pg_connect($dbconnect);

    //Prepare and execute mysql query
    //$adressquery = $conn->prepare("SELECT * FROM users WHERE username = '$dataFields->username'");
    //$adressquery->execute();

    $query = ("SELECT * FROM users WHERE username = 'michael'");
    $result = pg_query($conn, $query);

    //Set array to receive record
    $user = pg_fetch_array($result);    

    //Sent array as JSON
    echo json_encode($user);
    }

    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;

?>