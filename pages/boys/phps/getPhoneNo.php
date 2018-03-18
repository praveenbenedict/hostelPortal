<?php

include("db.php");
header('Access-Control-Allow-Origin: *');

// require __DIR__ . '/vendor/autoload.php';
// use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
// $account_sid = 'AC06f25960cbb6a6af94c6d622daf07cd4';
// $auth_token = 'your_auth_token';

$rollNo = $_GET["rollNo"];
$sql = "SELECT phoneNo FROM details WHERE rollno = '$rollNo'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo(json_encode($row));
    }
}else {
    echo "0 results";
}


// if ($result->num_rows > 0) {
    
// }else {
//     echo "0 results";
// }
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
// $twilio_number = "+1602-748-4607 ";

// $client = new Client($account_sid, $auth_token);
// $client->messages->create(
    // Where to send a text message (your cell phone?)
    // '+919629934423',
    // array(
        // 'from' => $twilio_number,
        // 'body' => 'Your son has been given permission for outing.'
    // )
// );
?>