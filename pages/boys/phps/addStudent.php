<?php 

include("db.php");
header('Access-Control-Allow-Origin: *');
   
$name = $_GET["name"];
$year = $_GET["year"];
$roomNo = $_GET["roomNo"];
$branch = $_GET["branch"];
$rollNo = $_GET["rollNo"];
$regNo = $_GET["regNo"];
$phoneNo = $_GET["phoneNo"];

$sql = "INSERT INTO details VALUES ('$name', '$rollNo', '$year', '$branch', $roomNo, $phoneNo, $regNo);";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>