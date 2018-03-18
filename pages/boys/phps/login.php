<?php

    $myUserName = $_GET["username"];
    $myPassword = $_GET["password"];
    if($myUserName == "1" && $myPassword == "1"){
        echo 1;
    } else{
        echo 0;
    }

?>