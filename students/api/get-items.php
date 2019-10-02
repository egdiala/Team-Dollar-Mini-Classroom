<?php

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

require "db/db.php";

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
$items = array();

if($result === FALSE){
  echo $conn->error;
} else if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
      $items[] = $row;
  }

} else {
    //Nothing to show
}


$conn->close();

?>