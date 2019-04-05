<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT match_user_id, answer_timestamp, answer_type_id FROM `match`";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>