<?php 
session_start();

require("../../db.php");

if(!isset($_SESSION["username"])) {
  header("location:../../index.php");
  # code...
}
//print_r($_SESSION['email']);
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
       
<title>Host-InternshipSystem</title>
</head>
<body class="w3-cyan">

<nav class="w3-sidenav w3-teal w3-card-2" style="display:none">
  <a href="javascript:void(0)" 
  onclick="w3_close()"
  class="w3-closenav w3-hover-teal w3-xlarge">Close &times;</a>
  <img class="w3-margin-32" src="../../images/host_icon.png" alt="host" style="width:50%"></br></br>

  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge" href="hostSupervisor_page.php?v=1">Reviews</a>
  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge" href="hostSupervisor_page.php?v=2">Remarks</a>
  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge" href="hostSupervisor_page.php?v=3">Reports</a>
 

    
</nav>

<div id="main">

<header class="w3-container w3-teal">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()">&#9776;</span>
  <h1>Host Supervisor Panel<a href="../logout.php" style="float: right;text-decoration: none;font-size:24px">Logout</a></h1>


</header>


<div class="w3-container">

<section class="w3-margin-16 w3-padding-32 w3-text-white">
    <div>

    
    <?php
        
    $query=mysqli_query($con,"SELECT * FROM requests");
    if(mysqli_num_rows($query)>0){  
      while($row = mysqli_fetch_assoc($query)) {
                    ?>
            
      <h1 class="w3-margin-16 w3-center"><?php echo $row['email'] ?></h1>
        <p class="w3-margin-16 w3-center"><?php echo $row['message'] ?></p>      

        <p class="w3-margin-16 w3-center"><small><i><?php echo $row['trn_date'] ?></i></small></p>

        <p class="w3-center">
          <a class="w3-btn w3-green" href="accept.php?id=<?php echo $row['id'] ?>" style="margin-right: 5em">Accept</a>
          <a class="w3-btn w3-red" href="reject.php?id=<?php echo $row['id'] ?>">Reject</a>
        </p>
        <?php
                }
            }else{
                echo "<script>alert('No Account Pending Requests')</script>";


                echo '<center>No Account Pending Requests</center>';

            }
        ?>
      
    </div>
          
</section> 


 
  
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

