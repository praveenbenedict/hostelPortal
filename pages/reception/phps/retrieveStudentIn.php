<?php

include("db.php");
header('Access-Control-Allow-Origin: *');
$rollNo = $_GET["rollNo"];
$data = array();
$sql = "SELECT * FROM current WHERE rollno = '$rollNo'";
$result = $conn->query($sql);
$row = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo(json_encode($row));
    }
}else {
    echo "0 results";
}

?>