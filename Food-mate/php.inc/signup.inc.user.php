<?php
session_start();
if(isset($_POST['submit']))
{
	include_once 'dbconn.php';
	// Upload Profile Images to the folder
	$file = $_FILES['userimg'];

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
	 		$fileDestination = 'C:/wamp64/www/Food-mate/uploads/user/'.$fileNameNew;
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
//----------------------------------Creating variable to user text field-----------------------------------------//
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$dateofbirth = mysqli_real_escape_string($conn, $_POST['dateofbirth']);
	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$contactNo = mysqli_real_escape_string($conn, $_POST['contactNo']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirmpassword = $_POST['confirmpassword'];
	$Type="User";


    //error handlers
	//check for empty fields
	if (empty($firstname) || empty($lastname) || empty($dateofbirth) || empty($country) || empty($state) || empty($city) || empty($contactNo) 
		|| empty($email) || empty($username) || empty($password) || empty($confirmpassword))
	{ 
  		header("Location: ../Signup.php?signup=empty");
	    exit();
	}
	else
	{
		// check input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/",$firstname) || !preg_match("/^[a-zA-Z]*$/",$lastname)) 
		{
			header("Location: ../Signup.php?signup=invalid");
	    	exit(); 
		}
		else
		{
			//check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../Signup.php?signup=invalidemail");
	    		exit();
			}
			else
			{
				$sql = "SELECT * FROM user WHERE User_name = '$username'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck>0) 
				{
					header("Location: ../Signup.php?signup=usertaken");
	    			exit();
				}
				else
				{
					if (!$password == $confirmpassword) 
					{
						header("Location: ../Signup.php?signup=passwordnotmatch");
	    				exit();
					}
					else
					{
						//Hashing the password
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					// Insert the user into the database
					$sql = "INSERT INTO user (Photo,First_name,Last_name,DateOfBirth,Country,State,City,Contact_No,Email,User_name,Password,Type) 
					VALUES ('$fileNameNew','$firstname','$lastname','$dateofbirth','$country','$state','$city','$contactNo','$email','$username','$hashedPassword','$Type')";
					mysqli_query($conn, $sql);

					header("Location: ../login.php?signup=usersuccess");
	    			exit();
					}
					
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