<?php 

include("db.php");
header('Access-Control-Allow-Origin: *');
   
$rollNo = $_GET['rollNo'];
$permitDate = $_GET['permitDate'];
$returnDate = $_GET['returnDate'];
$reason = $_GET['reason'];

$sql = "INSERT INTO outdetails VALUES ('$rollNo', '$permitDate', '$returnDate', '$reason');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>