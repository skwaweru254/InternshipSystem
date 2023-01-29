<?php
require("../../db.php");

$id = $_GET['id'];

$query = mysqli_query($con,"SELECT * FROM `requests` WHERE id='$id'");

if(mysqli_num_rows($query)>0){  

$row = mysqli_fetch_assoc($query);
$username = $row['username'];
$email = $row['email'];
$school = $row['school'];
$regno = $row['regno'];
$starting = $row['start'];
$ending = $row['end'];
$gender = $row['gender'];
$password = $row['password'];
$trn_date = $row['trn_date'];

$query = mysqli_query($con,"INSERT INTO `intern` (`id`, `username`, `email`,`school`,`regno`, `password`,`start`,`hadi`,`gender`,`trn_date`) VALUES (NULL, '$username', '$email','$school','$regno', '$password','$starting','$ending','$gender','$trn_date');");


$query = mysqli_query($con,"DELETE FROM `requests` WHERE id = '$id'");

echo "<center><script>alert('Account has been accepted!');</script></center>";  
header("refresh:0;url=hostSupervisor_page.php?v=1");


}
else{

echo "<center><script>alert('WARNING! Error occured.');</script></center>";

}


    
?>

