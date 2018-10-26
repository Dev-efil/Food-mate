<?php
	$email = $_GET['Email'];
	$token = $_GET['Token'];

	include_once 'dbconn.php';
	$sql = "SELECT login_ID FROM login WHERE Email ='$email' AND Token='$token'";
	$result = mysqli_query($conn, $sql);

	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck>0) 
	{
		header("Location: ../password-recovery?Email=$email");
	}
	else
	{
		die("row error: ".mysqli_connect_error());
	}
		// Email = '".mysql_real_escape_string($email)."' "AND" Token ='".mysql_real_escape_string($token)."'

?>

