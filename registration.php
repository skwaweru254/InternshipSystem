<?php
/*
Written by Simon Waweru.
Language used Php and Html
*/

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration-InternshipSystem</title>
<link rel="stylesheet" type="text/css" href="w3css/2.0/w3.css">
</head>
<body style="background-image: url(images/h.jpg);background-repeat:no-repeat;background-size: cover;object-fit: cover">


<form method="post" action="router/signup.php" class="w3-container w3-white w3-opacity w3-padding-16" style="width: 50%;margin:16px auto;">

	 <div>
			<h2 class=" w3-container w3-text-black w3-center w3-green w3-margin-0 w3-padding-16"><b>REGISTRATION</b></h2>
		</div>

		<p>
			<label class="w3-label w3-validate">Username</label>
			<input type="text" class="w3-input w3-light-grey" maxlength="10" name="username" required="" >
		</p>

		<P>
			<label class="w3-label w3-validate">Email</label>
			<input type="email" class="w3-input w3-light-grey" name="email" value="" required="">
		</p>
		<p>
			<select class="w3-select w3-light-grey w3-validate" name="univercollege" required="">
			<option value="" disabled selected>University/College</option>
			<option value="Nairobi University">Nairobi University</option>
			<option value="Egerton University">Egerton University</option>
			<option value="Moi University">Moi University</option>
			<option value="Kenyatta University">Kenyatta University</option>
			<option value="Maseno University">Maseno University</option>
			<option value="Nairobi Aviation College">Nairobi Aviation College</option>
			<option value="RVIST College">RVIST College</option>
			<option value="JKUAT University">JKUAT University</option>
			<option value="Laikipia University">Laikipia University</option>
			<option value="East African University">East African University</option>
			<option value="Others">Others</option>



			</select>
		</p>
		<p>
			<label class="w3-label w3-validate">Registration No.</label>
			<input type="text" class="w3-input w3-light-grey" maxlength="15" minlength="12" name="regno" required="" >
		</p>

		<script> function checkDate() {
          var selectedText = document.getElementById('dateEnd').value;
          var selectedDate = new Date(selectedText);
          var selectedT = document.getElementById('dateStart').value;
          var selectedD = new Date(selectedT);
          var startYr=selectedD.getFullYear();
          var endTr=selectedDate.getFullYear();
          var startMm=selectedD.getMonth();
          var endMm=selectedDate.getMonth();
          var diff = endMm - startMm;
            if (diff < 2) {
            	alert("Date must be atleast 2 months from starting date");
            }
            } 
        </script>


		<p>
			<label class="w3-label w3-validate">Starting from</label>
			<input type="date" class="w3-input w3-light-grey"  name="start" id="dateStart" onchange="checkDate()" required="">
		</p>
 
		<p>
			<label class="w3-label w3-validate">To</label>
			<input type="date" class="w3-input w3-light-grey"  name="end" id="dateEnd" onchange="checkDate()" required="">
		</p>
		<p>
			Gender:
			  <input type="radio" class="w3-margin-16" name="gender" required="" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
			  <input type="radio" class="w3-margin-16" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
		
		</p>
		<p>
			<label class="w3-label w3-validate">Password</label>
			<input type="password" class="w3-input w3-light-grey" name="password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 to 10 characters" required="">
		</p>
		
		<div class="input-group">
			<button class="w3-btn w3-green" type="submit" class="btn" name="reg_user">Signup</button>
		</div>
		<p><b>Already registered? <a href="index.php" style="text-decoration: none;" class="w3-text-blue">Sign in</a></b></p>
	</form>

</body>
</html>
