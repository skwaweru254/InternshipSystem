<?php
require("../../db.php");


if(isset($_POST['assign']))
{


$regno = mysqli_real_escape_string($con, $_POST['regno']);
$school = mysqli_real_escape_string($con, $_POST['school']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$task = mysqli_real_escape_string($con, $_POST['task']);
$sub_date = mysqli_real_escape_string($con, $_POST['sub_date']);
$report = "No report yet";
$remark ="No remarks given";


$query = mysqli_query($con,"INSERT INTO `task` (`id`, `email`,`school`,`regno`,`task`,`sub_date`,`report`,`remark`) VALUES (NULL, '$email','$school','$regno','$task','$sub_date','$report','$remark');");

$update = mysqli_query($con,"UPDATE intern SET assign=0 WHERE email !='$email'");

$update_sql = mysqli_query($con,"UPDATE intern SET assign=1,trn_date=CURRENT_TIMESTAMP  WHERE email ='$email'");



echo "<center><script>alert('Task Assigned Successfully');</script></center>";  
header("refresh:0;url=hostSupervisor_page.php?v=3");


}
else{

header("refresh:0;url=hostSupervisor_page.php?v=1");
echo "<center><script>alert('WARNING! Error occured.');</script></center>";

}


    
?>

