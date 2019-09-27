<?php
session_start();

if(!isset($_SESSION["id"])){
	exit("No session in progress");
}

$json = file_get_contents('php://input');
$data = json_decode($json);

function giveFeedback( $status , $message ){
    $arr = array();
    $arr["status"] = $status;
    $arr["message"] = $message;
    echo json_encode($arr);  
}

if(!json_last_error() == JSON_ERROR_NONE){
    giveFeedback( "FAILURE" , "Bad json sent." );
    exit();
}

if(!$data->tid || !$data->name){
	giveFeedback( "FAILURE" , "You need to provide teacher Id(tid) and name." );
	exit;
}

require "../db/db.php";

$tid = $data->tid;
$name = $data->name;
$desc = $data->description;

$tid = ($tid ? mysqli_real_escape_string($conn, $tid) : "");
$name = ($name ? mysqli_real_escape_string($conn, $name) : "");
$desc = ($desc ? mysqli_real_escape_string($conn, $desc) : "");

$sql = "INSERT INTO `classes` SET
  `name` = '" . $name . "',
  `teacherId` = " . $tid . ",
  `description` = '" . $desc . "', 
  `date_added` = NOW()";

if ($conn->query($sql) === TRUE) {
    giveFeedback( "SUCCESS" , "Class created successfully" );
} else {
    giveFeedback( "FAILURE" , $conn->error );
}

$conn->close();

?>