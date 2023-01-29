<?php
/*
Written by Simon Waweru.
Language used Php and Html
*/

$con = mysqli_connect("localhost","","","imsdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>