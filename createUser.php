<?php

// Start the session
session_start();
  

header('Content-type: application/json; charset=utf-8');

$myJson=$_POST['jsonObj'];
$dataFields = json_decode($myJson);


//Import connection setting for DB
require_once 'dbconfig.php';
$dbconnect = "host=$host port=5432 dbname=$db user=$username password=$password";


try {
    //connect to DB
    $conn = pg_connect($dbconnect);
    
    //Insert new data to users table 
    $query = "INSERT INTO users (username, firstname, lastname, passwrd, mailadress)
    VALUES ('$dataFields->username', '$dataFields->firstname', '$dataFields->lastname', '$dataFields->passwrd', '$dataFields->mailadress')";    
    $result = pg_query($conn, $query);

    //Get last inserted user to bounce back
    $usernow = 'michael';
    $query = ("SELECT * FROM users WHERE username='$usernow'");
    $result = pg_query($conn, $query);

    //Set array to receive record
    $person = pg_fetch_array($result);

    /*
    //Creat new contacts and planborden tables for new user
    $tablename = ($dataFields->username).'contacts';
    $sql = "CREATE TABLE $tablename(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            contactusername VARCHAR(30),
            contactmail VARCHAR(30))";
    $conn->exec($sql);
    
    $tablename = ($dataFields->username).'plans';
    $sql = "CREATE TABLE $tablename(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            planname VARCHAR(30))";
    $conn->exec($sql);
        */

    //Sent array as JSON
    echo json_encode($person);
    }

    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
$conn = null;

?>