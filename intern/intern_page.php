<?php

session_start();

require("../db.php");


if(!isset($_SESSION["username"])) {
  header("location:../index.php");
  # code...
}
$regno=$_SESSION["regno"];
$email=$_SESSION["email"];

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

  <a class="w3-hover-white w3-padding-8 w3-center w3-xxlarge" href="intern_page.php?v=0">Overview</a>
  <a class="w3-hover-white w3-padding-8 w3-center w3-xxlarge" href="intern_page.php?v=1">Task</a>
  <a class="w3-hover-white w3-padding-8 w3-center w3-xxlarge" href="intern_page.php?v=2">Report</a>

 

    
</nav>

<div id="main">

<header class="w3-container w3-light-blue">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()">&#9776;</span>
  <h1>Intern Panel<a href="logout.php" style="float: right;text-decoration: none;font-size:24px">Logout</a></h1>

</header>


<div class="w3-container">

<?php

if(@$_GET['v'] == 0){


    echo '<h2 class="w3-text-black"><b>Personal Overview</b></h2>';


    echo '<table class =" w3-table w3-bordered w3-card-4 w3-light-blue">
    <thead>
    <tr class="w3-pale-blue">

      <th>List</th>
      <th>Task</th>
      <th>Report</th>
      <th>Submission</th>


    </tr>
    </thead>';
    $c=0;
    $query=mysqli_query($con,"SELECT * FROM task where email='$email' ORDER BY id DESC");
    if(mysqli_num_rows($query)>0){  
      while($row = mysqli_fetch_assoc($query)) {
        $c++
        ?>
        <tr>
         <td align="center"><?php echo $c ?></td>
         <td align="center"><?php echo $row["task"] ?></td>
         <td align="center"><?php echo $row["report"] ?></td>
         <td align="center"><?php echo $row["sub_date"] ?></td>

         

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

<?php

if(@$_GET['v'] == 'report'){


    echo '<h2 class="w3-text-black"><b>Intern Task Reports</b></h2>';


    echo '<table class =" w3-table w3-striped w3-bordered w3-card-4 w3-aqua">
    <thead>
    <tr class="w3-pale-blue">

      <th>Email</th>
      <th>School</th>
      <th>Task</th>
      <th>Report</th>
      <th>Submission</th>
      <th>View</th>


    </tr>
    </thead>';

    $query=mysqli_query($con,"SELECT * FROM task WHERE regno='$regno' AND email ='$email' ORDER BY id DESC");
    if(mysqli_num_rows($query)>0){  
      while($row = mysqli_fetch_assoc($query)) {
        
        ?>
        <tr>
         <td align="center"><?php echo $row["email"] ?></td>
         <td align="center"><?php echo $row["school"] ?></td>
         <td align="center"><?php echo $row["task"] ?></td>
         <td align="center"><?php echo $row["report"] ?></td>
         <td align="center"><?php echo $row["sub_date"] ?></td>
         <td align="center"><a href="#" class="w3-btn w3-amber">Open File</a></td>

         </tr>
         <?php }
          
       }
  
    echo'
  
    </table>';
}
?>


<?php

if(@$_GET['v']==1){

  $query = mysqli_query($con,"SELECT * from task where regno='$regno' AND email ='$email' and report='No report yet'");
  if(mysqli_num_rows($query)>0){  
  while($row = mysqli_fetch_assoc($query)){
  $email=$row['email'];
  $school=$row['school'];
  $regno=$row['regno'];
  $task=$row['task'];
  $sub_date=$row['sub_date'];



  echo'<form class="w3-container w3-light-blue w3-padding-32" style="width: 50%;margin:64px auto;opacity: 0.8;"  method="post" action="">
   <div>
      <h2 class=" w3-container w3-text-black w3-black w3-center w3-margin-0"><b>Task Assigned By Your Supervisor</b></h2>
    </div>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Reg No.: <strong class="w3-amber w3-margin-16">'.$regno.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$regno.'"></center>
    </p>

     <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Your School: <strong class="w3-amber w3-margin-16">'.$school.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$school.'"></center>
    </p>   

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Email: <strong class="w3-amber w3-margin-16"> '.$email.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$email.'" ></center>
    </p>

     <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Your Task: <strong class="w3-amber w3-margin-16"> '.$task.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$email.'" ></center>
    </p>

     <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Submission Day: <strong class="w3-amber w3-margin-16"> '.$sub_date.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$sub_date.'" ></center>
    </p>


 
  </div>

</form>';}
  
}else{
         echo "<script>alert('You are not assigned task at the moment');</script>";
        header( "refresh:0;url=intern.php"); 


}
}

?>

<?php

if(@$_GET['v']==2){

  $query = mysqli_query($con,"SELECT * from task where regno='$regno' AND email ='$email' and report='No report yet'");
  if(mysqli_num_rows($query)>0){  
  while($row = mysqli_fetch_assoc($query)){
  $email=$row['email'];
  $school=$row['school'];
  $regno=$row['regno'];
  $task=$row['task'];
  $sub_date=$row['sub_date'];
  $task=$row['task'];
  $report=$row['report'];

 



  echo'<form class="w3-container w3-light-blue w3-padding-32" style="width: 50%;margin:64px auto;opacity: 0.8;"  method="post" action="upload.php" enctype="multipart/form-data">
   <div>
      <h2 class=" w3-container w3-text-black w3-black w3-center w3-margin-0"><b>Task Report</b></h2>
    </div>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Reg No.: <strong class="w3-amber w3-margin-16">'.$regno.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$regno.'"></center>
    </p>  

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Email: <strong class="w3-amber w3-margin-16"> '.$email.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$email.'" ></center>
    </p>

     <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Task Performed: <strong class="w3-amber w3-margin-16"> '.$task.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$task.'" ></center>
    </p>

     <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Submission Date: <strong class="w3-amber w3-margin-16"> '.$sub_date.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="" required value="'.$sub_date.'" ></center>
    </p>

     <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Upload File</b></label>
      <input class="w3-blue w3-padding-4 w3-margin-8" type="file" class="w3-input w3-light-grey" name="fileToUpload" id="fileToUpload" required value="'.$report.'" ></center>
    </p>
     <p>
      <button class="w3-btn w3-black w3-text-white" name="submit">Submit</button> 
      </p


 
  </div>

</form>';}
  
}else{
         echo "<script>alert('You are not assigned task at the moment');</script>";
        header( "refresh:0;url=intern.php"); 


}
}

?>


 
  
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

