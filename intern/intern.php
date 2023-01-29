<?php

session_start();

require("../db.php");


if(!isset($_SESSION["username"])) {
  header("location:../index.php");
  # code...
}
 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../w3css/2.0/w3.css">
       
<title>Intern-InternshipSystem</title>
</head>
<body class="w3-cyan">

<nav class="w3-sidenav w3-light-blue w3-card-1" style="display:none;">
  <a href="javascript:void(0)" 
  onclick="w3_close()"
  class="w3-closenav w3-xlarge w3-hover-white">Close &times;</a>
  <img class="w3-margin-32" src="../images/admin_icon.jpg" alt="Administrator" style="width:50%"></br></br>

  <a class="w3-hover-white w3-padding-8 w3-center w3-xxlarge" href="intern.php">Home</a>
  <a class="w3-hover-white w3-padding-8 w3-center w3-xxlarge" href="intern_page.php?v=1">Task</a>
  <a class="w3-hover-white w3-padding-8 w3-center w3-xxlarge" href="intern_page.php?v=2">Report</a>
 

    
</nav>

<div id="main">

<header class="w3-container w3-cyan">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()">&#9776;</span>
  <h1>Intern Panel<a href="logout.php" style="float: right;text-decoration: none;font-size:24px">Logout</a></h1>

  

  <div><img src="../images/h.jpg" alt="Intern Panel" class="w3-image"></div>


</header>


<div class="w3-container">


 
  
</div>

<footer class="w3-margin-bottom w3-container" >
  <h5>Internship Management System(IMS)</h5>
  <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
</footer>

</div>
      
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementsByClassName("w3-sidenav")[0].style.width = "25%";
  document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
  document.getElementsByClassName("w3-opennav")[0].style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
  document.getElementsByClassName("w3-opennav")[0].style.display = "inline-block";
}
</script>



</body>
</html>  

