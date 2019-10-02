<?php

/*
if(!isset($_SESSION["id"])){
	exit("No session in progress");
}
*/

require "db/db.php";

$sid = $_SESSION["id"];

$sid = ($sid ? mysqli_real_escape_string($conn, $sid) : "");

$where = ""; //optional sql where statement

if($sid){
  $where = " WHERE `student_classes`.`sid` = $sid";
}

//$sql = "SELECT student_classes.scid, student_classes.sid, classes.cid, classes.name FROM student_classes LEFT JOIN classes ON classes.cid = student_classes.cid $where";

$sql = "SELECT * from `classes`";

$result = $conn->query($sql);
$feedback = array();

if($result === FALSE){
  echo $conn->error;
} else if ($result->num_rows > 0) {


  while($row = $result->fetch_assoc()) {
      $feedback[] = $row;
  }

} else {
    //$feedback = "[]";
}

$conn->close();
?>