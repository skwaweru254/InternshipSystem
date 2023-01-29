<?php
session_start();

require "../db.php";


if(isset($_POST['forgot']))
{

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$confirm = mysqli_real_escape_string($con, $_POST['confirm']);
	$user_type = mysqli_real_escape_string($con, $_POST['user_type']);
	$email = mysqli_real_escape_string($con, $_POST['email']);


	if ($user_type == 'Intern') {
		$password = md5($confirm);
		$query = mysqli_query($con,"SELECT * FROM `intern` WHERE username='$username' AND email='$email'");
		$row=mysqli_fetch_assoc($query);
		if (mysqli_num_rows($query) == 1) {

			$query = mysqli_query($con,"UPDATE intern SET password='$password' WHERE username='$username' AND email='$email'");

			echo "<script>alert('Password changed successsfully, redirecting to login page!');</script>";
		    header( "refresh:0;url=../index.php"); 
	}
	    else{
		header( "refresh:0;url=../forgot.php"); 
        echo "<script>alert('Wrong Username or Email, press ok to redirect!');</script>";
	}	# code...
	
	}


	else{

		$password=md5($confirm);

		$query = mysqli_query($con,"SELECT * FROM `school` WHERE username='$username' AND email='$email'");

		$row=mysqli_fetch_assoc($query);

		if (mysqli_num_rows($query) == 1) {


	      $query = mysqli_query($con,"UPDATE school SET password='$password' WHERE username='$username' AND email='$email'");

			echo "<script>alert('Password changed successsfully, redirecting to login page!');</script>";
		    header( "refresh:0;url=../index.php"); 
		}

		

			
		else{
		header( "refresh:0;url=../forgot.php"); 
        echo "<script>alert('Wrong Username or Password');</script>";
	}
	}
	




}


?>