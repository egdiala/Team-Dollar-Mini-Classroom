<?php
session_start();

if(!isset($_SESSION["id"])){
	exit("No session in progress");
}

$json = file_get_contents('php://input');
$data = json_decode($json);

if(!json_last_error() == JSON_ERROR_NONE){
    $arr["status"] = "FAILURE";
    $arr["message"] = "Bad json sent.";
    echo json_encode($arr);
    exit();
}

if(!$data->tid || !$data->name){
	$feedack = array("status"=>"FAILURE", "message"=>"You need to provide teacher Id(tid) and name.");
	echo json_encode($feedback);
	exit;
}

require "../db/db.php";

$tid = $data->tid;
$teachername = $data->name;
$desc = $data->description;

$tid = ($tid ? mysqli_real_escape_string($conn, $tid) : "");
$teachername = ($teachername ? mysqli_real_escape_string($conn, $teachername) : "");
$desc = ($desc ? mysqli_real_escape_string($conn, $desc) : "");

$sql = "INSERT INTO `classes` SET
  `name` = '" . $teachername . "',
  `creator` = " . $tid . ",
  `description` = '" . $desc . "', 
  `date_added` = NOW()";

$arr = array();
if ($conn->query($sql) === TRUE) {
    $arr["status"] = "SUCCESS";
    $arr["message"] = "Class created successfully";
    
} else {
    $arr["status"] = "FAILURE";
    $arr["message"] = $conn->error;
}
echo json_encode($arr);

$conn->close();

?>