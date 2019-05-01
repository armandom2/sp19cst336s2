<?php
// Database configuration
$dbHost="us-cdbr-iron-east-03.cleardb.net";
$dbUsername="bce62f200bbfcd";
$dbPassword = "9eb9c2a7";
$dbName = "heroku_50bf8b70dd9c9ee";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>