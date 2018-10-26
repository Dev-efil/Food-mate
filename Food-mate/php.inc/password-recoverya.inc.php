<?php 
include_once 'dbconn.php';
   $Email = mysqli_real_escape_string($conn, $_POST['email']);
print $Email; die;
if (isset($_POST['submit'])) 
{
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

			if ($password==$confirmpassword)
			{
				//Hashing the password
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				$sql = "UPDATE login SET Password='$hashedPassword' WHERE Email='$Email'";
				$result = mysqli_query($conn, $sql);
					if ($result) 
					{
						echo "password reseted";
					}
					else
					{
						echo "Error updating record: ".mysqli_error($conn);
					}
			}
			else
			{
				echo "Password didn't match";
			}
}


 ?>