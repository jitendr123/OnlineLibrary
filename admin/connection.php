<?php
     
    $db=mysqli_connect("localhost","root","","library"); // $ is use for variable

  if(!$db){
   
       echo "<script>";
       echo  'alert(Connected successfully.)';
       echo "</script>" ;
       header("refresh:0.01; url=student_login.php");
   }
   
   
?>
