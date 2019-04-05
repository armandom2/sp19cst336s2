<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT username, about_me, email_address, picture_url FROM user";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>