<?php 
include('connection.php');
include('sessionstart.php');
unset($_SESSION['id']);
unset($_SESSION['fullname']);
unset($_SESSION['username']);
unset($_SESSION['type']);
unset($_SESSION['id']);

session_destroy();
   header("location:pharmaindex.php");
?>