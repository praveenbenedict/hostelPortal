<?php

include("db.php");
header('Access-Control-Allow-Origin: *');

$sql = "SELECT * FROM history";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // echo(json_encode($row));
        $data=json_encode($row);
        echo $data;
    }
}else {
    echo "0 results";
}

?>

<!--<!DOCTYPE html>
<html>
    <head>
        <title>Multiple Outing</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/boys.css">
    </head>
    <body>

    </body>
</html>-->