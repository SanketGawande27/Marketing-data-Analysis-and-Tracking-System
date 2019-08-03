<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['fullname']);
unset($_SESSION['type']);
unset($_SESSION['username']);
session_destroy();

header('Location:../pharmaindex.php');



?>