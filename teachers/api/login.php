<?php

session_start();

function giveFeedback( $status , $message ){
    $arr = array();
    $arr["status"] = $status;
    $arr["message"] = $message;
    echo json_encode($arr);  
}

$json = file_get_contents('php://input');
$data = json_decode($json);

if(!json_last_error() == JSON_ERROR_NONE){
    giveFeedback( "FAILURE" , "Bad json sent." );
    exit();
}

if(!$data->email || !$data->password){
	giveFeedback( "FAILURE" , "You need to provide email and password." );
	exit;
}

//require "../db/db.php";


//get user from database and compare
if($data->email == "teacher1@hotmail.com" && $data->password == "password"){
	giveFeedback( 'SUCCESS' , "");

	$_SESSION["id"] = 1;
	$_SESSION["name"] = "Teacher One";
	$_SESSION["email"] = "teacher1@hotmail.com";
	
} else {
	giveFeedback( 'FAILED' , "Wrong username or password.");
}


?>