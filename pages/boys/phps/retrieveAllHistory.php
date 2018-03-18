<?php

include("db.php");
header('Access-Control-Allow-Origin: *');

$branch = $_GET["branch"];
$year = $_GET["year"];
$fromDate = $_GET["fromdate"];
$toDate = $_GET["todate"];

$sql = "SELECT * FROM history WHERE branch = '$branch' and date >= '$fromDate' and date <= '$toDate'";

$result = $conn->query($sql);
$array = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {
        array_push($array, $row);
    }
    echo json_encode($array);
}else {
    echo "0 results";
}

?>