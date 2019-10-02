<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "hngi_miniclassroom";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
	write_to_file($data);
    die("mysql FAIL");
} 

?>