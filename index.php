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
    $response  = "What would you want to check \n";
    $response .= "1. My Account \n";
    $response .= "2. My phone number";

} else if ($ussd_body == "1") {
    // Business logic for first level response
    $msg_type ="1";
    $response = "CON Choose account information you want to view \n";
    $response .= "1. Account number \n";

} else if ($ussd_body == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $msg_type ="0";
    $response = "END Your phone number is ".$phoneNumber;

} else if($ussd_body == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "ACC1001";

    // This is a terminal request. Note how we start the response with END
    $msg_type ="0";
    $response = "END Your account number is ".$accountNumber;

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
