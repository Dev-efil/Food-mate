<?php
include_once 'dbconnection.php';

// if the submit button is clicked
if (isset($_POST['submit']))
{
	// $statuss = $_POST['status'];
	$userid = $_POST['userid'];
	print $userid; die;
	if (isset($_POST['stus']) && ($_POST['stus']=="Active"))
	{
		$ststsu=$_POST['stus'];
		print $ststsu;
		$sql = "UPDATE restauranteditor SET Status='Active' WHERE REditor_ID=$rrid";
		$result = mysqli_query($conn, $sql);      
	}
	else if (isset($_POST['stus']) && ($_POST['stus']=="Deactive")) 
	{
		$sql = "UPDATE restauranteditor SET Status='Deactive' WHERE REditor_ID=$rrid";
		$result = mysqli_query($conn, $sql);
	}
}
else
{
	echo "error";
}


?>