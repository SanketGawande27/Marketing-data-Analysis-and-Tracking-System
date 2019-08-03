<?php 

if ($_SESSION['type']=='mr') {
	session_destroy();
	header('Location:../pharmaindex.php');
}



?>