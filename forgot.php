<?php
require('db.php');
session_start();/*

Written by Simon Waweru.
Language used Php and Html
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome-InternshipSystem</title>
<link rel="stylesheet" type="text/css" href="w3css/2.0/w3.css">
</head>
<body style="background-image: url(images/h.jpg);background-repeat:no-repeat;background-size: cover;object-fit: cover">
     

	<form class="w3-container w3-white w3-padding-16" style="width: 50%;margin:64px auto;opacity: 0.8;"  method="post" action="router/reset.php">

		   <div>
			<h2 class=" w3-container w3-text-black w3-center w3-orange w3-margin-0 w3-padding-16"><b>FORGOT PASSWORD</b></h2>
		</div>

		<p>
			<label class="w3-label w3-validate">Username</label>
			<input type="text" class="w3-input w3-light-grey" name="username" required="" >
		</p>

		<P>
			<label class="w3-label w3-validate">Email</label>
			<input type="email" class="w3-input w3-light-grey" name="email" required="">
		</p>

		<p>
			<select class="w3-select w3-light-grey w3-validate" name="user_type" required="">
			<option value="" disabled selected>User Type</option>
			<option value="Intern">Intern</option>
			<option value="schoolSupervisor">School Supervisor</option>
			

			</select>
		</p>

		<p>
			<label class="w3-label w3-validate">Password</label>
			<input type="password" class="w3-input w3-light-grey" name="password" id="myInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 to 10 characters"  required="">
		</p>
		
		<input type="checkbox" onclick="myFunction()" class="w3-margin-8"><b>Show Password</b>

        <script>
         function myFunction() {
         var x = document.getElementById("myInput");
         if (x.type === "password") {
         x.type = "text";
         } 
         else {
           x.type = "password";
          }
            }
        </script>
		<p>
			<button class="w3-btn w3-orange" type="" name="forgot">Submit</button> 
		
		</p>
		<p><b>I remembered the password!  <a href='index.php' class="w3-text-green" style="text-decoration: none;">Redirect Back</a></b></p>
	</form>




</body>
</html>
