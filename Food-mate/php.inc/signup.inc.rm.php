<?php
session_start();
if(isset($_POST['submit1']))
{
	include_once 'dbconn.php';

	$file = $_FILES['RMimg'];
	
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
	 		$fileDestination = 'C:/wamp64/www/Food-mate/uploads/rmanager/'.$fileNameNew;
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



//-------------------------------Restaurant----------------------------------//
	$RMemail = mysqli_real_escape_string($conn, $_POST['RMemail']);
	$RMContactNo = mysqli_real_escape_string($conn, $_POST['RMContactNo']);
	$RMusername = mysqli_real_escape_string($conn, $_POST['RMusername']);
	$RMpassword = mysqli_real_escape_string($conn, $_POST['RMpassword']);
	$RMconfirmpassword = mysqli_real_escape_string($conn, $_POST['RMconfirmpassword']);
	$Type="RManager";
	

// error handlers
	//check for empty fields
	if ( empty($RMemail) || empty($RMContactNo) || empty($RMusername) || empty($RMpassword) || empty($RMconfirmpassword))
	{ 
  		header("Location: ../Signup.php?signup=empty");
	    exit();
	}
	else
	{
		// check input characters are valid
		if (!preg_match("/^[a-zA-Z0-9]*$/", $RMusername)) 
		{
			header("Location: ../Signup.php?signup=invalid");
	    	exit(); 
		}
		else
		{
			//check if email is valid
			if (!filter_var($RMemail, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../Signup.php?signup=invalidemail");
	    		exit();
			}
			else
			{
				$sql = "SELECT * FROM restauranteditor WHERE REditor_username = '$RMusername'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck>0) 
				{
					header("Location: ../Signup.php?signup=resMantaken");
	    			exit();
				}
				else
				{
					//Hashing the password
					$hashedPassword = password_hash($RMpassword, PASSWORD_DEFAULT);
					// Insert the user into the database
					$sql = "INSERT INTO restauranteditor(REditor_profile_pic,Email,	REditorContact_No,User_name,Password,Type) VALUES('$fileNameNew','$RMemail','$RMContactNo','$RMusername','$hashedPassword','$Type')";
					mysqli_query($conn, $sql);
					
					header("Location: ../login.php?signup=ressuccess");	
	    			exit();
				}
			}

		}

	} 
}
else
{
	header("Location: ../Signup.php");
	exit();
}

?>