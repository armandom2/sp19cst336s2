<?php

function getDatabaseConnection($dbname = 'ottermart') {

    
    $host = 'localhost'; //cloud 9 acting as host
    $username = 'armandomiguel';
    $password = '';

    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //displays errors when accessing tables
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>
