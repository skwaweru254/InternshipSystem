<?php
/*
Written by Simon Waweru.
Language used Php and Html
*/

session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../index.php"); // Redirecting To index Page
}
?>