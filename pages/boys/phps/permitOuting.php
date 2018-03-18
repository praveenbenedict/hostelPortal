<?php 

include("db.php");
header('Access-Control-Allow-Origin: *');

$rollNo = $_GET["rollNo"];

$sql = "SELECT * FROM current WHERE rollno = '$rollNo'";
$result = $conn->query($sql);


    $reason = $_GET["reason"];
    $permitDate = $_GET["outingDate"];
    $returnDate = $_GET["returnDate"];
    $status = true;

    $sql1 = "INSERT INTO history VALUES ('$rollNo', '$permitDate', '$returnDate', '$reason' , 'NO');";
    $sql2 = "INSERT INTO current VALUES ('$rollNo', '$permitDate', '$returnDate', '$reason');";

    if ($conn->query($sql1) === TRUE) {
        if ($conn->query($sql2) === TRUE) {
            echo "New record created successfully";
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
?>