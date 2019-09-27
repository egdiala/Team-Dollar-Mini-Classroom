<?php
session_start();

if(!isset($_SESSION["id"])){
	exit("No session in progress");
}


$cid = 0;
if(isset($_GET["cid"])){
	$cid = $_GET["cid"];
}

$iid = 0;
if(isset($_GET["iid"])){
  $iid = $_GET["iid"];
}

$tid = 0;
if(isset($_GET["tid"])){
  $tid = $_GET["tid"];
}

require "../db/db.php";

$cid = ($cid ? mysqli_real_escape_string($conn, $cid) : "");
$iid = ($iid ? mysqli_real_escape_string($conn, $iid) : "");
$tid = ($tid ? mysqli_real_escape_string($conn, $tid) : "");

$where = "";

if($tid){
  $where = $where . " `teacherId` = $tid ";
}

if($iid){
  if( $where ) { $where .= " and "; }
  $where .= " `iid` = $iid ";
}

if($cid){
  if( $where ) { $where .= " and "; }
  $where .= " `classId` = $cid ";
}

if($cid || $iid || $tid){
  $where = " WHERE " . $where;
}

$sql = "SELECT * FROM `items` $where";

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


$conn->close();
/*
[
    {“iid” : 1, “name”:”Item 1”, "description": "the description", "classId":1, "teacherId": 1, "date_added": "1 January 2019" } ...
]
*/
?>