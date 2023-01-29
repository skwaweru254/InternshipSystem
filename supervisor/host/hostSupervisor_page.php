<?php 
session_start();

require("../../db.php");

if(!isset($_SESSION["username"])) {
  header("location:../../index.php");
  # code...
}
?>
<!DOCTYPE html>
<html>
<head>
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

  <img src="../images/h.jpg" alt="" style="width:100%">

</header>


<div class="w3-container">

<?php

if(@$_GET['v'] == 1){


    echo '<h2 class="w3-text-black"><b>Interns Reviews</b></h2>';


    echo '<table class =" w3-table w3-striped w3-bordered w3-card-4 w3-cyan">
    <thead>
    <tr class="w3-white">

      <th>No.</th>
      <th>Username</th>
      <th>Email</th>
      <th>School</th>
      <th>Registration</th>
      <th>Duties</th>

    </tr>
    </thead>';

    $c=0;
    $query=mysqli_query($con,"SELECT * FROM intern WHERE assign=0 ORDER BY trn_date ASC ");
    if(mysqli_num_rows($query)>0){  
      while($row = mysqli_fetch_assoc($query)) {
        $id=$row['id'];
        $c++;
        ?>
        <tr>
         <td align="center"><?php echo $c ?></td>
         <td align="center"><?php echo $row["username"] ?></td>
         <td align="center"><?php echo $row["email"] ?></td>
         <td align="center"><?php echo $row["school"] ?></td>
         <td align="center"><?php echo $row["regno"] ?></td>
         <td align="center"><a href="hostSupervisor_page.php?v=assign&id=<?php echo $row["id"] ?>" class="w3-btn w3-yellow">Assign</a></td>

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
<?php

if(@$_GET['v']=='assign'){


  $id = $_GET['id'];


  $query = mysqli_query($con,"SELECT * from intern where id='".$id."'"); 
  while($row = mysqli_fetch_assoc($query)){
  $username=$row['username'];
  $email=$row['email'];
  $school=$row['school'];
  $regno=$row['regno'];

 
  echo'<form class="w3-container w3-teal w3-padding-16" style="width: 40%;margin:32px auto;opacity: 0.8;"  method="post" action="assign.php">
   <div>
      <h2 class=" w3-container w3-text-black w3-center w3-margin-0"><b>Assign Intern a Task</b></h2>
    </div>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Username: <strong style=color:white;>'.$username.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="username" required value="'.$username.'"></center>
    </p>

    <p>
      <input type="hidden" class="w3-input w3-light-grey" name="school" required value="'.$school.'">
    </p>

    <p>
      <input type="hidden" class="w3-input w3-light-grey" name="regno" required value="'.$regno.'">
    </p>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Email: <strong style=color:white;> '.$email.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="email" required value="'.$email.'" ></center>
    </p>

    <p>
      <label class="w3-label w3-validate w3-text-black"><b>Task</b></label>
      <input type="text" class="w3-input w3-light-grey" name="task" required ="" placeholder="Assign a Task to Intern" >
    </p>

    <script> function checkDate() {
          var selectedText = document.getElementById("datepicker").value;
          var selectedDate = new Date(selectedText);
          var d=2;
          var CurrentDate = new Date();
          CurrentDate.setDate(CurrentDate.getDate() + d);
          
            if (selectedDate < CurrentDate) {
              alert("Date must be atleast 2 days from now");
            }
            } 
        </script>

    <p>
      <label class="w3-label w3-validate w3-text-black"><b>Submission Date</b></label>
      <input type="date" class="w3-input w3-light-grey" name="sub_date" id="datepicker" onchange="checkDate()" required ="">
    </p>

    <p class="input-group">
        <button class="w3-btn w3-black w3-text-white" type="" name="assign">Submit</button> 
      </p>
  </div>

</form>';
  
}
}
?>


<?php

if(@$_GET['v'] == 2){


    echo '<h2 class="w3-text-black"><b>Task Remarks</b></h2>';


    echo '<table class =" w3-table w3-striped w3-bordered w3-card-4 w3-light-blue">
    <thead>
    <tr class="w3-aqua">

      <th>Email</th>
      <th>School</th>
      <th>Task</th>
      <th>Report</th>
      <th>View</th>
      <th>Remarks</th>

    </tr>
    </thead>';

    $query=mysqli_query($con,"SELECT * FROM task WHERE report !='No report yet' AND remark='No remarks given' ORDER BY id DESC");
    if(mysqli_num_rows($query)>0){  
      while($row = mysqli_fetch_assoc($query)) {

        
        ?>
        <tr>
         <td align="center"><?php echo $row["email"] ?></td>
         <td align="center"><?php echo $row["school"] ?></td>
         <td align="center"><?php echo $row["task"] ?></td>
         <td align="center"><?php echo $row["report"] ?></td>
         <td align="center"><a href="../../intern/<?php echo $row['report'] ?>" class="w3-btn w3-amber">Open File</a></td>
         <td align="center"><a href="hostSupervisor_page.php?v=remark&id=<?php echo $row["id"] ?>" class="w3-btn w3-purple">Remarks</a></td>  


         </tr>
         <?php }
          
       }
       else{
               echo "<script>alert('No reports submitted that need to be recommended');</script>";

       }
      
    echo'
  
    </table>';
}

?>


<?php

if(@$_GET['v']=='remark'){


  $id = $_GET['id'];


  $query = mysqli_query($con,"SELECT * from task where id='".$id."'"); 
  while($row = mysqli_fetch_assoc($query)){
  $task=$row['task'];
  $email=$row['email'];
  $school=$row['school'];
  $regno=$row['regno'];
  $report=$row['report'];


 
  echo'<form class="w3-container w3-teal w3-padding-16" style="width: 40%;margin:32px auto;opacity: 0.8;"  method="post" action="remark.php">
   <div>
      <h2 class=" w3-container w3-text-black w3-center w3-margin-0"><b>Recommendation</b></h2>
    </div>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Registration: <strong style="color:white;"class="w3-amber"> '.$regno.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="regno" required value="'.$regno.'" ></center>
    </p>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Email: <strong style="color:white;"class="w3-amber"> '.$email.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="email" required value="'.$email.'" ></center>
    </p>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>School: <strong style="color:white;"class="w3-amber"> '.$school.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="school" required value="'.$school.'" ></center>
    </p>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Task: <strong style="color:white;"class="w3-amber"> '.$task.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="task" required value="'.$task.'" ></center>
    </p>

    <p><center>
      <label class="w3-label w3-validate w3-text-black"><b>Report: <strong style="color:white;"class="w3-amber"> '.$report.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="report" required value="'.$report.'" ></center>
    </p>

    <p>
      <label class="w3-label w3-validate w3-text-black"><b>Remarks</b></label>
      <input type="text" class="w3-input w3-light-grey" name="remark" maxlength="50" required ="" placeholder="Recommendation is Required" >
    </p>

    <p class="input-group">
        <button class="w3-btn w3-black w3-text-white" type="text" name="submit">Submit</button> 
      </p>
  </div>

</form>';
  
}
}
?>


<?php

if(@$_GET['v'] == 3){


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

    $query=mysqli_query($con,"SELECT * FROM task ORDER BY id DESC");
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

