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

    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];



    $email = ($email ? mysqli_real_escape_string($conn, $email) : "");
    $name = ($name ? mysqli_real_escape_string($conn, $name) : "");
    $password = ($password ? mysqli_real_escape_string($conn, $password) : "");

    $sql = "INSERT INTO `teachers` SET
      `name` = '" . $name . "',
      `email` = '" . $email . "',
      `password` = '" . $password . "'";


    if ($conn->query($sql) === TRUE) {
        header("location:../index.php?m=Successful registration. Please log in.");
    } else {
        $message = $conn->error ;
    }

    $conn->close();


} else {
    header("location:../index.php?m=Please fill all fields.");
}
exit();
?>