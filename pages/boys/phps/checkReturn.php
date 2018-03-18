<?php 

include("db.php");
header('Access-Control-Allow-Origin: *');

$rollNo = $_GET["rollNo"];

$sql = "SELECT * FROM return WHERE rollno = '$rollNo'";
$result = $conn->query($sql);


    $reason = $_GET["reason"];
    $permitDate = $_GET["outingDate"];
    $returnDate = $_GET["returnDate"];
    $status = true;

    $sql1 = "INSERT INTO return VALUES ('$rollNo', '$permitDate', '$returnDate', '$reason');";

    if ($conn->query($sql1) === TRUE) {
            echo "New record created successfully";
        } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
?>