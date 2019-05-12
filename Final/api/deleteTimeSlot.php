<?php

include "../dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":userId"] = $_POST["user"];
$np[":bookDate"] = $_POST["date"];
$np[":startTime"] = $_POST["start"];
$np[":timeDuration"] = $_POST["duration"];


$sql = "DELETE FROM scheduler WHERE user_id LIKE :userId AND date LIKE :bookDate AND start_time LIKE :startTime AND duration LIKE :timeDuration";


$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
?>