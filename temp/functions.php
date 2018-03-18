<?php

function getLogin($id){

    $var1 = "boys";
    $var2 = "girls";
    $var3 = "reception";
    $var4 = "invalid";

    if($id == $var1){
        return $var1;
    } else if($id == $var2){
        return $var2;
    } else if($id == $var3){
        return $var3;
    } else{
        return $var4;
    }
}

?>