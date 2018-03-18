<?php 

include("db.php");
header('Access-Control-Allow-Origin: *');
   
$name = $_GET["name"];
$batch = $_GET["batch"];
$room = $_GET["room"];
$branch = $_GET["branch"];
$rollNo = $_GET["rollNo"];
$phoneNo = $_GET["phoneNo"];

$sql = "INSERT INTO returned VALUES ('$name', '$rollNo', '$batch', '$branch', $room, $phoneNo);";

if ($conn->query($sql) === TRUE) {
    $sql1 = "DELETE FROM outdetails WHERE Rollno = '$rollNo'";
    $result = $conn->query($sql1);
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>