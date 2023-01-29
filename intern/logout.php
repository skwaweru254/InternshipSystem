<?php
/*
Written by Simon Waweru.
Language used Php and Html
*/

session_start();
//Destroy session

unset($_session["id"]);
unset($_session["username"]);
header("Location: ../index.php"); // Redirecting To index Page
session_destroy();
?>