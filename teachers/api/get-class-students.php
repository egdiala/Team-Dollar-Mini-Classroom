<?php

/*
if(!isset($_SESSION["id"])){
	exit("No session in progress");
}
*/

require "db/db.php";

$cid = $_GET["cid"];

$cid = ($cid ? mysqli_real_escape_string($conn, $cid) : "");

$where = ""; //optional sql where statement

if($cid){
  $where = " WHERE `student_classes`.`cid` = $cid";
}

$sql = "SELECT student_classes.scid, student_classes.sid, student_classes.cid, students.sid, students.name FROM student_classes INNER JOIN students ON student_classes.sid =students.sid $where";

$result = $conn->query($sql);
$students = array();

if($result === FALSE){
  echo $conn->error;
} else if ($result->num_rows > 0) {


  while($row = $result->fetch_assoc()) {
      $students[] = $row;
  }

} else {
    //$feedback = "[]";
}

$conn->close();
?>