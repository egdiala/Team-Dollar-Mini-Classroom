<?php
session_start();

if(!isset($_SESSION["id"])){
	header("location:index.html");
}

function giveFeedback($status, $message ){
    if($status){
      header("location:../class-view.php?cid=".$_POST["cid"]);
    } else {
      header("location:../create-item-view.php?m=".$message); 
    } 
}

$message = "";
$status = 0;

if(isset($_POST["name"])){



    require "../db/db.php";

    $tid = $_SESSION["id"];
    $cid = $_POST["cid"];
    $name = $_POST["name"];
    $desc = $_POST["description"];

    $tid = ($tid ? mysqli_real_escape_string($conn, $tid) : "");
    $cid = ($cid ? mysqli_real_escape_string($conn, $cid) : "");
    $name = ($name ? mysqli_real_escape_string($conn, $name) : "");
    $desc = ($desc ? mysqli_real_escape_string($conn, $desc) : "");

    $sql = "INSERT INTO `items` SET
      `name` = '" . $name . "',
      `description` = '" . $desc . "',
      `classId` = " . $cid . ",
      `teacherId` = " . $tid . ",
      `date_added` = NOW()";

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