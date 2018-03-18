<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
$phoneNo = $_GET['phoneNo'];
// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC06f25960cbb6a6af94c6d622daf07cd4';
$token = '1ce415f6e031b42590c518ab4613549b';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    "+91$phoneNo",
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+16027484607',
        // the body of the text message you'd like to send
        'body' => 'Your Son has been Given Permission to go out for outing. Thank You!'
    )
);