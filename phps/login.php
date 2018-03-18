<?php

    $myUserName = $_GET["username"];
    $myPassword = $_GET["password"];
    if($myUserName == "1" && $myPassword == "1"){
        echo "boys";
    } else if($myUserName == "2" && $myPassword == "2"){
        echo "girls";
    } else if($myUserName == "3" && $myPassword == "3"){
        echo "reception";
    } else{
        echo "wrong";
    }

?>