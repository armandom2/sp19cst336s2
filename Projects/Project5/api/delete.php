<?php
    $servername = "us-cdbr-iron-east-03.cleardb.net";
    $username = "bce62f200bbfcd";
    $password = "9eb9c2a7";
    $dbname = "heroku_50bf8b70dd9c9ee";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // sql to delete a record
    $sql = "DELETE FROM image_upload";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
    
?>