<?php 
session_start();

require("../../db.php");

if(!isset($_SESSION["username"])) {
  header("location:../../index.php");
  # code...
}
$school=$_SESSION["school"];

//print_r($_SESSION['school']);
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  body{
    background-image: url("");
  }
</style>
<link rel="stylesheet" type="text/css" href="../../w3css/2.0/w3.css">
       
<title>School-InternshipSystem</title>
</head>
<body class="w3-cyan">

<nav class="w3-sidenav w3-teal w3-card-2" style="display:none">
  <a href="javascript:void(0)" 
  onclick="w3_close()"
  class="w3-closenav w3-hover-cyan w3-xlarge">Close &times;</a>
  <img class="w3-margin-32" src="../../images/host_icon.png" alt="host" style="width:50%"></br></br>

  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge" href="schoolSupervisor_page.php?v=1">Reviews</a>
  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge"href="schoolSupervisor_page.php?v=2">Reports</a>
 

    
</nav>

<div id="main">

<header class="w3-container w3-teal">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()">&#9776;</span>
  <h1>School Supervisor Panel<a href="../logout.php" style="float: right;text-decoration: none;font-size:24px">Logout</a></h1>

    <img src="../../images/h.jpg" alt="Host Supervisor Panel" class="w3-image">



</header>


<div class="w3-container">

 
  
</div>

<!--<footer class="w3-container w3-teal" style="margin-bottom: 0px;" >
  <h5>Internship Management System(IMS)</h5>
  <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
</footer>
-->

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

