<?php

/*
if(!isset($_SESSION["id"])){
	exit("No session in progress");
}
*/

require "db/db.php";

$tid = $_SESSION["id"];

$tid = ($tid ? mysqli_real_escape_string($conn, $tid) : "");

$where = ""; //optional sql where statement

if($tid){
  $where = " WHERE `teacherId` = $tid";
}

//$sql = "SELECT * FROM `classes` $where";
$sql = "SELECT `classes`.*,
(SELECT count(*) from `student_classes` where `student_classes`.`cid` = `classes`.`cid`) as members
FROM `classes` $where ";

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