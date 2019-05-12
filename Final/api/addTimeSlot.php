<?php

include "../dbConnection.php";
$conn = getDatabaseConnection();

$np = array();

$np[":timedurration"] = $_POST["duration"];
$np[":starttime"] = $_POST["start"];
$np[":endtime"] = $_POST["end"];
$np[":userid"] = $_POST["user"];
$np[":date"] = $_POST["date"];

$sql = "INSERT INTO scheduler (user_id, date, start_time, end_time, duration) ".
        "VALUES (:userid, :date, :starttime, :endtime,:timedurration)";
$stmt = $conn->prepare($sql);
$stmt->execute($np);
echo json_decode(array("status"=>"success"));

?>
