<?php
session_start(); //start session
session_unset(); //unset session
session_destroy(); //destroy session
header("Location: login.php"); //redirect to login.php
exit(); 
?>