<?php
session_start();

require "../db.php";



//configuration for system users

if(isset($_POST['login_user']))
{

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$user_type = mysqli_real_escape_string($con, $_POST['user_type']);

	if ($user_type == 'Administrator') {
		$password = md5($password);
		$query = mysqli_query($con,"SELECT * FROM `admin` WHERE username='$username' AND password='$password'");
		$row=mysqli_fetch_assoc($query);
		if (mysqli_num_rows($query) == 1) {
		$_SESSION["id"]=$row['id'];
		$_SESSION["username"]=$row['username'];


		if (isset($_SESSION['username'])) {
			# code...		

			header("location:../admin/admin.php");

		}

	}
	    else{
		header( "refresh:0;url=../index.php"); 
        echo "<script>alert('Wrong Username or Password, press ok to redirect!');</script>";
	}	# code...
	
	}

		
	elseif ($user_type == 'Intern') {
		$password = md5($password);

		$query = mysqli_query($con,"SELECT * FROM `intern` WHERE username='$username' AND password='$password'");

		$row=mysqli_fetch_assoc($query);


		if (mysqli_num_rows($query) == 1) {
		$_SESSION["email"]=$row['email'];
		$_SESSION["username"]=$row['username'];
		$_SESSION["regno"]=$row['regno'];
		$_SESSION["school"]=$row['school'];



		if (isset($_SESSION['username'])) {
			# code...		

		header("location:../intern/intern.php");}

		}
		
		else{
		header( "refresh:0;url=../index.php"); 
        echo "<script>alert('Wrong Username or Password!');</script>";
	}

	}
		
	elseif ($user_type == 'hostSupervisor') {
		$password=md5($password);
		$query = mysqli_query($con,"SELECT * FROM `host` WHERE username='$username' AND password='$password'");

		$row=mysqli_fetch_assoc($query);

		if (mysqli_num_rows($query) == 1) {
		$_SESSION["id"]=$row['id'];
		$_SESSION["username"]=$row['username'];
		$_SESSION["email"]=$row['email'];



		if (isset($_SESSION['username'])) {
			# code...		

		header("location:../supervisor/host/hostSupervisor.php");}

		}
			
		else{
		header( "refresh:0;url=../index.php"); 
        echo "<script>alert('Wrong Username or Password');</script>";
	}
	}

	else{

		$password=md5($password);

		$query = mysqli_query($con,"SELECT * FROM `school` WHERE username='$username' AND password='$password'");

		$row=mysqli_fetch_assoc($query);

		if (mysqli_num_rows($query) == 1) {
		$_SESSION["id"]=$row['id'];
		$_SESSION["username"]=$row['username'];
		$_SESSION["email"]=$row['email'];
		$_SESSION["school"]=$row['school'];





		if (isset($_SESSION['username'])) {
			# code...		

		header("location:../supervisor/school/schoolSupervisor.php");}

	     }

			
		else{
		header( "refresh:0;url=../index.php"); 
        echo "<script>alert('Wrong Username or Password');</script>";
	}
	}
	




}

?>