<?php
session_start();

require "../db.php";




if (isset($_POST['reg_user'])) {

	$errors=array();
	$username="";
	$email="";
	
	$username = stripslashes($_POST['username']); // removes backslashes
	$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$univercollege = stripslashes($_POST['univercollege']);
	$univercollege = mysqli_real_escape_string($con,$univercollege);
	$regno = stripslashes($_POST['regno']);
	$regno = mysqli_real_escape_string($con,$regno);
	$starting = stripslashes($_POST['start']);
	$starting = mysqli_real_escape_string($con,$starting);
	$ending = stripslashes($_POST['end']);
	$ending = mysqli_real_escape_string($con,$ending);
	$gender = stripslashes($_POST['gender']);
	$gender = mysqli_real_escape_string($con,$gender);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$message = "$username would like to request an account.";

    //check the existence of the username/email in the database
	$result1= mysqli_query($con, "SELECT * FROM requests WHERE username='$username' OR email='$email'");
	$result2= mysqli_query($con,"SELECT * FROM intern WHERE username='$username' OR email='$email'");

    $user1 = mysqli_fetch_assoc($result1);
    $user2 = mysqli_fetch_assoc($result2);


	if ($user1['username'] == $username || ($user2['username'] == $username )){
	array_push($errors, $errors);
	header( "refresh:0;url=../registration.php" ); 
	echo "<center><script>alert('Username already exists!');</script></center>";
	}

	if ($user1['email'] == $email  || ($user2['email'] == $email)) {
	array_push($errors, $errors);
	header( "refresh:0;url=../registration.php" ); 
	echo "<center><script>alert('Email already exists!');</script></center>";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	array_push($errors, "Invalid email address");
	header( "refresh:0;url=../registration.php" ); 
	echo "<script>alert('You have entered an invalid email format');</script>";      	    
	}
	if(!preg_match("/^([a-zA-Z ]+)$/",$username)){
	array_push($errors, $errors);
    header( "refresh:0;url=../registration.php" ); 
    echo "<script>alert('Username must contain letters and whitespace only');</script>";
    }
    if(!preg_match("/^([A-Z0-9\/]+)$/",$regno)){
	array_push($errors, $errors);
    header( "refresh:0;url=../registration.php" ); 
    echo "<script>alert('Registration must contain Upper case letters and digits only');</script>";
    }


	if (count($errors) == 0) {

		$trn_date = date("Y-m-d H:i:s");
        $query = mysqli_query($con,"INSERT into `requests` (`id`, `username`, `email`,`school`,`regno`, `start`,`end`,`gender`,`password`, `message`, `trn_date`) VALUES (NULL, '$username','$email','$univercollege','$regno','$starting','$ending','$gender','".md5($password)."', '$message', CURRENT_TIMESTAMP)");


		header("refresh:0;url=index.php");
        echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.');window.location = 'http://localhost/InternshipSystem/index.php';</script>";
	}
	
	 	
	}



?>