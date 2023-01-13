<?php

include_once 'utils.php';

// Read the variables sent via POST from our API
$session_id   = $_POST["session_id"];
$service_code = $_POST["service_code"];
$msisdn = $_POST["msisdn"];
$nw_code = $_POST["nw_code"];
$msg_type = $_POST["msg_type"];
$ussd_body        = $_POST["ussd_body"];

if ($ussd_body == "") {
    // This is the first request. Note how we start the response with CON
    $msg_type ="1";
    $response  = "What would you want to do \n";
    $response .= "1. Make Payment \n";
    $response .= "2. Make Transfer";

} else if ($ussd_body == "1") {
    // Business logic for first level response
    $msg_type ="1";
    $response = "Enter Amount To Send \n";

} else if ($ussd_body == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with
    $msg_type ="1";
    $response = "Enter Amount To Transfer \n";

} else if($ussd_body == "1*10") { 
    // This is a second level response where the user selected 1 in the first instance
    // This is a terminal request. Note how we start the response with
    
    nw_code = null;
    if($nw_code == 01){
        $nw_code = 'mtn';

    }else if($nw_code == 02){
        $nw_code = 'vod';

    }else if($nw_cod == 03){
        $nw_code = 'air';

    }else if($nw_code$nw_cod == 04){
        $nw_code = 'tgo';
    }
    
    $amount = "10.00";

    $msg_type ="0";
    $response = "payment has been initialized";
     //call payment function here
    //payment($msisdn,$amount,$nw_code);


} else if($ussd_body == "2*10") {
    // This is a second level response where the user selected 1 in the first instance
    // This is a terminal request. Note how we start the response with
    
    nw_code = null;
    if($nw_code == 01){
        $nw_code = 'mtn';

    }else if($nw_code == 02){
        $nw_code = 'vod';

    }else if($nw_cod == 03){
        $nw_code = 'tgo';

    }else if($nw_code == 04){
        $nw_code = 'tgo';
    }
    
    $amount = "10.00";
    $msg_type ="0";
    $response = "transfer has been initialized"; 
    //call transfer function here
    //transfer($msisdn,$amount,$nw_code);
    
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
