<?php


include('connection.php');
 

if(isset($_POST['mr_id==1']))
{   
	
	header('mrakash.php');
} 
if (isset($_POST['mr_id==2'])) {
	 
	header('mrulhas.php');
} 
if (isset($_POST['mr_id==3'])) {
 
	header('mrvikram.php');
}

?>

<!-- <?php 
if (isset($_POST['mr_list_submit'])) {
 foreach ($_POST['mr_list'] as $id) {
 header('Location:mrakash.php?mr_id=$id');
 }
}





?> -->