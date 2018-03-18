<?php

include("db.php");
header('Access-Control-Allow-Origin: *');

$data = "";
$sql = "SELECT branch from details GROUP BY branch ";
$result = $conn->query($sql);
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