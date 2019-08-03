<?php 
session_start();

if (empty($_SESSION['type']) ||empty($_SESSION['id'])||empty($_SESSION['fullname'])||empty($_SESSION['username']) ) {
	header('Location: ../pharmaindex.php');
}
 



?>