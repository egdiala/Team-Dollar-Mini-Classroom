<?php
session_start();

if(!isset($_SESSION["id"])){
	header("location:index.php");
}

function giveFeedback($status, $message ){
    if($status){
      header("location:../class-signup-view.php?cid=".$_POST["cid"]."&s=1");
    } else {
      header("location:../class-signup-view.php?cid=".$_POST["cid"]); 
    } 
}

$message = "";
$status = 0;

if(isset($_POST["cid"])){



    require "../db/db.php";


    $sid = ($_SESSION["id"] ? mysqli_real_escape_string($conn, $_SESSION["id"]) : "");
    $cid = ($_POST["cid"] ? mysqli_real_escape_string($conn, $_POST["cid"]) : "");

    $sql = "INSERT INTO `student_classes` SET
      `sid` = " . $sid . ",
      `cid` = " . $cid . "";


    if ($conn->query($sql) === TRUE) {
        $status=1;
        //$message = $conn->insert_id;
    } else {
        $message = $conn->error ;
    }

    $conn->close();


} else {
    $message = "You have to give the item a name.";
}

giveFeedback($status,  $message );
exit();
?>