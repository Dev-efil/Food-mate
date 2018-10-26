<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
if (isset($_POST['submit'])) 
{
	include_once 'dbconn.php';
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$selectquery = mysqli_query($conn, "SELECT * FROM login WHERE Email='$email'") or die(mysqli_error($conn));
	$count = mysqli_num_rows($selectquery);
	$row = mysqli_fetch_array($selectquery);

	if($count>0)
	{
		$token = substr(md5(uniqid()),0,15);
		$sql = "UPDATE login SET Token ='$token' WHERE Email = '$email'";
		$result = mysqli_query($conn, $sql);
		if ($result)
		{
			// header("Location: ../forgot-password");

			echo '<script>
        alert("Request has been sent successfully..!! \nReset Password Link is sent to your E-mail, Check your E-mail. \n\nThank you.");
    </script>';

		}
		else
		{
			echo "Error updating record: " . mysqli_error($conn);
		}
		//echo $row['Password'];
		$url = "http://localhost/Food-mate/php.inc/password-recovery.inc.php?Email=$email&Token=$token";
		// Import PHPMailer classes into the global namespace
		// These must be at the top of your script, not inside a function


		//Load Composer's autoloader
		require 'C:/wamp64/www/Food-mate/vendor/autoload.php';

		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try 
		{
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'foodmate.official@gmail.com';                 // SMTP username
		    $mail->Password = '123food123';                           // SMTP password
		    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 465;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('foodmate.official@gmail.com', 'Food-mate');
		    $mail->addAddress($email, $email);     // Add a recipient

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Password Recovery';
		    $mail->Body    = "Hello $email..!! Click the URL and reset your password $url";
		    $mail->AltBody = "Hello $email..!! Click the URL and reset your password $url";

		    $mail->send();
// header("Location: ../index");

    echo '<script>

        window.location.replace("http://localhost/Food-mate/index");

    </script>';

		 //    echo "<script>alert('Email has been sent');</script>";
		 //    header("Location: ../index");
		 //    echo "<script>alert('Email has been sent');</script>";
			// exit();
		} 
		catch (Exception $e) 
		{
		    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
	else
	{
		echo "<script>alert('E-mail address not found..!!');</script>";
	}

}
?>


