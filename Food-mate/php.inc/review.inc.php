<?php
session_start();
// if the submit button is clicked
if (isset($_POST['submit'])) 
{
	
	include_once 'dbconn.php';
	$username=$_SESSION['u_name'];
	$u_id=$_SESSION['u_id'];
	$review = mysqli_real_escape_string($conn, $_POST['review']);
	$id=$_SESSION['Dishid'];

	
	$sql = "INSERT INTO review(User_ID,username,Dish_ID,Comment,Posted_date) VALUES('$u_id','$username','$id','$review',NOW())";
	mysqli_query($conn, $sql);
	header("Location: ../dish?id=$id");

}
else
{
	echo "Error";
}