<?php


include('connection.php');


if(isset($_POST['login']))
{
	//echo "DataBAse Connected  ";
	$name=$_POST["name"];
	$email=$_POST["email"];
	$username=$_POST["username"];
	$mobileno=$_POST["mobileno"];
	$area=$_POST["area"];
	$specialist=$_POST["specialist"];
	$address=$_POST["address"];

	$result = mysql_query("Insert into adddoct(name,email,username,mobileno,area,specialist,address) values('$name','$email','$username','$mobileno','$area','$specialist','$address')");
	  /*while($r=mysql_fetch_array($result))
	  {
	  	echo $r["name"].$r["email"].$r["rollno"];
	  }*/
}

if(isset($_GET['id']))
{

$id=$_GET['id'];
$name=$_POST["name"];
	$email=$_POST["email"];
	$username=$_POST["username"];
	$mobileno=$_POST["mobileno"];
	$area=$_POST["area"];
	$specialist=$_POST["specialist"];
	$address=$_POST["address"];

$result = mysql_query("UPDATE adddoct SET name='$name',email='$email',username='$username',mobileno='$mobileno',area='$area',specialist='$specialist',address='$address' where id='$id'");
echo("ala");


echo "<script type='text/javascript'>window.location='listofdoct.php';
</script>";



}

if(isset($_GET['delete']))
{


$id=$_GET['delete'];



$result = mysql_query("DELETE FROM adddoct where id='$id'");

echo '
<script type="text/javascript">

	window.location="updel.php";
</script>';
}




if(isset($_GET['id']))
{
	//echo "DataBAse Connected  ";
$r = mysql_query("SELECT * FROM `adddoct` where `id`= '$id' ");
$row= mysql_fetch_assoc($r);

$count = mysql_num_rows($r);
if($count>0){
  echo"<script> alert('Successfull..'); </script>";
  echo "$count";
  }
else{
  echo "poor";
  }
  /*while($r=mysql_fetch_array($result))
	  {
	  	echo $r["name"].$r["email"].$r["rollno"];
	  }*/
}


if(isset($_POST['displayDate']))
{

$id=$_POST['id'];
$product=$_POST['product'];

$curr_date = date("d-m-Y");


$result = mysql_query("UPDATE `assigned_doctor` SET `date_time`= '$curr_date' ,`product`='$product' WHERE id = '$id'; ");
if (!empty($result)) {
	///echo "succ";
	echo $curr_date;
}
else{
	//echo "fals";
}


/*echo "<script type='text/javascript'>window.location='listofdoct.php';
</script>";*/



}



?>

