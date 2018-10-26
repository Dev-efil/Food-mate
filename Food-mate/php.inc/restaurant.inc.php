<?php
session_start();
if (isset($_POST['submit']))
{
	include_once 'dbconn.php';
	$file = $_FILES['Restaurantimg'];

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
	 			$fileDestination = 'C:/wamp64/www/Food-mate/uploads/restaurant/'.$fileNameNew;
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

	$restaurantName = mysqli_real_escape_string($conn, $_POST['restname']);
	$restaurantInfo = mysqli_real_escape_string($conn, $_POST['restinfo']);
	$restaurantAddress = mysqli_real_escape_string($conn, $_POST['restaddress']);
	$restaurantContact = mysqli_real_escape_string($conn, $_POST['contactno']);
	$restaurantEmail = mysqli_real_escape_string($conn, $_POST['email']);
	$REditorid = $_SESSION['ru_id'];


   

				$sql = "SELECT * FROM restaurant WHERE RName = '$restaurantName'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck>0) 
				{
					header("Location: ../restaurant.php?signup=usertaken");
	    			exit();
				}
				else
				{
					$sql = "INSERT INTO restaurant(REditor_ID, Image, RName, Restaurant_info, Address, Contact_No, Email) VALUES ('$REditorid','$fileNameNew','$restaurantName','$restaurantInfo','$restaurantAddress','$restaurantContact','$restaurantEmail')";
					   // print $restaurantName.$restaurantInfo.$restaurantAddress.$restaurantContact.$restaurantEmail.$REditorid; die; '3','pic','pizza','asdasdasd','18,2\2 wella','07766524','thanu@gmail.com' 
					print $REditorid;
					mysqli_query($conn, $sql);
					header("Location: ../restaurant.php?signup=success");
	    			exit();
				}	
	
}
else
{
	header("Location: ../restaurant.php?error");
	exit();
}

