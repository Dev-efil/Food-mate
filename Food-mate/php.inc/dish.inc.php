<?php
session_start();
// if the submit button is clicked
if (isset($_POST['submitdish'])) 
{
	include_once 'dbconn.php';

	$file = $_FILES['dishImage'];
	
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.', $fileName);
	$fileAcctualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png');

	if (in_array($fileAcctualExt, $allowed)) 
	{
	 if ($fileError === 0) 
	 {
	 	if ($fileSize<10000000) 
	 	{
	 		$fileNameNew = uniqid('',true).".".$fileAcctualExt;
	 		$fileDestination = 'C:/wamp64/www/Food-mate/uploads/dish/'.$fileNameNew;
	 		move_uploaded_file($fileTmpName, $fileDestination); 		
	 	}
	 	else
	 	{
	 		echo "Your file is too big!";
	 	}
	 }
	 else
	 {
	 	echo "There wan an error uploading your file!";
	 }
	}
	else
	{
		echo "You Cannot upload files of this type!";
	}

	$Reditorid = $_SESSION['ru_id'];
    $sqlRestid = "SELECT Restaurant_ID FROM restaurant WHERE REditor_ID = $Reditorid";
    $result = mysqli_query($conn, $sqlRestid);
     if ($row = mysqli_fetch_assoc($result)) 
      {
      	$Restid=$row['Restaurant_ID'];
      }
	// $result = mysqli_query($conn, $Restid);
	// $resultCheck = mysqli_num_rows($result);
		// if ($resultCheck>0) 
		// {
		// 	if ($row = mysqli_fetch_assoc($result)) 
		// 	{
		// 		$_SESSION['Restaurant_id'] = $row['Restaurant_ID'];
		// 	}
		// }
	$dishName = mysqli_real_escape_string($conn, $_POST['dishName']);
	$dishInfo = mysqli_real_escape_string($conn, $_POST['dishInfo']);
	$dishPrice = mysqli_real_escape_string($conn, $_POST['dishPrice']);
	$sql = "INSERT INTO dish (Restaurant_ID,Dish_image,Dish_name,Dish_info,Dish_price) VALUES('$Restid','$fileNameNew','$dishName','$dishInfo','$dishPrice')";
	mysqli_query($conn, $sql);
	header("Location: ../restaurant.php?add=dishSuccess");	
	    			exit();
		
			

}
else
{

	header("Location: ../restaurant.php");
	exit();
}