<?php

function getDoctorName($id)
{
	$sql="Select * from adddoct Where id = $id";
	$result = mysql_query($sql);
	$rows = mysql_fetch_assoc($result);
	return $rows['name'];
}


function getManagerName($id)
{
	$sql="Select * from regsform Where id = $id";
	$result = mysql_query($sql);
	$rows = mysql_fetch_assoc($result);
	return $rows['fullname'];
}


 ?>