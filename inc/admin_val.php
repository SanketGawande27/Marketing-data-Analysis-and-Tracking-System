<?php 

if ($_SESSION['type']=='admin') {
	session_destroy();
	header('Location:../pharmaindex.php');
}



?>