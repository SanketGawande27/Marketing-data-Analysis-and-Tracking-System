<?php 
if ($_SESSION['type']=='manager') {
	session_destroy();
	header('Location:../pharmaindex.php');
}



?>