<?php 

session_start();

require("../db.php");

if(!isset($_SESSION["username"])) {
  header("location:../../index.php");
  # code...
}
$username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../w3css/2.0/w3.css">
       
<title>Administrator-InternshipSystem</title>
</head>
<body class="w3-green">

<nav class="w3-sidenav w3-light-green w3-card-2" style="display:none">
  <a href="javascript:void(0)" 
  onclick="w3_close()"
  class="w3-closenav w3-xlarge w3-hover-white">Close &times;</a>
  <img class="w3-margin-32" src="../images/admin_icon.jpg" alt="Administrator" style="width:50%"></br></br>

  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge" href="admin_page.php?v=intern">Intern</a>
  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge" href="admin_page.php?v=host">Host</a>
  <a class="w3-hover-white w3-center w3-padding-8 w3-xxlarge" href="admin_page.php?v=school">School</a>
 

    
</nav>

<div id="main">

<header class="w3-container w3-light-green">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()">&#9776;</span>
  <h1>Administrator Panel<a href="logout.php" style="float: right;text-decoration: none;font-size:24px">Logout</a></h1>




</header>


<div class="w3-container">


<?php

  if(@$_GET['v'] == "intern"){

    echo '<h2 class="w3-text-black"><b>Interns Management</b><a href="admin_page.php?v=newintern" style="float:right;margin-bottom:5px"class="w3-btn w3-green w3-text-black"><b>NEW</b></a></h2>';


    echo '<table class =" w3-table w3-bordered w3-card-4 w3-white w3-hover-light-green">
    <thead>
    <tr class="w3-green">

      <th>No.</th>
      <th>Username</th>
      <th>Email</th>
      <th>School</th>
      <th>Registration</th>
      <th>Ending</th>
      <th>Gender</th>
      <th>Remove</th>
      <th>Modify</th>

    </tr>
    </thead>';

    $c=0;
    $query=mysqli_query($con,"SELECT * FROM intern");
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
         <td align="center"><?php echo $row["hadi"] ?></td>
         <td align="center"><?php echo $row["gender"] ?></td>
         <td align="center"><a href="admin_page.php?v=rmv_intern&id=<?php echo $row["id"] ?>" onclick="return confirm('You are about to remove intern permanently!')" class="w3-btn w3-red">Remove</a></td>
         <td align="center"><a href="admin_page.php?v=mdf_intern&id=<?php echo $row["id"] ?>" class="w3-btn w3-teal">Modify</a></td>

         </tr>
         <?php }
          
       }
       else{
       echo "<script>alert('Interns details are unavailable at the moment');</script>";

         # code...
       }
    echo'
  
    </table>';
  
  }
  ?>

  <?php



  if(@$_GET['v'] == "host"){

    echo '<h2 class="w3-text-black"><b>Host Supervisor Details</b><a href="admin_page.php?v=newhost" style="float:right;margin-bottom:5px"class="w3-btn w3-green w3-text-black"><b>NEW</b></a></h2>';


    echo '<table class =" w3-table w3-bordered w3-card-4 w3-white w3-hover-light-green">
    <thead>
    <tr class="w3-green">

      <th>No.</th>
      <th>Username</th>
      <th>Email</th>
      <th>Department</th>

    </tr>
    </thead>';

    $c=0;
    $query=mysqli_query($con,"SELECT * FROM host");
    if(mysqli_num_rows($query)>0){  
      while($row = mysqli_fetch_assoc($query)) {
        $id=$row['id'];
        $c++;
        ?>
        <tr>
         <td align="center"><?php echo $c ?></td>
         <td align="center"><?php echo $row["username"] ?></td>
         <td align="center"><?php echo $row["email"] ?></td>
         <td align="center"><?php echo $row["department"] ?></td>
    

         </tr>
         <?php }
          
       }
       else{
       echo "<script>alert('Host details are unavailable at the moment');</script>";

         # code...
       }
    echo'
  
    </table>';

  
  }


  ?>


