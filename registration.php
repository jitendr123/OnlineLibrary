<?php
   include "connection.php";
?>


<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="indexcss.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  
</head>
<body>
<header style="height: 90px; width: 1365px">
<nav class="navbar navbar-expand-sm navbar sticky-top">
	<div class="nav-heading">
		<img src="images/logo.jpeg" alt="" class="logo" height="70" width="90">
		<h1 class="head"><b>Online Library System</b></h1>
		<a href="index.php" class="home">Home</a>
		<a href="student_login.php" class="student-login">Student Login</a>
		<a href="admin_login.html" class="admin-login">Admin Login</a>	
		<a href="about_us.html" class="aboutus">About Us</a>
	</div>
</nav>
</header>
<section>
      <div class="reg_img">
          <div class="box4">
              <h1 style="text-align: center; font-size: 35px; font-family: Arial, Helvetica, sans-serif;">&nbsp Online librry System</h1>
              <h1 style="text-align: center; font-size: 25px;font-family: Arial, Helvetica, sans-serif;">User Registration Form</h1><br>
              <form name="login" ;action="" method="post">
              
               <div class="registration">
                 <input class="form-control" type="text" name="first" placeholder="Fist Name" required>
                 <br>
                 <input class="form-control" type="text" name="last" placeholder="Last Name" required>
                 <br>
                 <input class="form-control" type="text" name="username" placeholder="Username" required>
                 <br>
                 <input class="form-control" type="text" name="roll_no"  placeholder="Roll NO" required>
                <br>
                 <input class="form-control" type="password" name="password" placeholder="Password" required>
                 <br>
                 <input class="form-control" type="email" name="email" placeholder="Email" required>
                 
                 <br>
                 <input class="btn btn-default" type="submit" name="submit" value="Sign-Up" style="color: black; width: 70px; height: 30px;"></div>
                  
               </div>

              </form>
          </div>

      </div>
</section>
 
  <?php

    if(isset($_POST['submit']))  //if button press then show data
     {
       
       if(!mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll_no]', '$_POST[email]'); "))
        {
         echo "<script>";
         echo 'alert("not registered")';
         echo "</script>";
        }
        else
        {
          echo "<script>";
          echo 'alert("registration successful")';
          header("refresh:0.01; url=student_login.php");
          echo "</script>";
        }
     } 

  ?>
   
</body>
