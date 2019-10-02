<?php


$servername = "localhost";
$username = "irisewp";
$password = "2019w3sh1n3";
$dbname = "alvdeenservices";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
	write_to_file($data);
    die("mysql FAIL");
} 

?>