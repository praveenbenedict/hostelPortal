<?php
    header("content-Type:application/json");
    include("functions.php");
    
    if(!empty($_GET['name'])){
        
        $name = $_GET['name'];
        $area = getLogin($name);

        if(empty($price)){
            // deliverResponse(200, "Book Not Found", NULL);

            break;
        }else{
            deliverResponse(200, "Book Found", $price);

        }
    }else {
        deliverResponse(400, "Invalid Request", NULL);
    }

    function deliverResponse($status, $status_message, $data){

        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['data'] = $data;
        
        $json_response = json_encode($response);
        echo $json_response;
    }
?>