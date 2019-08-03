<?php
session_start();
include('connection.php');
?>

<?php 
if(isset($_POST['login']))
 {
$username=$_POST['username'];
$password=$_POST['password'];
$r = mysql_query("SELECT * from regsform WHERE username ='$username' and password ='$password'");
$lgn = mysql_query($r);
$count = mysql_num_rows($r);
$rows = mysql_fetch_assoc($r); 
if($count>0){
 
        $row = mysql_fetch_assoc($lgn);
        $_SESSION['id'] = $rows['id'];
        $_SESSION['fullname'] = $rows['fullname'];
        $_SESSION['username'] = $rows['username'];
        $_SESSION['type'] = $rows['type'];



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

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Amcor Pharma</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/logoamcor.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 d-md-flex">
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-mobile"></i></span> call us now! +91 9766363623</h6>
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-envelope-o"></i></span> amchor.pharma@gmail.com</h6>
                        <h6><span class="mr-2"><i class="fa fa-map-marker"></i></span> Find our Location</h6>
                    </div>
                    <div class="col-lg-3">
                        <!-- <div class="social-links">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div> -->
                        <div class="social-links">
                            <ul>
                                <li class="menu-active"><a href="pharmaindex.php">Home</a></li>
                                <li class="menu-active"><a href="#">About Us</a></li>
                                <li class="menu-active"><a href="#">Contact Us</a></li>
                                
                            </ul>
                        </div>
                 <!--  <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li style="margin-right: "class="menu-active"><a href="index.html">Home</a></li>
                        <li><a href="departments.html">About Us</a></li>
                        <li><a href="doctors.html">Contact Us</a></li>
                      </ul>
                </nav> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="header" id="home">
            <div class="container" style="height: 50px;">
                <!-- <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="pharmaindex.html"><img style="height: 100px;width: 200px;"src="assets/images/logo/amcor11.png " alt="" title="" /></a>
                </div> -->
                <!-- <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="index.html">Home</a></li>
                        <li><a href="departments.html">About Us</a></li>
                        <li><a href="doctors.html">Contact Us</a></li>
                      </ul>
                </nav> --><!-- #nav-menu-container -->            
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                  <div id="logo">
                    <a href="pharmaindex.php"><img style="height: 350px;width: 600px;margin-top: -75%;"src="assets/images/logo/amcor11.png " alt="" title="" /></a>
                </div>
                    <!-- <h4>Caring for better life</h4> -->
                    <h1>Amcor Pharma</h1>
                    <b><p style="color: red;font-family: comic sans MS;font-size: 15px;"> " Natural touch with mother's care... "</p></b>
                    <b><p style="color: black;font-family: comic sans MS;font-size: 15px bolder;">amcor pharma pvt.lid.<br> c/o Elite Logistic , Adarsh Sabhagruh,<br>Adarsh Nagar,Wadi,Nagpur-23<br>9766363623</p></b>
                    <a style="color: white; "onclick="document.getElementById('id01').style.display='block'" class="template-btn mt-3">Login Here </a>&nbsp;&nbsp;&nbsp;&nbsp;
                     <a style="color: white;"onclick="document.getElementById('id02').style.display='block'" class="template-btn mt-3">Registration</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Feature Area Starts -->
    <section class="feature-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding">
                        <img src="assets/images/feature1.png" alt="">
                        <h3>advance technology</h3>
                        <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding mt-4 mt-md-0">
                        <img src="assets/images/feature2.png" alt="">
                        <h3>comfortable place</h3>
                        <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding mt-4 mt-lg-0">
                        <img src="assets/images/feature3.png" alt="">
                        <h3>quality equipment</h3>
                        <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature text-center item-padding mt-4 mt-lg-0">
                        <img src="assets/images/feature4.png" alt="">
                        <h3>friendly staff</h3>
                        <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't bearing tree appear</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Pop Up login Form -->
    <div id="id01" class="modal">
  
  <form class="modal-content animate" action="#" style="width: 500px;height: 600px;" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="assets/images/logo/login.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label ><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button name ="login" type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<!-- end of login pop form -->



 <!-- popup registration form -->
 <div id="id02" class="modal">
  
  <form class="modal-content animate" action="pharmaindex.php" style="width: 500px;height: 900px;" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
     <!--  <img src="assets/images/logo/login.png" alt="Avatar" class="avatar"> -->
    </div>

    <div class="container">
      <label for="uname"><b>Full Name</b></label>
      <input type="text" placeholder="Enter Full Name" name="fullname" required>

      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="uname"><b>Mobile No</b></label>
      <input type="text" maxlength="10" onkeyup="this.value=this.value.replace(/[^\d]/,'')" autocomplete="off" pattern="[0-9]{10}" placeholder="Enter Mobile NO" name="mobileno" required>

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label style="display: inline-block;"for="type"><b>Type</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
      <!-- <input type="text" placeholder="Enter Username" name="uname" required> -->
     <!--  <select name="Type" size="3">
        <option></option>
        <option value="manager">Manager</option>
        <option value="mr">Medical Representative</option>
        <option value="pharma">Pharma</option>
      </select>
      --> 
      <label >
        <input style="display: inline-block;" type="radio"  value="Manager"  name="type"> Manager&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </label>
      <label>
        <input style="display: inline-block;" type="radio"  vlaue="Medical Representative"    name="type"> Medical Representative&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </label>
      <label>
        <input style="display: inline-block;" type="radio"  value="Pharma"   name="type"> Pharma&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </label>

      <label style="display: block;" for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

       <label for="psw"><b>Conform Password</b></label>
      <input type="password" placeholder="Conform Password" name="Conformpassword" required>
        
      <button  onclick="(success(),2000)" name ="submit" type="submit">Submit</button>
      <script type="text/javascript">
        /*function success(){
          alert("Registration  is Successfully Submited ");
        }*/
      </script>
      <!-- <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label> -->
    </div>

     
     <!--  <span class="psw">Forgot <a href="#">password?</a></span> -->
    
    <div style="display: inline-block; class="container" style="background-color:#f1f1f1">
      <button style=" margin-left:20px;width: 250px;"type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Reset </button>
      <button style="width: 200px;type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>


       </div>
  </form>
</div>

<!-- end of pop up registration form -->














    
    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">top products</h3>
                            <ul>
                                <li class="mb-2"><a href="#">managed website</a></li>
                                <li class="mb-2"><a href="#">managed reputation</a></li>
                                <li class="mb-2"><a href="#">power tools</a></li>
                                <li><a href="#">marketing service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">newsletter</h3>
                            <p class="mb-4">You can trust us. we only send promo offers, not a single.</p>  
                            <form action="#">
                                <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" required>
                                <button type="submit" class="template-btn">subscribe now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-lg-3">
                        <div class="single-widge-home">
                            <h3 class="mb-4">instagram feed</h3>
                            <div class="feed">
                                <img src="assets/images/feed1.jpg" alt="feed">
                                <img src="assets/images/feed2.jpg" alt="feed">
                                <img src="assets/images/feed3.jpg" alt="feed">
                                <img src="assets/images/feed4.jpg" alt="feed">
                                <img src="assets/images/feed5.jpg" alt="feed">
                                <img src="assets/images/feed6.jpg" alt="feed">
                                <img src="assets/images/feed7.jpg" alt="feed">
                                <img src="assets/images/feed8.jpg" alt="feed">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <span>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
