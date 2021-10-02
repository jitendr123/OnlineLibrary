<?php

$username = $_POST['username'];
$password = $_POST['password'];

if($username == "admin" AND $password == "admin"){
	header("location: ./admin/admin_book.html");
}

else {
	echo "<script>";
	echo 'alert("Invalid Credentials")';
	echo "</script>";
	
	header("refresh:0.1; url=./admin_login.html");
}

?>