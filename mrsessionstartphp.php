 <?php
session_start();
if(empty($_SESSION['fullname']) || empty($_SESSION['username'])|| empty($_SESSION['type']) || empty($_SESSION['mr_id']) ){
	
  header('Location: pharmaindex.php');
}
?>
