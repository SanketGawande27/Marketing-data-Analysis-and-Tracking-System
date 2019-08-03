<?php

  session_start();

if (isset($_SESSION['type'])) {
header("location:pharmaindex.php");

}


include('connection.php');
/*session_start();*/
if(isset($_POST['login']))
 {
echo "<script> alert();</script>";
$username=$_POST['username'];
$password=$_POST['password'];
$r = mysql_query("SELECT * from regsform WHERE username ='$username' and password ='$password'");

$count = mysql_num_rows($r);
$rows = mysql_fetch_assoc($r); 
if($count>0){

  $_SESSION['type'] = $rows['type'];
  $_SESSION['id'] = $rows['id'];
  $_SESSION['fullname'] = $rows['fullname'];
  $_SESSION['username'] = $rows['username'];


  if ($rows['type']=='mr') {
    header("Location: mr.php");
    echo"<script> alert('Successfull..'); </script>";
  }
  elseif ($rows['type']=='manager') {
    header("Location:manager.php");
    echo"<script> alert('Successfull..'); </script>";
  }
  elseif ($rows['type']=='admin'){
header("Location: starter.php");

  }
  else{
  echo"<script> alert('ur not allowed'); </script>";
    }   
  }
else{
  echo"<script> alert('Something went wrong'); </script>";
 
  }


}
?>
<!-- end of php login form -->

<!-- start of registration form php -->

<?php

if(isset($_POST['submit']))
 {
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$mobileno=$_POST['mobileno'];
$username=$_POST['username'];
$type=$_POST['type'];
$password=$_POST['password'];
$conformpassword=$_POST['Conformpassword'];
if($password!=$conformpassword){
 echo"<script>alert('Password must be Identical');
  window.location='pharmaindex.php';
  </script>";


}


$r = mysql_query("INSERT into regsform(fullname,email,mobileno,username,type,password,conformpassword) values('$fullname','$email','$mobileno','$username','$type','$password','$conformpassword')");
if ($r) {
  echo "<script>alert('Successfull Submited');window.location('pharmaindex.php')</script>";
}
else{
 echo "<script>alert('Something went wrong')</script>"; 
}

//echo $count = mysql_num_rows($r);

}
?>

<!-- start of registration form php -->

