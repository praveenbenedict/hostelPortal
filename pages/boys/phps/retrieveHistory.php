<?php

include("db.php");
header('Access-Control-Allow-Origin: *');

$rollNo = $_GET["rollNo"];
$data = "";
$sql = "SELECT * FROM history WHERE rollno = '$rollNo'";
$sqlDetails = "SELECT * FROM details WHERE rollno = '$rollNo'";
$result = $conn->query($sql);
$details = $conn->query($sqlDetails);
$array = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        array_push($array, $row);
    }
    echo json_encode($array);
}else {
    echo "error";
}

?>