<?php
session_start();
// if the submit button is clicked
if (isset($_POST['submit'])) 
{
	include_once 'dbconnection.php';

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$Password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT * FROM login WHERE Email = '$email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck<1) 
		{
			header("Location: login?Error=invalidu");
			exit();
		}
		else
		{
			if ($row = mysqli_fetch_assoc($result)) 
			{
				if($Password != $row['Password']) 
				{
					header("Location: login?Error=invalid");
					exit();
				}
				else 
				{		    
					if ($row['Type']=='Administrator') 
					{
						$_SESSION['a_uname']= $row['User_name'];
						$_SESSION['a_email']= $row['Email'];
      					$_SESSION['a_Password']= $row['Password'];
      					$_SESSION['a_Type']=$row['Type'];

						header("Location: admin");
						exit();
					}
					
					//Log in the user here
					// $_SESSION['u_id'] = $row['User_ID'];
					// $_SESSION['u_fname'] = $row['First_name'];
					// $_SESSION['u_Lname'] = $row['Last_name'];
					// $_SESSION['u_email'] = $row['Email'];
					// $_SESSION['u_name'] = $row['username'];	
					// header("Location: ../index.php?login=success");
					// exit();
				}
			}
		}

	
}
else
{
	header("Location: ../index?login=error");
	exit();
}

?>