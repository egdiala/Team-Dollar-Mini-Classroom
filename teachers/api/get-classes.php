<?php
session_start();

if(!isset($_SESSION["id"])){
	exit("No session in progress");
}

require "../db/db.php";

$tid = 0;
if(isset($_GET["tid"])){
	$tid = $_GET["tid"];
}

$tid = ($tid ? mysqli_real_escape_string($conn, $tid) : "");

$where = ""; //optional sql where statement

if($tid){
  $where = " WHERE `creator` = $tid";
}

$sql = "SELECT * FROM `classes` $where";

$result = $conn->query($sql);

if($result === FALSE){
  echo $conn->error;
} else if ($result->num_rows > 0) {
  $outputarray = array();

  while($row = $result->fetch_assoc()) {
      $outputarray[] = json_encode($row);
  }

  $feedback = "[" . implode(",", $outputarray) . "]";

} else {
    $feedback = "[]";
}
echo $feedback;

/*
[
    {“cid” : 1, “name”:”Teacher Name”, “students”:10},
    {“cid” : 2, “name”:”Teacher Name”, “students”:5},
    {“cid” : 3, “name”:”Teacher Name”, “students”:7}
]
*/

$conn->close();
?>