<?php 
session_start();
include('connection');
$_SESSION['full_name']=$fullname;
$_SESSION['user_name']=$username;
$_SESSION['type']=$type;



?>