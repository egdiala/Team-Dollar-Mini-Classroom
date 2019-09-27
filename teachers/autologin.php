<?php
session_start();

	$_SESSION["id"] = 1;
	$_SESSION["name"] = "Teacher One";
	$_SESSION["email"] = "teacher1@hotmail.com";

header("location:dashboard.php");
?>