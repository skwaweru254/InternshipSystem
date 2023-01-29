<?php
require("../../db.php");

if(isset($_POST['submit']))
{

$regno = mysqli_real_escape_string($con, $_POST['regno']);
$report = mysqli_real_escape_string($con, $_POST['report']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$task = mysqli_real_escape_string($con, $_POST['task']);
$remark = mysqli_real_escape_string($con, $_POST['remark']);

$query ="UPDATE task SET remark='$remark' WHERE email='$email' AND regno ='$regno'AND task='$task'";

mysqli_query($con,$query);


echo "<center><script>alert('Recommendation Posted Successfully');</script></center>";  
header("refresh:0;url=hostSupervisor_page.php?v=3");


}
else{

header("refresh:0;url=hostSupervisor_page.php?v=2");
echo "<center><script>alert('WARNING! Error occured.');</script></center>";

}


    
?>

