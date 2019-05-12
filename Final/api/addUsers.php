<?php

include "../dbConnection.php";
$conn = getDatabaseConnection();

$np = array();


$np[":user_id"] = $_POST["userId"];
$np[":user_name"] = $_POST["userName"];
$np[":user_link"] = $_POST["userLink"];

$sql = "INSERT INTO users (user_id, user_name, user_link) ".
        "VALUES (:user_id, :user_name, :user_link)";
        
$stmt = $conn->prepare($sql);
$stmt->execute($np);
echo json_decode(array("status"=>"success"));

?>