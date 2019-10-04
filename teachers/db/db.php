<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "hngi_miniclassroom";


$prodconfig = realpath($_SERVER['DOCUMENT_ROOT'] . "/../hngi-db-config.php");

if (file_exists($prodconfig)) {
    include $prodconfig;
}

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
    die("mysql FAIL");
}
