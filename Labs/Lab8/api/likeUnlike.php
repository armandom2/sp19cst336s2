<?php
    include 'DBConnection.php';
    $conn = getDatabaseConnection();
    
    $np = array();
    $np[':imgkey'] = $_POST['searchKey'];
    $np[':url'] = $_POST['link'];
    $task = $_POST['task'];
    $sql='';
    
    if($task =='like'){
        $sql = 'INSERT INTO liked (imgkey, url) VALUES (:imgkey,:url);';
    }
    else if($task == 'unlike'){
        $sql = 'DELETE FROM liked where (imgkey = :imgkey AND url = :url);';
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records['operation'] = $operation;
    echo json_encode($records);

?>