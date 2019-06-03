<?php

    // Start the session
    session_start();

header('Content-type: application/json; charset=utf-8');

//$myJson=$_POST['username'];
//$usernow = $_POST['username'];
$usernow = 'ivo';

//Import connection setting for DB
require_once 'dbconfig.php';
$dbconnect = "host=$host port=5432 dbname=$db user=$username password=$password";


try {
    //connect to DB
    $conn = pg_connect($dbconnect);

    $query = ("SELECT * FROM users WHERE username='$usernow'");
    $result = pg_query($conn, $query);

    //Set array to receive record
    $person = pg_fetch_array($result);
    
    //Set user to true if user password exists and password is correct
    $_SESSION['loggedin'] = true;
    $_SESSION['usernow'] = $person[1];

    //Sent array as JSON
    echo json_encode($person);

    }

    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>