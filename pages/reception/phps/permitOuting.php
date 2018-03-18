<?php

include("db.php");
header('Access-Control-Allow-Origin: *');

$roll = $_GET['rollNo'];

$sql1 = "DELETE FROM current WHERE Rollno = '$roll'";
$result = $conn->query($sql1);

?>