<?php

/*
if(!isset($_SESSION["id"])){
	exit("No session in progress");
}
*/
if(!isset($_GET["cid"])){
  location("header:dashboard.php");
}

require "db/db.php";

$tid = $_SESSION["id"];
$tid = ($tid ? mysqli_real_escape_string($conn, $tid) : "");

$cid = $_GET["cid"];
$cid = ($cid ? mysqli_real_escape_string($conn, $cid) : "");

$where = ""; //optional sql where statement

if($tid){
  $where = " WHERE  `cid`=$cid and `teacherId` = $tid ";
}

$sql = "SELECT * FROM `classes` $where";

$result = $conn->query($sql);


if($result === FALSE){
  echo $conn->error;
} else if ($result->num_rows > 0) {


  while($row = $result->fetch_assoc()) {
      $class = $row;
  }

} else {
    $class = array();
}

$conn->close();
?>