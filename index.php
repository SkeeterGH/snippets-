<?php
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

} else if($ussd_body == "1*+233548711633") { 
    // This is a second level response where the user selected 1 in the first instance
    // This is a terminal request. Note how we start the response with
    $msg_type ="0";
    $response = "payment has been initialized";

} else if($ussd_body == "2*+233548711633") {
    // This is a second level response where the user selected 1 in the first instance
    // This is a terminal request. Note how we start the response with
    $msg_type ="0";
    $response = "transfer has been initialized"; 
    //call payment function here
    
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