<?php

  if(@$_GET['v'] == "school"){

    echo '<h2 class="w3-text-black"><b>School Supervisor Management</b><a href="admin_page.php?v=newschool" style="float:right;margin-bottom:5px"class="w3-btn w3-green w3-text-black"><b>NEW</b></a></h2>';


    echo '<table class =" w3-table w3-bordered w3-card-4 w3-white w3-hover-light-green">
    <thead>
    <tr class="w3-green">

      <th>No.</th>
      <th>Username</th>
      <th>Email</th>
      <th>School</th>
      <th>Gender</th>
      <th>Remove</th>

    </tr>
    </thead>';

    $c=0;
    $query=mysqli_query($con,"SELECT * FROM school");
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
         <td align="center"><?php echo $row["gender"] ?></td>
         <td align="center"><a href="admin_page.php?v=rmv_school&id=<?php echo $row["id"] ?>" onclick="return confirm('You are about to remove school supervisor!')" class="w3-btn w3-red">Remove</a></td>
        
         </tr>
         <?php }
          
       }
       else{
       echo "<script>alert('School Supervisor details are unavailable at the moment');</script>";

         # code...
       }
    echo'
  
    </table>';
  
  }
  ?>

  <?php

  if(@$_GET['v'] == 'rmv_intern'){

    $id = $_GET['id'];

    $query = mysqli_query($con,"DELETE from intern WHERE id='$id'");

    header("refresh:0,url=admin_page.php?v=intern");
  }

  ?>


  <?php

  if(@$_GET['v'] == 'rmv_school'){

    $id = $_GET['id'];

    $query = mysqli_query($con,"DELETE from school WHERE id='$id'");

    header("refresh:0,url=admin_page.php?v=school");
  }

  ?>

  <?php

  if(@$_GET['v'] == 'newintern'){

   echo "<h3><b>New Intern</b></h3>";


    echo '<form class="w3-container  w3-light-green w3-opacity w3-padding-16"" style="width:100%;height:400px;overflow-y:auto;margin-top:0;border-radius:0" method="POST" action="update.php?u=intern">
    <p>
      <label class="w3-label w3-text-black w3-validate"><b>Username</b></label>
      <input type="text" class="w3-input w3-light-grey" maxlength="10" name="username" required="" >
    </p>

    <p>
      <label class="w3-label w3-validate w3-text-black"><b>Registration No.</b></label>
      <input type="text" class="w3-input w3-light-grey" maxlength="15" minlength="12" name="regno" required="" >
    </p>

    <P>
      <label class="w3-label w3-validate w3-text-black"><b>Email</b></label>
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

    <script> function checkDate() {
          var selectedText = document.getElementById("dateEnd").value;
          var selectedDate = new Date(selectedText);
          var selectedT = document.getElementById("dateStart").value;
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
      <label class="w3-label w3-validate w3-text-black"><b>Starting from</b></label>
      <input type="date" class="w3-input w3-light-grey"  name="start" id="dateStart" onchange="checkDate()" required="">
    </p>

    <p>
      <label class="w3-label w3-validate w3-text-black"><b>Ending Date</b></label>
      <input type="date" class="w3-input w3-light-grey"  name="end" id="dateEnd" onchange="checkDate()" required="">
    </p>


     <p>
      Gender:
        <input type="radio" class="w3-margin-16" name="gender" value="female" required="" <?php if (isset($gender) && $gender=="female") echo "checked";?>Female
        <input type="radio" class="w3-margin-16" name="gender" value="male" required="" <?php if (isset($gender) && $gender=="male") echo "checked";?>Male
    
    </p>


      
    <p style=margin:10px;><button class="w3-black" name="internsubmit">Submit</button></p>



    </form>';
  }

  ?>

  <?php

  if(@$_GET['v'] == 'newhost'){

   echo "<h3><b>New Host Supervisor</b></h3>";


    echo '<form class="w3-container  w3-light-green w3-opacity w3-padding-16"" style="width:100%;height:400px;overflow-y:auto;margin-top:0;border-radius:0" method="POST" action="update.php?u=host">
    <p>
      <label class="w3-label w3-text-black w3-validate"><b>Username</b></label>
      <input type="text" class="w3-input w3-light-grey" maxlength="10" name="username" required="" >
    </p>

    <P>
      <label class="w3-label w3-validate w3-text-black"><b>Email</b></label>
      <input type="email" class="w3-input w3-light-grey" name="email" value="" required="">
    </p>

      <p>
      <select class="w3-select w3-light-grey w3-validate" name="department" required="">
      <option value="" disabled selected>Organistaion Department</option>
      <option value="ICT">ICT</option>
      <option value="Agriculture">Agriculture</option>
      <option value="Library">Library</option>
      <option value="Electical">Electical</option>
      </select>
    </p>


      
    <p style=margin:10px;><button class="w3-black" name="hostsubmit">Submit</button></p>



    </form>';
  }

  ?>

  <?php

  if(@$_GET['v'] == 'mdf_intern'){

   echo "<h3 class='w3-center'><b>Intern's Modification</b></h3>";

    $id = $_GET['id'];


    $query = mysqli_query($con,"SELECT * from intern where id='".$id."'"); 
    while($row = mysqli_fetch_assoc($query)){
    $username=$row['username'];
    $email=$row['email'];
    $school=$row['school'];
    $regno=$row['regno'];
    $start=$row['start'];
    $end=$row['hadi'];
    $gender=$row['gender'];




    echo '<form class="w3-container w3-center w3-opacity w3-padding-16"" style="width:100%;height:400px;overflow-y:auto;margin-top:0;border-radius:0" method="POST" action="update.php?u=mdfintern">

    <p><label class="w3-label w3-validate w3-text-black"><b>Username: <strong style=color:white;>'.$username.'</strong></b></label>
      <input type="hidden" class="w3-input w3-light-grey" name="username" required value="'.$username.'"></p>

    <p><label class="w3-label w3-validate w3-text-black"><b>Email Address: <strong style=color:white;>'.$email.'</strong></b></label>
    <input type="hidden" class="w3-input w3-light-grey" name="email" required value="'.$email.'"></p>

    <p><label class="w3-label w3-validate w3-text-black"><b>School Name</b></label></br>

      <select class="w3-select w3-center w3-light-grey w3-validate" style="width:30%;"  name="univercollege">
      <option value="'.$school.'">'.$school.'</option>
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

    <p><label class="w3-label w3-validate w3-text-black"><b>Starting Date: <strong style=color:white;>'.$start.'</strong></b></label>
    <input type="hidden" class="w3-input w3-light-grey" name="start" required value="'.$start.'"></p>



    <script> function checkDate() {
          var selectedText = document.getElementById("dateEnd").value;
          var selectedDate = new Date(selectedText);
          var selectedT = document.getElementById("dateStart").value;
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

    <p class="w3-center"><label class="w3-label w3-validate w3-text-black"><b>Ending Date</b></label>
      <input type="date" class="w3-input w3-light-grey" style="width:30%;margin-left:35%"  name="end" id="dateEnd" onchange="checkDate()" required value="'.$end.'"></p>

      
    <p style=margin:10px;><button class="w3-black" name="internmdf">Submit</button></p>



    </form>';
  }
  }

  ?>

  <?php


  if(@$_GET['v'] == 'newschool'){

   echo "<h3><b>New School Supervisor</b></h3>";


    echo '<form class="w3-container  w3-light-green w3-opacity w3-padding-16"" style="width:100%;height:400px;overflow-y:auto;margin-top:0;border-radius:0" method="POST" action="update.php?u=school">
    <p>
      <label class="w3-label w3-text-black w3-validate"><b>Username</b></label>
      <input type="text" class="w3-input w3-light-grey" maxlength="10" name="username" required="" >
    </p>
    <P>
      <label class="w3-label w3-validate w3-text-black"><b>Email</b></label>
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
      Gender:
        <input type="radio" class="w3-margin-16" name="gender" value="female" required="" <?php if (isset($gender) && $gender=="female") echo "checked";?>Female
        <input type="radio" class="w3-margin-16" name="gender" value="male" required="" <?php if (isset($gender) && $gender=="male") echo "checked";?>Male
    
    </p>

      
    <p style=margin:10px;><button class="w3-black" name="schoolsubmit">Submit</button></p>



    </form>';
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

