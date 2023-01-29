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
  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge" href="schoolSupervisor_page.php?v=2">Reports</a>
 

    
</nav>

<div id="main">

<header class="w3-container w3-teal">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()">&#9776;</span>
  <h1>School Supervisor Panel<a href="../logout.php" style="float: right;text-decoration: none;font-size:24px">Logout</a></h1>


</header>


<div class="w3-container">

<input type="button" style="cursor:pointer; font-weight: bold; background-color: orange;margin-top: 2em;" OnClick="CallPrint(this.value)"  value="Print Reports"/>



<?php

if(@$_GET['v'] == 1){


    echo '<h2 class="w3-text-black"><b>Interns Reviews</b></h2>';


    echo '<table class =" w3-table w3-striped w3-bordered w3-card-4 w3-cyan">
    <thead>
    <tr class="w3-white">

      <th>No.</th>
      <th>Registration</th>
      <th>username</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Starting</th>
      <th>Ending</th>

    </tr>
    </thead>';

    $c=0;
    $query=mysqli_query($con,"SELECT * FROM intern WHERE school= '$school'");
    if(mysqli_num_rows($query)>0){  
      while($row = mysqli_fetch_assoc($query)) {
        $id=$row['id'];
        $c++;
        ?>
        <tr>
         <td align="center"><?php echo $c ?></td>
         <td align="center"><?php echo $row["regno"] ?></td>
         <td align="center"><?php echo $row["username"] ?></td>
         <td align="center"><?php echo $row["email"] ?></td>
         <td align="center"><?php echo $row["gender"] ?></td>
         <td align="center"><?php echo $row["start"] ?></td>
         <td align="center"><?php echo $row["hadi"] ?></td>


         </tr>
         <?php }
          
       }
       else{
       echo "<script>alert('Reviews are unavailable at the moment');</script>";

         # code...
       }
    echo'
  
    </table>';
}

?>

<div id="reports">
<?php

if(@$_GET['v'] == 2){

echo '<h2 class="w3-text-black"><b>Final Reports</b></h2>';


    echo '<table class =" w3-table w3-striped w3-bordered w3-card-4 w3-aqua">
    <thead>
    <tr class="w3-pale-blue">

      <th>Email</th>
      <th>School</th>
      <th>Task</th>
      <th>Report</th>
      <th>Submission</th>
      <th>Recommendation</th>


    </tr>
    </thead>';

    $query=mysqli_query($con,"SELECT * FROM task WHERE school= '$school' ORDER BY id DESC");
    if(mysqli_num_rows($query)>0){  
      while($row = mysqli_fetch_assoc($query)) {
        
        ?>
        <tr>
         <td align="center"><?php echo $row["email"] ?></td>
         <td align="center"><?php echo $row["school"] ?></td>
         <td align="center"><?php echo $row["task"] ?></td>
         <td align="center"><?php echo $row["report"] ?></td>
         <td align="center"><?php echo $row["sub_date"] ?></td>
         <td align="center"><?php echo $row["remark"] ?></td>

         

         </tr>
         <?php }
          
       }
       else{
       echo "<script>alert('No task reports at the moment');</script>";

         # code...
       }
    echo'
  
    </table>';
}

?>
</div>
 
  
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


<!-- Print reports-->
<script>
$(function($) { });
function CallPrint(strid) {
var prtContent = document.getElementById("reports");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>


</body>
</html>  

