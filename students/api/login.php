<?php

session_start();

function giveFeedback( $status , $message ){
    $arr = array();
    $arr["status"] = $status;
    $arr["message"] = $message;
    echo json_encode($arr);  
}


/*
session_start();

	$_SESSION["id"] = 1;
	$_SESSION["name"] = "Teacher One";
	$_SESSION["email"] = "teacher1@hotmail.com";

header("location:../dashboard.php");
exit();
*/

/*
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
*/

if(isset($_POST["email"]) && isset($_POST["password"])){


	require "../db/db.php";

	$email = ($_POST["email"] ? mysqli_real_escape_string($conn, $_POST["email"]) : "");
	$password = ($_POST["password"] ? mysqli_real_escape_string($conn, $_POST["password"]) : "");


	$sql = "SELECT * FROM `students` where `email` = '$email' and `password` = '$password' LIMIT 1";

	

	$result = $conn->query($sql);

	if($result === FALSE){
	  echo $conn->error;
	} else if ($result->num_rows > 0) {


	  while($row = $result->fetch_assoc()) {
	      $class = $row;


		$_SESSION["id"] = $row["sid"];
		$_SESSION["name"] = $row["name"];
		$_SESSION["email"] = $row["email"];
	  }

	  $conn->close();
	  header("location:../dashboard.php");

	} else {
	  $conn->close();
	  header("location:../index.php?m=Wrong username or password.");
	}

} else {
	header("location:../index.php?m=Fill in email and password.");
}

?>