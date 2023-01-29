<?php
require("../../db.php");

$id = $_GET['id'];

$query = mysqli_query($con,"DELETE FROM `requests` WHERE id = '$id'");

echo "<center><script>alert('Account has been rejected!');</script></center>";  
header("refresh:0;url=hostSupervisor.php");

    
?>

