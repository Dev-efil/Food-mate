<?php
session_start();
// if the submit button is clicked
if (isset($_POST['submit'])) 
{
	include_once 'dbconn.php';
	$Username = mysqli_real_escape_string($conn, $_POST['Username']);
	$Password = mysqli_real_escape_string($conn, $_POST['Password']);
	//Error handlers
	//Check if inputs are empty
	$sql = "SELECT * FROM login WHERE User_name = '$Username' OR Email = '$Username'";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
		if ($resultCheck<1) 
		{
			header("Location: ../login?Error=invalidu");
			exit();
		}
		else
		{
			if ($row = mysqli_fetch_assoc($result)) 
			{
				if ($row['Type'] == 'User' && $row['Status'] == 'Active') 
				{
					//De-hashing the password
					$hashedPasswordCheck = password_verify($Password, $row['Password']);
					if ($hashedPasswordCheck == false) 
					{
						$message = "asasasa";
					header("Location: ../login?Error=invalid");
					exit();

        				// echo '<div class="alert alert-danger" role="alert">
            //                         A simple danger alert—check it out!
            //                     </div>';
      //   				header("Location: ../login");
						// exit();
					}
					else if ($hashedPasswordCheck == true) 
					{
						$_SESSION['u_name'] = $row['User_name'];
						$_SESSION['u_pwd'] = $row['Password'];
						$_SESSION['u_email'] = $row['Email'];
						$_SESSION['u_type'] = $row['Type'];
						$_SESSION['u_id'] = $row['User_ID'];
						header("Location: ../index");
						exit();
					}
							
				}
				elseif ($row['User_name']==$Username && $row['Type']=='User' && $row['Status'] == 'Deactive') 
				{
					header("Location: ../login?Error=deactivated");
				}			
				else if ($row['Type']=='RManager' && $row['Status'] == 'Active') 
				{
					//De-hashing the password
					$hashedPasswordCheck = password_verify($Password, $row['Password']);
					if ($hashedPasswordCheck == false) 
					{
 					
         				header("Location: ../login?Error=invalid");
						// exit();
					}
					else if ($hashedPasswordCheck == true) 
					{
						$_SESSION['ru_name'] = $row['User_name'];
						$_SESSION['ru_pwd'] = $row['Password'];
						$_SESSION['ru_email'] = $row['Email'];
						$_SESSION['ru_type'] = $row['Type'];
						$_SESSION['ru_id'] = $row['User_ID'];	
					//  $_SESSION['User_name']=$Username;
      				//  $_SESSION['Password']=$Password;
                    // 	$_SESSION['Type']="RManager";
						header("Location: ../restaurant");
						exit();
					}
					
				}
				elseif ($row['User_name']==$Username && $row['Type']=='RManager' && $row['Status'] == 'Deactive') 
				{	
					header("Location: ../login?Error=deactivatedr");
				}					
			}
		}
// 		// define variables and set to empty values
// $nameErr = $emailErr = $genderErr = $websiteErr = "";
// $name = $email = $gender = $comment = $website = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (empty($_POST["name"])) {
//     $nameErr = "Name is required";
//   } else {
//     $name = test_input($_POST["name"]);
//   }
  
//   if (empty($_POST["email"])) {
//     $emailErr = "Email is required";
//   } else {
//     $email = test_input($_POST["email"]);
//   }
    
//   if (empty($_POST["website"])) {
//     $website = "";
//   } else {
//     $website = test_input($_POST["website"]);
//   }

//   if (empty($_POST["comment"])) {
//     $comment = "";
//   } else {
//     $comment = test_input($_POST["comment"]);
//   }

//   if (empty($_POST["gender"])) {
//     $genderErr = "Gender is required";
//   } else {
//     $gender = test_input($_POST["gender"]);
//   }
// }

// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
}		
else
{
	header("Location: ../index.php?login=error");
	exit();
}





?>

