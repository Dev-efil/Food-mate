<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "Food-mate";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) 
{
	die("Connection failed: ".mysql_connect_error());
}


?>
