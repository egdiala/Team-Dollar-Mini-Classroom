<?php
session_start();

if(!isset($_SESSION["id"])){
	header("location:index.html");
}

function giveFeedback($status, $message ){
    if($status){
      header("location:../class-view.php?cid=".$message);
    } else {
      header("location:../create-class-view.php?m=".$message); 
    } 
}

$message = "";
$status = 0;

if(isset($_POST["name"])){

    /*
    if(!$data->tid || !$data->name){
    	giveFeedback( "You need to provide teacher Id(tid) and name." );
    	exit;
    }
    */

    require "../db/db.php";

    $tid = $_SESSION["id"];
    $name = $_POST["name"];
    $desc = $_POST["description"];

    $tid = ($tid ? mysqli_real_escape_string($conn, $tid) : "");
    $name = ($name ? mysqli_real_escape_string($conn, $name) : "");
    $desc = ($desc ? mysqli_real_escape_string($conn, $desc) : "");

    $sql = "INSERT INTO `classes` SET
      `name` = '" . $name . "',
      `teacherId` = " . $tid . ",
      `description` = '" . $desc . "', 
      `date_added` = NOW()";

    if ($conn->query($sql) === TRUE) {
        $status=1;
        $message = $conn->insert_id;
    } else {
        $message = $conn->error ;
    }

    $conn->close();


} else {
    $message = "You have to give the class a name.";
}

giveFeedback($status,  $message );
exit();
?>